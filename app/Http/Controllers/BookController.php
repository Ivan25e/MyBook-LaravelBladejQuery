<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
    * Display a listing of the book.
    *
    * @return redirect
    */
    public function index() {
        try{
            if(\Session::has('inSession')){
                $books = Book::where('author_id', \Session::get('id'))->get();
                
                return view('users.profile')
                        ->with('books', $books);
            }else{
                return redirect(route('login'))
                    ->with('warning', 'You need to login.');
            }
        } catch(\Exception $exception){
            return redirect(route('home'))
                ->with('exception', 'You dont have access.');
        }
    }

    /**
    * Show the form for creating a new book.
    *
    * @param  Request  $request
    * @return redirect
    */
    public function create(Request $request) {
        if(\Session::has('inSession'))
            return view('books.create');
        else
            return redirect(route('login'))
                ->with('warning', 'You need to login.');
    }

    /**
    * Store a newly created book in storage.
    *
    * @param  Request  $request
    * @return redirect
    */
    public function store(Request $request) {
        try{

            $book = new Book();
            $book->author_id = \Session::get('id');
            $book->title = $request->title;
            $book->description = $request->description;
            $book->genre = $request->genre;
            $book->language = $request->language;
            $book->pages = $request->pages;
            $path = $request->file('cover')->store('public/books/covers');
            $path = str_replace('public', 'storage', $path);
            $book->cover_path = $path;
            $book->save();

            return redirect(route('user.profile'))
                ->with('success', 'Book created successfully.');

        } catch(\Exception $exception){
            return redirect(route('book.create'))
                ->with('exception', 'The book could not be created.');
        }
    }

    /**
    * Display the specified book.
    *
    * @param  int  $id
    * @return view
    */
    public function show($id) {
        try{

            $book = Book::where('id', $id)->first();

            if($book == null) throw new \ErrorException();

            return view('books.show')
                ->with('book', $book);

        } catch(\Exception $exception){
            return redirect(route('home'))
                ->with('exception', 'The book could not be found.');
        }
    }

    /**
    * Show the form for editing the specified book.
    *
    * @param  int  $id
    * @return view
    */
    public function edit($id) {
        try{

            if(!\Session::has('inSession')){
                return redirect(route('login'))
                    ->with('warning', 'You need to login.');
            }

            $book = Book::where('id', $id)->first();

            if($book == null) throw new \ErrorException();
            
            if($book->author_id != \Session::get('id')){
                return redirect(route('user.profile'))
                    ->with('warning', 'You do not have the permission to edit this book.');
            }

            return view('books.edit')
                        ->with('book', $book);

        } catch(\Exception $exception){
            return redirect(route('home'))
                ->with('exception', 'The book could not be found.');
        }
    }

    /**
    * Update the specified book in storage.
    *
    * @param  Request  $request
    * @param  int  $id
    * @return redirect
    */
    public function update(Request $request, $id) {
        try{

            $book = Book::where('id', $id)->first();
            $book->description = $request->description;
            $book->genre = $request->genre;
            $book->language = $request->language;
            $book->pages = $request->pages;
            $book->save();

            return redirect(route('user.profile'))
                ->with('success', 'Book updated successfully.');

        } catch(\Exception $exception){
            return redirect(route('book.edit', $id))
                ->with('exception', 'The book could not be updated.');
        }
    }

    /**
    * Remove the specified book from storage.
    *
    * @param  int  $id
    * @return redirect
    */
    public function destroy($id) {
        try{

            if(!\Session::has('inSession')){
                return redirect(route('login'))
                    ->with('warning', 'You need to login.');
            }

            $book = Book::where('id', $id)->first();

            if($book == null) throw new \ErrorException();
            
            if($book->author_id != \Session::get('id')){
                return redirect(route('user.profile'))
                    ->with('warning', 'You do not have the permission to delete this book.');
            }

            Book::where('id', $id)->delete();

            return redirect(route('user.profile'))
                ->with('success', 'Book deleted successfully.');

        } catch(\Exception $exception){
            return redirect(route('home'))
                ->with('exception', 'The book could not be found.');
        }
    }
}
