<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\Repositories\Posts;

use Carbon\Carbon;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Posts $posts)
    {
        // dd($posts);
        // $posts = $posts->all();

        // $posts = Post::all();

    	$posts = Post::latest()

                ->filter(request(['month','year']))

                ->get();

    	return view('posts.index', compact('posts') );
    }

    public function create()
    {
    	return view('posts.create');
    }

    public function store()
    {
    	// $post = new Post;

    	// $post->title = request('title');
    	// $post->body = request('body');

    	// $post->save();

    	// Post::create([
    	// 		'title' => request('title'),
    	// 		'body' => request('body')
    	// 	]);

    	$this->validate(request(),
            [
    			'title' => 'required',
    			'body' => 'required'
            ]
        );

    	// Post::create(request(['title', 'body']));
        
        // Post::create(
        //     [
        //         'title' => request('title'),
        //         'body' => request('body'),
        //         'user_id' => auth()->id()
        //     ]
        // );

        auth()->user()->publish(

            new Post(request(['title', 'body']))
        );

        flash('Your post has been published.')->success();

        flash()->overlay('Modal Message', 'Modal Title');

    	return redirect('/');
    }

    public function show($id)
    {
    	$post = Post::find($id);
    	return view('posts.show', compact('post') );
    }
}
