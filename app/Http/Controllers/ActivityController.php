<?php

namespace App\Http\Controllers;

use App\Helpers\GetDataHelpers;
use App\Models\Activity;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ActivityController extends Controller
{
    public function index()
    {
        $data = Activity::with(['Category'])->latest()->get();
        $category = Category::latest()->get();

        return view('main.activity.index', [
            'data' => $data,
            'category' => $category
        ]);
    }

    public function store(Request $request)
    {
        $activity = new Activity();

        $activity->title = $request->name;
        $activity->description = $request->description;
        $activity->category_id = $request->kategori;
        $activity->date = $request->date;
        $activity->location = $request->location;
        $activity->tags = GetDataHelpers::parseAndCombineTags($request->tags);
        $activity->created_by = Auth::user()->id;

        $imageName = '';

        if ($request->file('image_url')) {
            $imageName = str_replace('/', '.', $request->name) . '.' . time() . '.' . $request->image_url->extension();
            $request->file('image_url')->move(public_path('assets/images/activity'), $imageName);
        }

        if ($imageName) $activity->cover = $imageName;

        $activity->save();

        session()->flash('success', 'Create successfully');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $activity = Activity::where('id', $id)->firstorfail();

        $cover = GetDataHelpers::get_public_path($activity->cover);
        if (File::exists($cover)) File::delete($cover);

        $activity->delete();

        session()->flash('success', 'Delete successfully');
        return redirect()->back();
    }

    public function get_detail($id)
    {
        $activity = Activity::find($id);
        return $activity;
    }

    public function update(Request $request, $id)
    {
        $activity = Activity::where('id', $id)->first();

        if (!$activity) {
            session()->flash('error', 'Activity not found!');
            return redirect()->back();
        }

        $activity->title = $request->name;
        $activity->description = $request->description;
        $activity->category_id = $request->kategori;
        $activity->date = $request->date;
        $activity->location = $request->location;
        $activity->tags = GetDataHelpers::parseAndCombineTags($request->tags);

        if ($request->file('image_url')) {
            $imageName = str_replace('/', '.', $request->name) . '.' . time() . '.' . $request->image_url->extension();
            $request->file('image_url')->move(public_path('assets/images/activity'), $imageName);

            $cover = GetDataHelpers::get_public_path($activity->cover);
            if (File::exists($cover)) File::delete($cover);

            $activity->cover = $imageName;
        }

        $activity->save();

        session()->flash('success', 'Update successfully');
        return redirect()->back();
    }
}
