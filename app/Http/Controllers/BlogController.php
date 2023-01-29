<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index($id)
	{
		$project = Blog::find($id);
		return view('blog', ['data' => $project, 'type' => 'edit']); 
	}

	/**
	 * Edit the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function edit(Request $request, $id)
	{
		$request->validate([
			'author' => 'required|string|max:255',
			'title' => 'required|string|max:255',
			'description' => 'sometimes|string|max:255',
			'image' => 'sometimes',
		]);

		$blog = Blog::find($id);
		$blog->author = $request->author;
		$blog->title = $request->title;
		$blog->description = $request->description;
		$blog->image = $request->image;
		$blog->save();
		

		return view('home', ['data' => $blog::all()]); 
	}

	/**
	 * Create the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function create(Request $request)
	{
		$request->validate([
			'author' => 'required|string|max:255',
			'title' => 'required|string|max:255',
			'description' => 'sometimes',
			'image' => 'sometimes',
		]);

		$blog = new Blog([
			'author' => $request->author,
			'title' => $request->title,
			'description' => $request->description,
			'image' => $request->image,
		]);
		$blog->save();
		
		return view('home', ['data' => $blog::all()]); 
	}
	
	/**
	 * Delete the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function delete($id)
	{
		$blog = Blog::find($id);
		$blog->delete();
		
		return view('home', ['data' => $blog::all()]); 
	}
}
