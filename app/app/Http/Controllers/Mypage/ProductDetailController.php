<?php

namespace App\Http\Controllers\Mypage;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::with('Category')->get();
        foreach ($products as $product) {
            $product->photos = explode(",", $product->photo);
        }

        $product = Product::find($id);
        $product->photos = explode(",", $product->photo);

        $categories = Category::all();

        $productShuffles = $products->toArray();
        shuffle($productShuffles);
        $productShuffles = array_slice($productShuffles, 0, 6);

        return view('mypage.productDetail', compact(['product','categories','products','productShuffles']));
    }

    public function showAPI($id)
    {
        $product = Product::find($id);
        $product->photos = explode(",", $product->photo);

        return json_encode($product);
    }
}
