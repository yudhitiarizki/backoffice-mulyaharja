<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->query('page', 1);
        $pageSize = $request->query('pageSize', 6);
        $kategori = $request->query('kategori');
        $search = $request->query('search');
        $sort = $request->query('sortBy', 'created_at');
        $sortDirection = $request->query('sortOrder', 'desc');

        $query = Product::with('Category')->when($kategori, function ($query, $kategori) {
            return $query->where('product_category_id', $kategori);
        })
            ->when($search, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%$search%")
                        ->orWhere('price', 'like', "%$search%")
                        ->orWhere('description', 'like', "%$search%")
                        ->orWhere('addtional_info', 'like', "%$search%");
                });
            })
            ->orderBy($sort, $sortDirection);

        $data = $query->paginate($pageSize, ['*'], 'page', $page);

        return new ApiResource(true, 'Data Product', $data);
    }

    public function get_category()
    {
        $data = ProductCategory::latest()->get();
        return new ApiResource(true, 'Data Product Category', $data);
    }

    public function detail($id)
    {
        $data = Product::with('Category')->find($id);
        return new ApiResource(true, 'Data Category', $data);
    }
}
