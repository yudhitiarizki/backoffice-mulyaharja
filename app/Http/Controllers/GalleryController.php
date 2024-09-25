<?php

namespace App\Http\Controllers;

use App\Helpers\GetDataHelpers;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    public function index()
    {
        $data = Gallery::latest()->get();

        return view("main.gallery.index", [
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $imageName = '';

        if ($request->file('image_url')) {
            $imageName = time() . '.' . $request->image_url->extension();
            $request->file('image_url')->move(public_path('assets/images/gallery'), $imageName);
        }

        $gallery = new Gallery();

        $gallery->name = $request->name;
        $gallery->created_by = Auth::user()->id;

        if ($imageName) $gallery->image_url = $imageName;

        $gallery->save();

        session()->flash('success', 'Create successfully');
        return redirect()->back();
    }

    public function get_detail($id)
    {
        $gallery = Gallery::find($id);
        return $gallery;
    }

    public function destroy($id)
    {
        $gallery = Gallery::where('id', $id)->firstorfail();

        $cover = GetDataHelpers::get_public_path($gallery->image_url);
        if (File::exists($cover)) File::delete($cover);

        $gallery->delete();

        session()->flash('success', 'Delete successfully');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::where('id', $id)->first();

        if (!$gallery) {
            session()->flash('error', 'Gallery not found!');
            return redirect()->back();
        }

        if ($request->file('image_url')) {
            $imageName = time() . '.' . $request->image_url->extension();
            $request->file('image_url')->move(public_path('assets/images/gallery'), $imageName);

            $cover = GetDataHelpers::get_public_path($gallery->image_url);
            if (File::exists($cover)) File::delete($cover);

            $gallery->image_url = $imageName;
        }

        $gallery->name = $request->name;

        $gallery->save();

        session()->flash('success', 'Update successfully');
        return redirect()->back();
    }
}
