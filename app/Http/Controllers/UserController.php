<?php

namespace App\Http\Controllers;

use App\Helpers\GetDataHelpers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        $totalUsers = User::whereNull('deleted_at')->count();

        $totalActiveUsers = User::where('is_active', '1')
            ->whereNull('deleted_at')
            ->count();

        $totalInactiveUsers = User::where('is_active', '0')
            ->whereNull('deleted_at')
            ->count();

        return view('main.users.index', [
            'data' => $users,
            'totalUsers' => $totalUsers,
            'totalActiveUsers' => $totalActiveUsers,
            'totalInactiveUsers' => $totalInactiveUsers,
        ]);
    }

    public function get_detail($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function store(Request $request)
    {
        $deletedUser = User::where('email', $request->user_email)->whereNull('deleted_at')->first();

        if ($deletedUser != null) {
            session()->flash('error', 'The email has already been taken.');
            return redirect()->back();
        }

        $imageName = '';

        if ($request->file('avatar')) {
            $imageName = str_replace('/', '.', $request->user_name) . '.' . time() . '.' . $request->avatar->extension();
            $request->file('avatar')->move(public_path('assets/images/users'), $imageName);
        }

        $user = new User();

        $user->name = $request->user_name;
        $user->email = $request->user_email;
        $user->phone_number = $request->phone_number;
        $user->is_active = true;
        if ($imageName) {
            $user->image_url = $imageName;
        }
        $user->password = bcrypt($request->password);

        $user->save();

        session()->flash('success', 'Create successfully');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->first();

        if (!$user) {
            session()->flash('error', 'User not found!');
            return redirect()->back();
        }

        if ($user->email != $request->user_email) {
            $exist = User::where('email', $request->user_email)
                ->where('uuid', '!=', $id)
                ->whereNull('deleted_at')
                ->first();

            if ($exist) {
                session()->flash('error', 'The email already exist!');
                return redirect()->back();
            }
        }

        if ($request->file('avatar')) {
            $imageName = str_replace('/', '.', $request->user_name) . '.' . time() . '.' . $request->avatar->extension();
            $request->file('avatar')->move(public_path('assets/images/users'), $imageName);

            $cover = GetDataHelpers::get_public_path($user->image_url);
            if (File::exists($cover)) File::delete($cover);

            $user->image_url = $imageName;
        }

        $user->name = $request->user_name;
        $user->email = $request->user_email;
        $user->phone_number = $request->phone_number;

        $user->save();

        session()->flash('success', 'Update successfully');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->firstorfail();
        $user->delete();

        session()->flash('success', 'Delete successfully');
        return redirect()->back();
    }

    public function set_active($id)
    {
        $user = User::where('id', $id)->firstorfail();

        $user->is_active = $user->is_active == '1' ? 0 : 1;
        $user->save();

        session()->flash('success', 'Updated successfully');
        return redirect()->back();
    }
}
