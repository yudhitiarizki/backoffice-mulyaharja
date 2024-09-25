<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->query('page', 1);
        $pageSize = $request->query('pageSize', 10);

        $data = Category::latest()->paginate($pageSize, ['*'], 'page', $page);

        return new ApiResource(true, 'Data Category', $data);
    }

    public function detail($id)
    {
        $data = Category::find($id);
        return new ApiResource(true, 'Data Category', $data);
    }
}
