<?php

class PostController extends \controller
{
	public function index($id = 1){
		if($id){
			$post = Post::findOrFail($id);
		}else{
			$post = DB::table('posts')->get();
		}
		return View::make('font.post')->withPost($post);
	}
}
