<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyPageController extends Controller
{
    public function index(){
        return 'hi maks';
    }
}
