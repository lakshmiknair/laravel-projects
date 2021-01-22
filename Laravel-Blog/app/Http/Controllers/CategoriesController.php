<?php

namespace App\Http\Controllers;
use App\Category;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Session;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     //   dd(Category::all());
        return view('admin.categories.index')->with('categories', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    //public function store(Request $request)
    public function store(CreateCategoryRequest $request)
    {
      //dd($request->all());    
      //$this->validate($request, [
     //     'name' =>'required'
      //]);  
     //$category = new Category();
     //$category ->name = $request->name;
     //$category->save();

     Category::create([
         'name' => $request->name
     ]);
     session()->flash('success_message','Category Added Successfully');
  
     return redirect(route('categories'));
     //return redirect()->back();
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
        return view('admin.categories.edit')->with('category',Category::find($id));
    }

    /*public function edit(Category $category)
    {
        return view('categories.create')->with('category',$category);
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function update(Request $request, $id)
{
  //dd($request->all());
    $this->validate($request,[
        'name' => 'required'
    ]);
    $category = Category::find($id);  
    $category->name = $request->name;
    $category->save();
    //session()->flash('success_message','Category Updated Successfully');
    Session::flash('success_message','Category Updated Successfully');  
    return redirect(route('categories'));
   // return redirect()->back();
}

    /* 
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update([
            'name' =>$request->name
        ]); 
       
        session()->flash('success_message','Category Updated Successully');
        return redirect(route('categories.index'));
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category =  Category::find($id);      
        foreach($category->posts as $post)
        {
           // $post->forceDelete();
           $post->delete();
        }
        $category->delete();
        session()->flash('success-message','Category deleted successfully');
        return redirect(route('categories'));

    }
}
