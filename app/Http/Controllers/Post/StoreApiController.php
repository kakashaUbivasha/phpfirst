<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;


class StoreApiController extends BaseController{
    public function __invoke(StoreRequest $request){
        dd($request);
    }
}


