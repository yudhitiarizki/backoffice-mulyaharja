<?php

namespace App\Http\Controllers;

use App\Helpers\GetDataHelpers;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::with(['ProductImages', 'Category'])->latest()->get();
        $category = ProductCategory::latest()->get();

        return view('main.product.index', [
            'data' => $data,
            'category' => $category
        ]);
    }

    public function store_category(Request $request)
    {
        $category = new ProductCategory();
        $category->name = $request->name;
        $category->save();

        session()->flash('success', 'Create successfully');
        return redirect()->back();
    }

    public function update_category(Request $request, $id)
    {
        $category = ProductCategory::where('id', $id)->first();

        if (!$category) {
            session()->flash('error', 'Category not found!');
            return redirect()->back();
        }
        $category->name = $request->name;
        $category->save();

        session()->flash('success', 'Update successfully');
        return redirect()->back();
    }

    public function destroy_category($id)
    {
        $category = ProductCategory::where('id', $id)->firstorfail();

        if (!$category) {
            session()->flash('error', 'Category not found!');
            return redirect()->back();
        }

        $category->delete();

        session()->flash('success', 'Delete successfully');
        return redirect()->back();
    }


    public function store(Request $request)
    {
        $imageName = '';

        if ($request->file('image_url')) {
            $imageName = str_replace('/', '.', $request->name) . '.' . time() . '.' . $request->image_url->extension();
            $request->file('image_url')->move(public_path('assets/images/products'), $imageName);
        }

        $product = new Product();

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->addtional_info = $request->addtional_info;
        $product->product_category_id = $request->kategori;
        $product->created_by = Auth::user()->id;

        if ($imageName) $product->cover = $imageName;

        $product->save();

        session()->flash('success', 'Create successfully');
        return redirect()->back();
    }

    public function get_detail($id)
    {
        $product = Product::find($id);
        return $product;
    }

    public function update(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();

        if (!$product) {
            session()->flash('error', 'product not found!');
            return redirect()->back();
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->addtional_info = $request->addtional_info;
        $product->product_category_id = $request->kategori;

        if ($request->file('image_url')) {
            $imageName = str_replace('/', '.', $request->name) . '.' . time() . '.' . $request->image_url->extension();
            $request->file('image_url')->move(public_path('assets/images/products'), $imageName);

            $cover = GetDataHelpers::get_public_path($product->cover);
            if (File::exists($cover)) File::delete($cover);

            $product->cover = $imageName;
        }

        $product->save();

        session()->flash('success', 'Update successfully');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $product = Product::where('id', $id)->firstorfail();

        $cover = GetDataHelpers::get_public_path($product->cover);
        if (File::exists($cover)) File::delete($cover);

        $product->delete();

        session()->flash('success', 'Delete successfully');
        return redirect()->back();
    }
}
