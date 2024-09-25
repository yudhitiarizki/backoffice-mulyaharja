<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->query('page', 1);
        $pageSize = $request->query('pageSize', 10);
        $kategori = $request->query('kategori', null);
        $search = $request->query('search', null);

        $query = News::latest();

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

    public function recent()
    {
        $data = News::latest()->take(3)->get();
        return new ApiResource(true, 'Data News', $data);
    }

    public function detail($id)
    {
        $data = News::find($id);
        if ($data) return new ApiResource(true, 'Data News', $data);
        return new ApiResource(false, 'Data News not found', null);
    }
}
