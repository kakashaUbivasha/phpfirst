<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $books = Book::all();
        return view('book.index', compact('books'));
//        $category = Category::find(1);
//        dd($category->books);
    }
    public function create(){
        return view('book.create');
    }
    public function store(Request $request){
        Book::create($request->validate([
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'pages' => 'required',
        ]));
        return redirect()->route('book.index');
    }
    public function show(Book $book)
    {
        return view('book.show', compact('book'));
    }
    public function edit(Book $book){
        return view('book.edit', compact('book'));
    }
    public function update(Request $request, Book $book){
        $book->update($request->validate([
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'pages' => 'required',
        ]));
        return redirect()->route('book.show', $book->id);
    }
    public function destroy(Book $book){
        $book->delete();
        return redirect()->route('book.index');
    }
}
