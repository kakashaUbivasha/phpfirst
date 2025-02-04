<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::where('is_published', 1)->get();
        return view('posts', compact('posts'));

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
    public function delete(){
        $post = Post::find(3);
        $post->delete();
    }
    public function firstOrCreate(){
            $anotherPost= [
                'title' => 'some post',
                'content' => 'some content1',
                'image' => 'some image',
                'likes' => 11,
                'is_published' => 0,
            ];
            $post = Post::firstOrCreate(['title'=>'some post'], $anotherPost);
            dump($post->content);
            dd('finish');
    }
    public function updateOrCreate(){
        $anotherPost= [
            'title' => 'some post',
            'content' => 'some content1',
            'image' => 'some image',
            'likes' => 111,
            'is_published' => 0,
        ];
        $post = Post::updateOrCreate(['title'=>'some post'], $anotherPost);
        dump($post->content);
        dd('finish');
    }
}
