<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $books = Book::where('pages', 320)->get();
        foreach($books as $book){
            dd($book->pages);
        }
    }
    public function create(){
        $booksArray = [
            [
                'title' =>'title1',
                'author' =>'author1',
                'pages' => 320,
                'publisher'=>'publisher1',
            ],
            [
                'title' =>'title2',
                'author' =>'author3',
                'pages' => 310,
                'publisher'=>'publisher2',
            ]

        ];
        foreach($booksArray as $book){
            Book::create($book);
        }
        dd('create success');
    }
    public function update(){
        $book = Book::find(1)->update([
            'title'=>'title3',
        ]);
        dd('update success');
    }
}
