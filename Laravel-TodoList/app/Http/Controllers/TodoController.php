<?php

namespace App\Http\Controllers;
use App\Todo;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {

      //  return view('todo/index')->with('tasks',Todo::all());
        return view('todo/index')->with('tasks',Todo::all());
    }
    public function show($todoId)
    {

      //  dd($todoId);
      return view('todo/show')->with('todoView', Todo::find($todoId));
    }
    public function create()
    {
        
        return view('todo/create');
    }
    public function edit($todoId)
    {
     
       $todo = Todo::find($todoId);
       return view('todo/edit')->with('todo',$todo);
    }
    public function update($todoId){

    
      $this->validate(request(),[
        'name' => 'required|min:6|max:8',
        'description' =>'required'
             ]);
             $todo = Todo::find($todoId);
             $data = request()->all();
             $todo->name = $data['name'];
             $todo->description = $data['description'];
           
             $todo->save();
            session()->flash('success', 'Todo updated Successfully');
             return redirect('todo');
    }
    public function complete($todoId){

             $todo = Todo::find($todoId);
             $todo->completed = true;
             $todo->save();
             session()->flash('success', 'Todo Item Completed Successfully');
             return redirect('todo');
    }
    public function delete($todoId)
    {
        $res = Todo::find($todoId);
        $res->delete();
        session()->flash('success', 'Todo deleted Successfully');
        return redirect('todo');
    }
    public function store()
    {
     // dd(request()->all());
     $this->validate(request(),[
'name' => 'required|min:6|max:8',
'description' =>'required'
     ]);
     $data = request()->all();
     $todo = new Todo();
     $todo->name = $data['name'];
     $todo->description = $data['description'];
     $todo->completed = true;
     $todo->save();
     session()->flash('success', 'Todo created Successfully');      
     return redirect('todo');
    }
}
