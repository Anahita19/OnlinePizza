<?php

namespace App\Http\Controllers\Backend;

use App\Brand;
use App\Category;
use App\Http\Requests\SaveProductRequest;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products =Product::with('photos')->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generateSKU()
    {
        $number = mt_rand(1000, 99999);
        if($this->checkSKU($number)){
            return $this->generateSKU();
        }
        return (string)$number;
    }

    public function checkSKU($number)
    {
        return Product::where('sku', $number)->exists();
    }
 public   function makeSlug($string)
    {
        $string = strtolower($string);
        $string = str_replace(['؟', '?'], '', $string);
        return preg_replace('/\s+/u', '-', trim($string));
    }
    public function store(SaveProductRequest $request)
    {
        $newProduct = new Product();
        $newProduct->title = $request->title;
        $newProduct->sku = $this->generateSKU();
        $newProduct->slug = $this->makeSlug($request->slug);
        $newProduct->status = $request->status;
        $newProduct->supply_qty = $request->supply_qty;
        $newProduct->price = $request->price;
        $newProduct->discount_price = $request->discount_price;
        $newProduct->description = $request->description;
        $newProduct->meta_desc = $request->meta_desc;
        $newProduct->meta_title = $request->meta_title;
        $newProduct->meta_keywords = $request->meta_keywords;
        $newProduct->user_id =  Auth::id();
        $newProduct->save();
        $photos = explode(',', $request->input('photo_id')[0]);
        $newProduct->photos()->sync($photos);
        Session::flash('success', 'successfuly added new Product');
        return redirect('/administrator/products');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $product = Product::with([ 'photos'])->whereId($id)->first();
        return view('admin.products.edit', compact(['product']));
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
        $product = Product::findOrFail($id);
        $product->title = $request->title;
        $product->sku = $this->generateSKU();
//        if($request->input('slug')){
//            $product->slug = make_slug($request->input('slug'));
//        }else{
//            $product->slug = make_slug($request->input('title'));
//        }
        $product->slug = $this->makeSlug($request->slug);
        $product->status = $request->status;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->description = $request->description;

        $product->meta_desc = $request->meta_desc;
        $product->meta_title = $request->meta_title;
        $product->meta_keywords = $request->meta_keywords;
        $product->user_id = Auth::id();

        $product->save();

        $photos = explode(',', $request->input('photo_id')[0]);


        $product->photos()->sync($photos);

        Session::flash('success', 'successfuly Edit product');
        return redirect('/administrator/products');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        Session::flash('delete-pro', 'successfuly deleted product.');
        return redirect('/administrator/products');
    }
}
