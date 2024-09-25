<?php

namespace App\Http\Controllers;

use App\Helpers\GetDataHelpers;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    public function index()
    {
        $data = News::with(['Category'])->latest()->get();
        $category = Category::latest()->get();

        return view('main.news.index', [
            'data' => $data,
            'category' => $category
        ]);
    }

    public function store(Request $request)
    {
        $news = new News();

        $news->title = $request->name;
        $news->description = $request->description;
        $news->category_id = $request->kategori;
        $news->date = $request->date;
        $news->subtitle = $request->subtitle;
        $news->location = $request->location;
        $news->tags = GetDataHelpers::parseAndCombineTags($request->tags);
        $news->created_by = Auth::user()->id;

        $imageName = '';

        if ($request->file('image_url')) {
            $imageName = str_replace('/', '.', $request->name) . '.' . time() . '.' . $request->image_url->extension();
            $request->file('image_url')->move(public_path('assets/images/news'), $imageName);
        }

        if ($imageName) $news->cover = $imageName;

        $news->save();

        session()->flash('success', 'Create successfully');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $news = News::where('id', $id)->firstorfail();

        $cover = GetDataHelpers::get_public_path($news->cover);
        if (File::exists($cover)) File::delete($cover);

        $news->delete();

        session()->flash('success', 'Delete successfully');
        return redirect()->back();
    }

    public function get_detail($id)
    {
        $news = News::find($id);
        return $news;
    }

    public function update(Request $request, $id)
    {
        $news = News::where('id', $id)->first();

        if (!$news) {
            session()->flash('error', 'News not found!');
            return redirect()->back();
        }

        $news->title = $request->name;
        $news->description = $request->description;
        $news->category_id = $request->kategori;
        $news->date = $request->date;
        $news->subtitle = $request->subtitle;
        $news->location = $request->location;
        $news->tags = GetDataHelpers::parseAndCombineTags($request->tags);

        if ($request->file('image_url')) {
            $imageName = str_replace('/', '.', $request->name) . '.' . time() . '.' . $request->image_url->extension();
            $request->file('image_url')->move(public_path('assets/images/news'), $imageName);

            $cover = GetDataHelpers::get_public_path($news->cover);
            if (File::exists($cover)) File::delete($cover);

            $news->cover = $imageName;
        }

        $news->save();

        session()->flash('success', 'Update successfully');
        return redirect()->back();
    }
}
