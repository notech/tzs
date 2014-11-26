<?php namespace Cooper\Wechat;

use Illuminate\Support\ServiceProvider;

class WechatServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('cooper/wechat');

		// 加载路由
		//
		include __DIR__ .'/../../routes.php';

		// 加载过滤数据
		//
		include __DIR__ .'/../../filters.php';
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app->bind('wechatserver', 'Cooper\Wechat\WeChatServer');
        $this->app->bind('wechatclient', 'Cooper\Wechat\WeChatClient');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('wechat');
	}

}
