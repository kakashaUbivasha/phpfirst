<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::where('is_published', 1)->get();
        foreach($posts as $post){
            dump($post->title);
        }
        dd('end');
    }
    public function create(){
        $postsArray = [
            [
                'title' => 'title custom',
                'content' => 'content custom',
                'image' => 'image custom',
                'likes' => 10,
                'is_published' => 1,
            ],
            [
                'title' => 'title1 custom',
                'content' => 'content 1custom',
                'image' => 'image1 custom',
                'likes' => 101,
                'is_published' => 1,
            ],

        ];
        foreach($postsArray as $post){
            Post::create($post);
        }
        dd('created');
    }
    public function update(){

    }
}
