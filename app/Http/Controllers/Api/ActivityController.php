<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->query('page', 1);
        $pageSize = $request->query('pageSize', 6);
        $kategori = $request->query('kategori', null);
        $search = $request->query('search', null);

        $query = Activity::latest();

        if ($kategori) $query->where('category_id', $kategori);

        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('subtitle', 'like', '%' . $search . '%')
                    ->orWhere('location', 'like', '%' . $search . '%');
            });
        }

        $data = $query->paginate($pageSize, ['*'], 'page', $page);
        return new ApiResource(true, 'Data News', $data);
    }

    public function detail($id)
    {
        $data = Activity::find($id);
        if ($data) return new ApiResource(true, 'Data Activity', $data);
        return new ApiResource(false, 'Data Activity not found', null);
    }
}
