<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoriler = Kategori::get();

        return view('kategori', compact('kategoriler'));
    }

    public function store()
    {
        Kategori::create(request()->validate(['title' => 'required']));

        return redirect('/kategori');
    }
}
