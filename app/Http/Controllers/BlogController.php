<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Redirect;

use App\Models\Blog;

class BlogController extends Controller
{

	protected $blog;

	public function __construct(Blog $blog){
		$this->blog = $blog;
	}

	public function index(Request $request){
		
		$isAdminOrUser = 0;
		
		$userLogged = session()->get('userLogged');
		if(!empty($userLogged)){
			$isAdminOrUser = 1;
		}
		$userType = session()->get('userType');
		
		$userId = session()->get('userId');
		
		$blogs = $this->blog->get()->toArray();

		return view('blogs.index', compact('blogs', 'isAdminOrUser', 'userId', 'userType'));
	}

	public function show($blogId){
		$blog = $this->blog->find($blogId)->toArray();
		//dd($blog);
		return view('blogs.show', compact('blog'));
	}

	
	public function create(){
		return view('blogs.create');
	}
	
	public function store(){
		
		$blog_name 	= 	Input::get("blog_name");
		$blog_text 	= 	Input::get("blog");
		
		$blog = $this->blog;
		$blog->blog_name = $blog_name;
		$blog->blog_text = $blog_text;
		$blog->created_by = session()->get('userId');
		$blog->save();

		if($blog->id){
			return redirect(url('/backend/blogs'))->with("Successfully inserted");
		}
		return Redirect::back()->withErrors(['Sorry Not insert successfully'])->withInput();
		
	}
	
	public function edit($blogId){
		$blog = $this->blog->find($blogId)->toArray();
		return view('blogs.edit', compact('blog'));
	}

	public function update($blogId){
		
		//\DB::enableQueryLog();

		$blog_name 	= 	Input::get("blog_name");
		$blog_text 	= 	Input::get("blog");
		
		/*
		$status = $this->blog->where('id', $blogId)
							->update(['blog_name' => $blog_name, 'blog_text' => $blog_text]);
		*/
		
		$blog = Blog::findOrFail($blogId);
		
		$status = false;

		// Make sure you've got the Page model
		if($blog) {
			$blog->blog_name = $blog_name;
			$blog->blog_text = $blog_text;
			$status = $blog->save();
		}

		if($status){
			return redirect(url('/backend/blogs'))->with("Successfully updated");
		}
		return Redirect::back()->withErrors(['Sorry Not update successfully'])->withInput();
	}
	
}
