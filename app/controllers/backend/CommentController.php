<?php namespace Backend;

use \View;
use \Input;
use \Comment;
use \Redirect;
use \Validator;
use \Jwt;

class CommentController extends BaseController {

	/**
	 * 所有评论
	 *
	 * @return Response
	 */
	public function getAll()
	{
		$token = array(
    		"short_name"=>"tianzengsi",
    		"user_key"=>"1",
    		"name"=>"admin",
		);
		$duoshuoToken = Jwt::encode($token, '5647345c482ad1e75dcd3174742e8973');

		$comments = Comment::paginate(15);
		return View::make('backend.pages.comment-all')->withComments($comments)->withToken($duoshuoToken);
	}

	/**
	 * 回复评论
	 *
	 * @return Response
	 */
	public function postReply()
	{
		//
	}

	/**
	 * 删除评论
	 *
	 * @param  integer $id
	 * 
	 * @return Response
	 */
	public function getDelete($id)
	{
		return Comment::findOrFail($id)->delete();
	}

}