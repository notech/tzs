<?php
namespace Cooper\Wechat\Facades;
/**
 * Created by PhpStorm.
 * User: xiongyongxin
 * Date: 14-10-22
 * Time: 下午2:37
 */

use Illuminate\Support\Facades\Facade;
class WeChatServer extends Facade {

    protected static function getFacadeAccessor() { return 'wechatserver'; }

}