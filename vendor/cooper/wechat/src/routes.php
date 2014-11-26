<?php
/*
|--------------------------------------------------------------------------
| Wechat Routes
|--------------------------------------------------------------------------
*/

// 测试
//
Route::any('api/wechat/test', array(
    'as'     => 'wechat.test',
    'uses'   => 'Cooper\Wechat\Controllers\WechatController@test',
));

//测试 Facade
Route::any('/weixin',function(){

//    //获取接收到的消息
//    $message = WeChatServer::getMessage();
//    return $message;

//     //获取消息发送者的用户id
//    $userId = WeChatServer::getFromUserId();
//    return $userId;

//     //获取接收消息的公众账户appId
//    $appId = WeChatServer::getAppId();
//    return $appId;

//    //创建用来发送给用户的信息
//    $text = 'hellow laravel facades';
//    $response = WeChatServer::getXml4Txt($text);
//    return $response;


    //测试
    $userId = WeChatServer::getFromUserId();
    $sendTextMsg =WeChatClient::sendTextMsg($userId,'hello laravel');
    dd($sendTextMsg);



});
