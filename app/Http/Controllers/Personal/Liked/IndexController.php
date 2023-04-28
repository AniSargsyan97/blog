<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use App\Http\Middleware\TrimStrings;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
       $posts = auth()->user()->likedPost;
        return view('personal.liked.index', compact('posts'));
    }
}
