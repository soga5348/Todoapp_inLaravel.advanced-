<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class FindController extends Controller
{
    public function index(Request $request){
        $todos = null;
        $builder = Todo::where('user_id',auth()->user()->id);
        if(isset($request->text)){
            
            $builder->where(function($query) use ($request){
                $query->where('content','like','%' . $request->text . '%');
                
            });
            $todos = $builder->get();
        }
        if(isset($request->tag)){
            $builder->where(function($query) use ($request){
                $query->where('tag',$request->tag);
            });
            $todos = $builder->get();
        }

        
        
        return view('find',compact('todos'));
    }
    //
}