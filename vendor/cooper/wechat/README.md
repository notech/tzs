#微信公众平台 Laravel SDK

##使用帮助

###1、安装

请先确认已经安装Composer. 编辑项目中的 `composer.json` 文件，然后加入 `cooper/wechat`.

```
"require": {
	"cooper/wechat": "dev-master"
}
```

更新包 `composer update` 或者初始化包 `composer install`。

需要添加以下服务到系统。

打开 `app/config/app.php` ， 然后添加新的值到 `providers` 数组：

```
'Cooper\Wechat\WechatServiceProvider',
```

在`'aliases' => array()`添加

```
    'WeChatServer'    => 'Cooper\Wechat\Facades\WeChatServer',
    'WeChatClient'    => 'Cooper\Wechat\Facades\WeChatClient',
    
```

执行 `php artisan config:publish cooper/wechat` ,然后修改 `app/config/packages/cooper/wechat` 中的配置文件 `wechat.php` 。

把微信公众号的 `Token` `appId` `appSecret` 改为对应的。

##2、使用

* 命名空间加载类：

`use \Cooper\Wechat\WeChatServer` 可以传参 `Token`，不传则使用`wechat.php`配置的参数。

`use \Cooper\Wechat\WeChatClient` 可以传参 `appId` `appSecret` , 不传同上。

* 不用命名空间加载,和new, 直接按照静态方式使用`WeChatServer`,`WeChatClient`:

```
Route::any('/weixin',function(){

    //获取接收到的消息
    $message = WeChatServer::getMessage();
    return $message;
})

```

##3、类（说明）

###WeChatServer 主要实现的是“被动”接收消息和处理功能，如被动接收文本消息及回复，被动接收语音消息及回复等。

* getMessage 获取微信推送过来消息数据

  ```
        $message = WeChatServer::getMessage();

  ```


* 被动响应消息(静态方法)

  ```
        Route::any('/weixin',function(){
 
            $text = 'hello laravel';
            $response = WeChatServer::getXml4Txt($text);
            return $response;
        
        });

   ```

   * getXml4Txt 生成用于回复文本消息XML
   * getXml4ImgByMid 生成用于回复图片消息XML
   * getXml4VoiceByMid 生成用于回复音频消息XML
   * getXml4VideoByMid 生成用于回复视频消息XML
   * getXml4MusicByUrl 生成用于回复音乐消息XML
   * getXml4RichMsgByArray 生成用于回复图文消息XML

* getFromUserId 获取发送者的openId

    ```
    $userId = WeChatServer::getFromUserId();
    
    ```
* getAppId 获取接收到消息的公众账户的id

    ```
    $appId = WeChatServer::getAppId();
    
    ```


###WeChatClient 主要实现的是“主动”请求功能，如发送客服消息，群发消息，创建菜单，创建二维码等。

* error (静态方法)返回错误信息对应的描述
* checkIsSuc (静态方法)判断结果状态

获取access token

* getAccessToken 获取AccessToken
* setAccessToken 设置AccessToken

上传下载多媒体文件

* upload 上传多媒体文件
* download 下载多媒体文件

自定义菜单

* getMenu 获取自定义菜单
* deleteMenu 删除自定义菜单
* setMenu 设置自定义菜单

发送客服消息

```
   //通过WeChatServer 获取发送消息的用户的openId
   $userId = WeChatServer::getFromUserId();
   
   //做一些数据处理操作....
   //时间流逝....
   //得到结果
   $text = 'Some results';
   
   //以文本方式发送
   $sendTextMsg =WeChatClient::sendTextMsg($userId,$text);
   
   dd($sendTextMsg);//在实际环境返回布尔值,在debug='true'时返组装好的字符串
```

* sendTextMsg 发送文本消息
* sendImgMsg 发送图片消息
* sendVoice 发送语音消息
* sendVideo 发送视频消息
* sendMusic 发送音乐消息
* sendRichMsg 发送图文消息

用户管理

* createGroup 创建分组
* renameGroup 修改分组名
* getAllGroups 查询所有分组
* moveUserById 移动用户分组
* getGroupidByUserid 查询用户所在分组
* getUserInfoById 获取用户基本信息
* getFollowersList 获取关注者列表

网页授权获取用户基本信息（顺序执行）

* getOAuthConnectUri 用户同意授权，获取code
* getAccessTokenByCode 通过code换取网页授权access_token
* refreshAccessTocken 刷新access_token（如果需要）
* getUserInfoByAuth 拉取用户信息(需scope为 snsapi_userinfo)

生成带参数的二维码

* getQrcodeImgByTicket 通过ticket换取二维码
* getQrcodeTicket 创建二维码ticket
 
##4、测试

安装 Chrome 插件

[Postman - REST Client](https://chrome.google.com/webstore/detail/postman-rest-client/fdmmgilgnpjigdojojpjoooidkmcomcm)

Url后面添加  `debug=true` 即可跳过验证:

```
   http://localhost:8000/weixin?debug=true
```

##5、环境
PHP >= 5.4  
Laravel >= 4.2 

##6、License
This is free software distributed under the terms of the MIT license
