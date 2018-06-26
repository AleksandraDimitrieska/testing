<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function create()
    {
    	return view('Book.create');
    }

    public function edit($id)
    {
    	$book = Book::find($id);
    	return view('Book.edit')->with('book', $book);
    }

    public function update(Request $request, $id)
    {
    	 //$book = Book::find($id);
    	 dd('ffff');
    	// $book->name = $request->input('name');
    	// $book->author = $request->input('author');

    	// $book->numberOfSamples = $request->input('numberOfSamples');
    	// $book->save();
    	
    	        return response('Hello World', 200)
                  ->header('Content-Type', 'application/json');

    }

    public function index()
    {
    	$books = Book::all();
    	return view('Book.index')->with('books', $books);
    }
    public function single($id)
    {
    	$book = Book::find($id);
    	return view('Book.single')->with('book', $book);
    }

    public function save(Request $request)
    {
    	$book = new Book();
    	$book->name = $request->name;
    	$book->author = $request->author;
    	$book->numberOfSamples = $request->numberOfSamples;

    	$book->save();
    	return redirect('/Books');
    }
}
