<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Session;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        return view('admin.tags.index')->with('tags', Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
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
          'name' =>'required'
      ]);  
    
     Tag::create([
         'name' => $request->name
     ]);
     session()->flash('success_message','Tag Added Successfully');
  
     return redirect(route('tags'));
  
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
        return view('admin.tags.edit')->with('tag',Tag::find($id));
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
 
    $this->validate($request,[
        'name' => 'required'
    ]);
    $tag = Tag::find($id);  
    $tag->name = $request->name;
    $tag->save();
  
    Session::flash('success_message','Tag Updated Successfully');  
    return redirect(route('tags'));
   
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $tag =  Tag::find($id);
        $tag->delete();
        session()->flash('success_message','Tag deleted successfully');
        return redirect(route('tags'));

    }
}
