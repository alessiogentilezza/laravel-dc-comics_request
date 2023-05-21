<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {

        // $comics = Comic::all();
        // return view('welcome',compact('comics'));

        return view('welcome');

        // SE VOLESSI MANDARE LA HOME DIRETTAMENTE IN UN'ALTRA PAGINA
        // return redirect()->route('comics.index');
    }
}
