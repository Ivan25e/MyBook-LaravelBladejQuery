<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class SearchController extends Controller
{
    /**
    * Show the search view
    *
    * @return view
    */
    public function index(){
        return view('search');
    }

    /**
    * Returns the search results
    *
    * @return view
    */
    public function results(Request $request){

        $books = Book::where('title', 'like', '%'.$request->title.'%')
                        ->where('language', 'like', '%'.$request->language.'%')
                        ->where('genre', 'like', '%'.$request->genre.'%')
                        ->orderBy('title', 'DESC')
                        ->get();

        return $books;
    }
}
