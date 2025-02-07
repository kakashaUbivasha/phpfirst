<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;


class StoreController extends Controller{
    public function __invoke(Request $request){
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
}


