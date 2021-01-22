<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('Products.index')->with('products', Product::paginate(5));
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
        $this->validate($request, [
            'name' => 'required',
            'price'=>'required',
            'image'=>'required|image',
            'description'=>'required'
        ]);
        
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description =  $request->description;
        $image =  $request->image;      
        $image_new = time(). $image->getClientOriginalName();
        $image->move('uploads/products', $image_new);
        $product->image = "uploads/products/".$image_new;
        $product->save();
        session()->flash('success_message','Product added successfully');
        return redirect(route('products.index'));


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
        return view('products.edit')->with('product',$product);
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
        $this->validate($request, [
            'name' => 'required',
            'price'=>'required',
            'image'=>'required|image',
            'description'=>'required'
        ]);
        $product  = Product::find($id);

        if($request->hasFile('image'))
        {
            $image =  $request->image;      
            $image_new = time(). $image->getClientOriginalName();
            $image->move('uploads/products', $image_new);
            $product->image = "uploads/products/".$image_new;
         
        }

      
        $product->name = $request->name;
        $product->description =  $request->description;
        $product->price = $request->price;
        $product->save();    

        session()->flash('success_message','Product updated successfully');
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::destroy($id);
        session()->flash('success_message','Product deleted successfully');
        return redirect(route('products.index'));
    }
}
