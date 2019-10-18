<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index (){
        $destaques = \App\Models\Post::where([
            'status' => 'A',
            'featured' => 1
        ])->orderBy('date', 'desc')->take(3)->get();

        $posts = \App\Models\Post::where([
            'status' => 'A'
        ])->orderBy('date', 'desc')->paginate(10);

        return view('site.index', compact('destaques', 'posts'));
        
    }

    public function contato (){

        return view('site.pages.contato');

    }

    public function empresa (){

        return view('site.pages.empresa');

    }
}
