<?php

class PostController extends \controller
{
	public function index($id = 1){
		if($id){
			$post = Post::findOrFail($id);
		}else{
			$post = DB::table('posts')->get();
		}
		$decode_content = Markdown::render($post->post_content);
		return View::make('font.post')->withPost($post)->withDecode($decode_content);
	}
}
