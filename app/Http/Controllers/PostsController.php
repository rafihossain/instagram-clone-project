<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	public function index(){
		$users = auth()->user()->following()->pluck('profiles.user_id');

		$posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);

		return view('posts.index', compact('posts'));
	}

    public function create(){
    	return view('posts.create');
	}
	
	public function edit(Post $post){

		return view('posts.edit', compact('post'));
	}

	public function update(Post $post){
		$data = request()->validate([
    		'caption' => 'required',
    		'image' => '',
		]);

    	if (request('image')) {
    		$imagePath = request('image')->store('uploads', 'public');
    		$image = Image::make(public_path("storage/{$imagePath}"))->fit(1266, 768);
    		$image->save();

    		$imageEmpty = ['image' => $imagePath];
    	}

    	$post->update(array_merge(
    		$data,
    		$imageEmpty ?? []
    	));

		return redirect("/p/{$post->id}");
    }
	

    public function store(){

    	$data = request()->validate([
    		'caption' => 'required',
    		'image' => 'required | image', 
    	]);

    		$imagePath = request('image')->store('uploads', 'public');
    		$image = Image::make(public_path("storage/{$imagePath}"))->fit(1266, 768);
    		$image->save();

    		auth()->user()->Posts()->create([
    			'caption' =>$data['caption'],
    			'image' => $imagePath,
    		]);

    		return redirect('/profile/'. auth()->user()->id);
    	
    }

    public function show(Post $post){
		return view('posts.show',compact('post'));
    }
}














































// $d = request()->validate([
//     		'caption' => 'required',
//     		'image' => ['required','image'],
//     	]);

//     	$imagePath = request('image')->store('uploads', 'public');

//     	auth()->user()->Posts()->create([
//     		'caption' => $d['caption'],
//     		'image' => $imagePath,
//     	]);

//     	return redirect('/profile/'. auth()->user()->id);