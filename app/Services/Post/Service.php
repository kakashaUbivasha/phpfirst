<?php

namespace App\Services\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class Service
{
    public function store($data){
        try{
            DB::beginTransaction();
            $tags = $data['tags'];
            $category = $data['category'];
            unset($data["tags"], $data['category']);
            $tagIds = $this->getTagIds($tags);
            $data['category_id'] = $this->getCategoryId($category);
            $post =  Post::create($data);
            $post->tags()->attach($tagIds);
            DB::commit();
        }
        catch (\Exception $exception){
            DB::rollBack();
            return $exception->getMessage();
        }
        return $post;
    }
    public function update($post, $data){
        try{
            DB::beginTransaction();
            $tags = $data['tags'];
            $category = $data['category'];
            unset($data["tags"], $data['category']);

            $tagIds = $this->getTagIdsUpdate($tags);
            $data['category_id'] = $this->getCategoryIdUpdate($category);

            $post->update($data);
            $post->tags()->sync($tagIds);
            DB::commit();
        }
        catch (\Exception $exception){
            DB::rollBack();
            return $exception->getMessage();
        }
        return $post->fresh();
    }
    private function getCategoryId($category){
        $category = !isset($category['id'])? Category::create($category):Category::find($category->id);
        return $category->id;

    }
    private function getCategoryIdUpdate($category){
        if(!isset($category['id'])){
            $category = Category::create($category);
        }else{
            $currentCat = Tag::find($category['id']);
            $currentCat->update($category);
            $category = $currentCat->fresh();
        }
        return $category->id;

    }
    private function getTagIds($tags)
    {
        $tagsId = [];
        foreach ($tags as $tag){
            $tag = !isset($tag['id'])?Tag::create($tag):Tag::find($tag['id']);
            $tagsId[] = $tag->id;
        }
        return $tagsId;
    }
    private function getTagIdsUpdate($tags)
    {
        $tagsId = [];
        foreach ($tags as $tag){
            if(!isset($tag['id'])){
                $tag = Tag::create($tag);
            } else{
                $currentTag = Tag::find($tag['id']);
                $currentTag->update($tag);
                $tag = $currentTag->fresh();
            }
            $tagsId[] = $tag->id;
        }
        return $tagsId;
    }
}
