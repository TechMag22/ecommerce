<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function create_product()
    {
        $categories = Category::all();
        return view('create_product', [
            'categories' => $categories
        ]);
    }

    public function store_product(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

        $catName = Category::where('id', $request->category_id)->pluck('name')->first();
        $file = $request->file('image');
        $path = 'products/'.strtolower($catName).'/'.$file->getClientOriginalName();
        Storage::disk('local')->put('public/' . $path, file_get_contents($file));

        $product = new Product();
        $product->fill($request->all());
        $product->image = $path;
        $product->save();
        Session::flash("alert-success", "New Product has been added successfully.");

        return Redirect::route('create_product');
    }

    public function index_product(Request $request)
    {
        $user = Auth::user();
        $products = new Product();
        $filter = array();
        if ($request->query('q_cat')) {
            $filter['cat'] = $request->query('q_cat');
        }
        if ($request->query('q_min_rs')) {
            $filter['min_price'] = $request->query('q_min_rs');
        }
        if ($request->query('q_max_rs')) {
            $filter['max_price'] = $request->query('q_max_rs');
        }
        $prods = $products->getProducts($filter);
        $categories = Category::all();
        return view('index_product', [
            'products' => $prods,
            'categories' => $categories,
            'user' => $user,
        ]);
    }

    public function show_product(Product $product)
    {
        return view('show_product', compact('product'));
    }

    public function edit_product(Product $product)
    {
        return view('edit_product', compact('product'));
    }

    public function update_product(Product $product, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

        $file = $request->file('image');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/' . $path, file_get_contents($file));

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $path,
        ]);

        return Redirect::route('show_product', $product);
    }

    public function delete_product(Product $product)
    {
        $product->delete();
        return Redirect::route('index_product');
    }
}
