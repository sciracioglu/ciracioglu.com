<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class KategoriController extends Controller
{

    public function index()
    {
        $kategoriler = Kategori::get();
        
        return view('kategori',compact('kategoriler'));
    }
    

    public function store()
    {
        request()->validate(['title' => 'required']);
        Kategori::create(request('title'));
        
        return redirect('/kategori');
    }
    
}
