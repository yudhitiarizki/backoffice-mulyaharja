<?php

namespace App\Http\Controllers;

use App\Helpers\GetDataHelpers;
use App\Models\CompanyProfiles;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CompanyProfilesController extends Controller
{
    public function index()
    {
        $data = CompanyProfiles::first();
        $contact = Contact::latest()->get();

        return view('main.company-profile.index', [
            'data' => $data,
            'contact' => $contact
        ]);
    }

    public function update(Request $request)
    {
        $data = CompanyProfiles::first();
        if (!$data) $data = new CompanyProfiles();

        $imageName = '';

        if ($request->file('avatar')) {
            $imageName = str_replace('/', '.', $request->name) . '.' . time() . '.' . $request->avatar->extension();
            $request->file('avatar')->move(public_path('assets/images/logo'), $imageName);

            $cover = GetDataHelpers::get_public_path($data->logo);
            if (File::exists($cover)) File::delete($cover);
        }

        if ($imageName) $data->logo = $imageName;

        $data->name = $request->name;
        $data->locations = $request->location;
        $data->description = $request->description;

        $data->save();

        session()->flash('success', 'Update successfully');
        return redirect()->back();
    }

    public function store_contact(Request $request)
    {
        $contact = new Contact();

        $contact->phone_number = $request->phone_number;
        $contact->email = $request->email;
        $contact->created_by = Auth::user()->id;;

        $contact->save();

        session()->flash('success', 'Create successfully');
        return redirect()->back();
    }

    public function destroy_contact($id)
    {
        $contact = Contact::where('id', $id)->firstorfail();
        $contact->delete();

        session()->flash('success', 'Delete successfully');
        return redirect()->back();
    }

    public function get_detail($id)
    {
        $data = Contact::find($id);
        return $data;
    }

    public function update_contact(Request $request, $id)
    {
        $contact = Contact::where('id', $id)->first();

        if (!$contact) {
            session()->flash('error', 'Contact not found!');
            return redirect()->back();
        }

        $contact->phone_number = $request->phone_number;
        $contact->email = $request->email;

        $contact->save();

        session()->flash('success', 'Update successfully');
        return redirect()->back();
    }
}
