<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->except('index');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();

        return view('products.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:20|unique:products',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        if ($data) {
            $product = Product::create($data);

            if ($product) {
                return redirect()->route('products.index')->with('successMessage', 'New Product Added successfully');
            } else {
                return back()->with('errorMessage', 'We can\'t add new product, please try again leter.');
            }
        } else {
            return back()->with('errorMessage', 'We can\'t add new product, please try again leter.');
        }
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
        $product = Product::find($id);

        return view('products.edit',[
            'product' => $product
        ]);
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
        $product = Product::find($id);
        
        $data = $request->validate([
            'name' => 'required|max:20|unique:products,name,'.$id,
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        if ($data) {
            $product->update($data);

            if ($product) {
                return redirect()->route('products.index')->with('successMessage', 'Product updated successfully');
            } else {
                return back()->with('errorMessage', 'We can\'t update this product, please try again leter.');
            }
        } else {
            return back()->with('errorMessage', 'We can\'t update this product, please try again leter.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            return redirect()->route('products.index')->with('successMessage', 'Product deleted successfully');
        } else {
            return back()->with('errorMessage', 'We can\'t delete this product, please try again leter.');
        }
    }
}
