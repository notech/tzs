<?php

class PostController extends \controller
{
	public function index(){
		$posts = Auth::user()->posts()->paginate(5);
		return Response::json($posts);
	}
}
