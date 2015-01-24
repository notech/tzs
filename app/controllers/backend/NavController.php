<?php namespace Backend;

use \View;
use \Input;
use \Nav;
use \Redirect;
use \Validator;

class NavController extends BaseController {

	/**
	 * 所有导航
	 *
	 * @return Response
	 */
	public function getAll()
	{
		$links = Nav::paginate(15);
		return View::make('backend.pages.nav-all')->withLinks($links);
	}

	public function postCreate()
	{
		$nav = new Nav();

		$rules = array(
			'title' => 'required',
			'url'   => 'url'
		);

		$validator = Validator::make(Input::all(), $rules);

		// Validation fails
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}


		$nav->title = Input::get('title');
		$nav->url = Input::get('url');
		$nav->save();
		return Redirect::back()->withMessage("导航添加成功！");
	}

	/**
	 * 编辑链接
	 *
	 * @return Response
	 */
	public function getEdit($id)
	{
		return View::make('backend.pages.link-edit');
	}

	/**
	 * 删除链接
	 *
	 * @param  integer $id
	 *
	 * @return Response
	 */
	public function anyDelete($id)
	{
		Nav::findOrFail($id)->delete();
		return Redirect::back()->withMessage("删除成功！");
	}

}