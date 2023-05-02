<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;

use Intervention\Image\ImageManagerStatic as Image;


class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'index', 'show',
        ]]);
    }

    public function index()
    {
        $products = Product::with('categories')->orderBy('updated_at', 'DESC')->get();

        return view('products.index', compact('products'));
    }

    public function show($product_id)
    {
        $product = Product::where('id', $product_id)->with('categories')->first();

        return view('products.show', compact('product'));
    }


    public function create()
    {
        return view('products.create');
    }

    public function store()
    {
        if (request()->image) {
            $image = $this->imageResize(request()->image);
            $imagePathName = ['image' => '/productImages/' . $image];
        }

        $createProduct = Product::create(array_merge(["name" => request()->name, "description" => request()->description], $imagePathName ?? []));

        if (request()->category) {
            $categories =  array_map('intval', request()->category);
            $createProduct->categories()->attach($categories);
        }

        return redirect("/");
    }


    public function edit($product_id)
    {
        $product = Product::where('id', $product_id)->firstOrFail();

        $products_category = ProductCategory::select('categories_id')->where('products_id', $product_id)->pluck('categories_id')->toArray();
        return view('products.edit', compact('product', 'products_category'));
    }

    public function update($product_id)
    {

        //find product by id
        $findProduct = Product::find($product_id);

        //handle image

        if (request()->image) {
            $image = $this->imageResize(request()->image);
            $imagePathName = ['image' => '/productImages/' . $image];
        }

        //update product details
        $findProduct->update(array_merge(["name" => request()->name, "description" => request()->description], $imagePathName ?? []));

        //update product categories
        $categories =  array_map('intval',  request()->category);
        $findProduct->categories()->sync($categories);

        return redirect()->back();
    }


    private function imageResize($imagePath)
    {
        $imageResized = Image::make($imagePath)->resize(300, 300);

        $imageName = time() . '.' . $imagePath->extension();

        $imageResized->save('productImages/' . $imageName, 80);

        return $imageName;
    }
}
