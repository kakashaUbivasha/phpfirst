<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        $tags = Tag::find(1);
        dd($tags->posts);
        return view('post.index', compact('posts'));
//            $post = Post::find(1);
//            $tag = Tag::find(3);
//            dd($tag->posts);
    }
    public function create(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }
    public function store(Request $request)
    {

        $data = $request->validate([
            'title' => 'string|required',
            'content' => 'string|required',
            'image' => 'string|required',
            'category_id' => 'integer|required',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data["tags"]);
        $post =  Post::create($data);
        dump('create post', $data);
        $post->tags()->attach($tags);
        dump('create tags', $tags);
        return redirect()->route('post.index');
    }
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }
    public function edit(Post $post){
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact(['post', 'categories', 'tags']));
    }
    public function update(Request $request, Post $post){
        $data = $request->validate([
            'title' => 'string|required',
            'content' => 'string|required',
            'image' => 'string|required',
            'category_id' => 'integer|required',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data["tags"]);
        $post->update();
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);
    }
    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('post.index');
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
