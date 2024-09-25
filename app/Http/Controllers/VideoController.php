<?php

namespace App\Http\Controllers;

use App\Helpers\GetDataHelpers;
use App\Models\Category;
use App\Models\Video;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function index()
    {
        $data = Video::with(['Category'])->latest()->get();
        $category = Category::latest()->get();

        return view('main.videos.index', [
            'data' => $data,
            'category' => $category
        ]);
    }

    public function store(Request $request)
    {
        $video = new Video();

        $video->title = $request->name;
        $video->description = $request->description;
        $video->category_id = $request->kategori;
        $video->date = $request->date;
        $video->subtitle = $request->subtitle;
        $video->location = $request->location;
        $video->tags = GetDataHelpers::parseAndCombineTags($request->tags);
        $video->youtube_id = GetDataHelpers::getYouTubeVideoId($request->links);
        $video->created_by = Auth::user()->id;

        $imageName = '';

        if ($request->file('image_url')) {
            $imageName = str_replace('/', '.', $request->name) . '.' . time() . '.' . $request->image_url->extension();
            $request->file('image_url')->move(public_path('assets/images/videos'), $imageName);
        }

        if ($imageName) $video->cover = $imageName;

        $video->save();

        session()->flash('success', 'Create successfully');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $video = Video::where('id', $id)->firstorfail();

        $cover = GetDataHelpers::get_public_path($video->cover);
        if (File::exists($cover)) File::delete($cover);

        $video->delete();

        session()->flash('success', 'Delete successfully');
        return redirect()->back();
    }

    public function get_detail($id)
    {
        $video = Video::find($id);
        return $video;
    }

    public function update(Request $request, $id)
    {
        $video = Video::where('id', $id)->first();

        if (!$video) {
            session()->flash('error', 'Video not found!');
            return redirect()->back();
        }

        $video->title = $request->name;
        $video->description = $request->description;
        $video->category_id = $request->kategori;
        $video->date = $request->date;
        $video->subtitle = $request->subtitle;
        $video->location = $request->location;
        $video->tags = GetDataHelpers::parseAndCombineTags($request->tags);
        $video->youtube_id = GetDataHelpers::getYouTubeVideoId($request->links);

        if ($request->file('image_url')) {
            $imageName = str_replace('/', '.', $request->name) . '.' . time() . '.' . $request->image_url->extension();
            $request->file('image_url')->move(public_path('assets/images/videos'), $imageName);

            $cover = GetDataHelpers::get_public_path($video->cover);
            if (File::exists($cover)) File::delete($cover);

            $video->cover = $imageName;
        }

        $video->save();

        session()->flash('success', 'Update successfully');
        return redirect()->back();
    }
}
