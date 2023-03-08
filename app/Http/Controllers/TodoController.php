<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(){
        
        $todos = Todo::where('user_id',auth()->user()->id)->get();
        return view('index',compact('todos'));
    }
    public function store(TodoRequest $request){
        
        $todo = new Todo();
        $todo->fill($request->all());
        $todo->user_id = auth()->user()->id;
        $todo->save();
        return redirect()->route('index');
    }
    // public function update(UpdateRequest $request, Todo $todo){
    //     $todo->fill($request->all());
    //     $todo->save();
    //     return redirect()->route('index');
    // }

    public function update(UpdateRequest $request, Todo $todo){
        $todo->content = $request->input('content_update');
        $todo->tag = $request->input('tag');
        $todo->save();
        return redirect()->route('index');
    }
    
    public function delete(Todo $todo){
        $todo->delete();
        return redirect()->route('index');
    }
    //
}
