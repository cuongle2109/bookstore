<?php

namespace App\Http\Controllers\Mypage;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!isset($_GET['name']) || !isset($_GET['description']) || !isset($_GET['category'])){
            $_GET['name'] = "";
            $_GET['description'] = "";
            $_GET['category'] = "";
        }

        $queryCategory = explode(',', $_GET['category']);


        $categories = Category::all();
        $sql = Product::with('Category')
            ->where('name', 'like', '%' .$_GET['name'] .'%')
            ->where('description', 'like', '%' .$_GET['description'] .'%');

        foreach($queryCategory as $key => $item){
            if($key === 0){
                $sql->whereRaw('category_id like "%' .$item .'%"');
            }else{
                $sql->orWhereRaw('category_id like "%' .$item .'%"');
            }
        }

        $products = $sql->get();

        foreach ($products as $product) {
            $product->photos = explode(",", $product->photo);
        }
        return view('mypage.product', compact('categories', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::all();
        $products = Product::with('Category')
            ->where('category_id', $id)
            ->get();

        $productTops = Product::with('Category')
            ->where('category_id', $id)
            ->where('isTrending', 1)
            ->limit(5)
            ->get();

        foreach ($products as $product) {
            $product->photos = explode(",", $product->photo);
        }

        foreach ($productTops as $product) {
            $product->photos = explode(",", $product->photo);
        }

        return view('mypage.productByCategory', compact('categories', 'products', 'productTops'));
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
