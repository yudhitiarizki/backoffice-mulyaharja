<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Models\CompanyProfiles;
use App\Models\Contact;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        $data = CompanyProfiles::first();
        return new ApiResource(true, 'Data Company Profile', $data);
    }

    public function get_contact()
    {
        $data = Contact::latest()->get();
        return new ApiResource(true, 'Data Company Profile', $data);
    }
}
