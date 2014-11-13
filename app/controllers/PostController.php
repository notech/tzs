<?php

class PostController extends \controller
{
	public function index($id = 1){
		if($id){
			$s = Post::findOrFail($id);
		}else{
			$s = DB::table('posts')->get();
		}
		return Response::json($s);
	}
}
