<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;


class UpdateController extends Controller{
    public function __invoke(Request $request,Post $post){
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
}


