<?php

namespace App\Http\Controllers;

use App\Helpers\GetDataHelpers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::latest()->get();

        return view('main.category.index', [
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $imageName = '';

        if ($request->file('image_url')) {
            $imageName = str_replace('/', '.', $request->name) . '.' . time() . '.' . $request->image_url->extension();
            $request->file('image_url')->move(public_path('assets/images/category'), $imageName);
        }

        $category = new Category();

        $category->name = $request->name;
        $category->description = $request->description;
        if ($imageName) {
            $category->image_url = $imageName;
        }
        $category->created_by = Auth::user()->id;;

        $category->save();

        session()->flash('success', 'Create successfully');
        return redirect()->back();
    }

    public function get_detail($id)
    {
        $category = Category::find($id);
        return $category;
    }

    public function destroy($id)
    {
        $category = Category::where('id', $id)->firstorfail();

        $cover = GetDataHelpers::get_public_path($category->image_url);
        if (File::exists($cover)) File::delete($cover);

        $category->delete();

        session()->flash('success', 'Delete successfully');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $category = Category::where('id', $id)->first();

        if (!$category) {
            session()->flash('error', 'Category not found!');
            return redirect()->back();
        }


        if ($request->file('image_url')) {
            $imageName = str_replace('/', '.', $request->name) . '.' . time() . '.' . $request->image_url->extension();
            $request->file('image_url')->move(public_path('assets/images/category'), $imageName);

            $cover = GetDataHelpers::get_public_path($category->image_url);
            if (File::exists($cover)) File::delete($cover);

            $category->image_url = $imageName;
        }

        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();

        session()->flash('success', 'Update successfully');
        return redirect()->back();
    }
}
