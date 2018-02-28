<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;

class TagsController extends Controller
{
    public function index(Tag $tag)
    {
    	// $posts = $tag->posts()->latest()->paginate(5);
    	$posts = $tag->posts;
    	// dd($posts);
    	return view('posts.index', compact('posts'));
    }
}
