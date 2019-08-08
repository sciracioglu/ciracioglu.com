<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Yazi;

class YaziController extends Controller
{

    public function index(){
        $yazilar = Yazi::all();

        return view('yazi.index',compact('yazilar'));
    }

    public function show(Yazi $yazi)
    {
        if($yazi->status != 1){
            return redirect('login');
        }
        return view('yazi.show',compact('yazi'));
    }
    
    public function create(){
        return view('yazi.create');
    }

    public function store(){
        $attributes = request()->validate([
            'title'=>'required',
            'description' =>'required',
            'status' =>'required|int|min:0|max:1',
        ]);

        //$attributes['owner_id'] = auth()->id();
        
        auth()->user()->yazilar()->create($attributes);
        
        return redirect('/yazi');
    }
}
