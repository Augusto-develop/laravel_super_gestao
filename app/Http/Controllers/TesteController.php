<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class TesteController extends Controller
{
    public function teste(int $p1, int $p2): View
    {
        //array associativo
        // return view('site.teste', [
        //     'p1' => $p1,
        //     'p2' => $p2
        // ]);

        //compact
        return view('site.teste', compact('p1', 'p2'));

        //with()
        // return view('site.teste')->with('p1', $p1)->with('p2', $p2);
    }
}
