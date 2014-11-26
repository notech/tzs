<?php  namespace Cooper\Wechat\Facades;
/**
 * Created by PhpStorm.
 * User: xiongyongxin
 * Date: 14-10-22
 * Time: 下午6:44
 */
use Illuminate\Support\Facades\Facade;

class WeChatClient extends Facade {

    protected static function getFacadeAccessor() { return 'wechatclient'; }

}