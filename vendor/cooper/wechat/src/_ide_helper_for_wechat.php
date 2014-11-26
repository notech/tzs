<?php 
 namespace{
    exit("这个文件是用来为IDE进行解析,请不要具体使用");

    class WeChatServer {
        public static function getMessage()
        {
            return \Cooper\Wechat\WeChatServer::getMessage();
        }

        public static function getFromUserId()
        {
            return \Cooper\Wechat\WeChatServer::getFromUserId();
        }

        public static function getAppId()
        {
            return \Cooper\Wechat\WeChatServer::getAppId();
        }


        public static function getXml4Txt($txt)
        {
            return \Cooper\Wechat\WeChatServer::getXml4Txt($txt);
        }

        public static function getXml4ImgByMid($mid)
        {
            return \Cooper\Wechat\WeChatServer::getXml4ImgByMid($mid);
        }

        public static function getXml4VoiceByMid($mid)
        {
            return \Cooper\Wechat\WeChatServer::getXml4VoiceByMid($mid);
        }

        public static function getXml4VideoByMid($mid, $title, $desc = '')
        {
            return \Cooper\Wechat\WeChatServer::getXml4VideoByMid($mid, $title, $desc);
        }

        public static function getXml4MusicByUrl($url, $thumbmid, $title, $desc = '', $hqurl = '')
        {
            return \Cooper\Wechat\WeChatServer::getXml4MusicByUrl($url, $thumbmid, $title, $desc, $hqurl);
        }

        public static function getXml4RichMsgByArray($list)
        {
            return \Cooper\Wechat\WeChatServer::getXml4RichMsgByArray($list);
        }

    }

    class WeChatClient {

        public static function error()
        {
            return \Cooper\Wechat\WeChatClient::error(); //
        }

        public static function checkIsSuc($res)
        {
            return \Cooper\Wechat\WeChatClient::checkIsSuc($res); //
        }

        public static function getAccessToken($tokenOnly = 1, $nocache = 0)
        {
            return \Cooper\Wechat\WeChatClient::getAccessToken($tokenOnly, $nocache); //
        }

        public static function setAccessToken($tokenInfo)
        {
            \Cooper\Wechat\WeChatClient::setAccessToken($tokenInfo); //
        }

        public static function upload($type, $file_path, $mediaidOnly = 1)
        {
            return \Cooper\Wechat\WeChatClient::upload($type, $file_path, $mediaidOnly); //
        }

        public static function download($mid)
        {
            return \Cooper\Wechat\WeChatClient::download($mid); //
        }

        public static function getMenu()
        {
            return \Cooper\Wechat\WeChatClient::getMenu(); //
        }

        public static function deleteMenu()
        {
            return \Cooper\Wechat\WeChatClient::deleteMenu(); //
        }

        public static function setMenu($myMenu)
        {
            return \Cooper\Wechat\WeChatClient::setMenu($myMenu); //
        }

        public static function sendTextMsg($to, $msg)
        {
            return \Cooper\Wechat\WeChatClient::sendTextMsg($to, $msg); //
        }

        public static function sendImgMsg($to, $mid)
        {
            return \Cooper\Wechat\WeChatClient::sendImgMsg($to, $mid); //
        }

        public static function sendVoice($to, $mid)
        {
            return \Cooper\Wechat\WeChatClient::sendVoice($to, $mid); //
        }

        public static function sendVideo($to, $mid, $title, $desc)
        {
            return \Cooper\Wechat\WeChatClient::sendVideo($to, $mid, $title, $desc); //
        }

        public static function sendMusic($to, $url, $mid, $thumb_mid, $title, $desc = '', $hq_url = '')
        {
            return \Cooper\Wechat\WeChatClient::sendMusic($to, $url, $mid, $thumb_mid, $title, $desc, $hq_url); //
        }

        public static function sendRichMsg($to, $articles)
        {
            return \Cooper\Wechat\WeChatClient::sendRichMsg($to, $articles); //
        }

        public static function createGroup($name)
        {
            return \Cooper\Wechat\WeChatClient::createGroup($name); //
        }

        public static function renameGroup($gid, $name)
        {
            return \Cooper\Wechat\WeChatClient::renameGroup($gid, $name); //
        }

        public static function getAllGroups()
        {
            return \Cooper\Wechat\WeChatClient::getAllGroups(); //
        }

        public static function moveUserById($uid, $gid)
        {
            return \Cooper\Wechat\WeChatClient::moveUserById($uid, $gid); //
        }

        public static function getGroupidByUserid($uid)
        {
            return \Cooper\Wechat\WeChatClient::getGroupidByUserid($uid); //
        }

        public static function getUserInfoById($uid, $lang = '')
        {
            return \Cooper\Wechat\WeChatClient::getUserInfoById($uid, $lang); //
        }

        public static function getFollowersList($next_id = '')
        {
            return \Cooper\Wechat\WeChatClient::getFollowersList($next_id); //
        }

        public static function getOAuthConnectUri($redirect_uri, $state = '', $scope = 'snsapi_base')
        {
            return \Cooper\Wechat\WeChatClient::getOAuthConnectUri($redirect_uri, $state, $scope); //
        }

        public static function getAccessTokenByCode($code)
        {
            return \Cooper\Wechat\WeChatClient::getAccessTokenByCode($code); //
        }

        public static function refreshAccessTocken($refresh_token)
        {
            return \Cooper\Wechat\WeChatClient::refreshAccessTocken($refresh_token); //
        }

        public static function getUserInfoByAuth($access_token, $openid, $lang = 'zh_CN')
        {
            return \Cooper\Wechat\WeChatClient::getUserInfoByAuth($access_token, $openid, $lang); //
        }

        public static function getQrcodeImgByTicket($ticket)
        {
            return \Cooper\Wechat\WeChatClient::getQrcodeImgByTicket($ticket); //
        }

        public static function getQrcodeImgUrlByTicket($ticket)
        {
            return \Cooper\Wechat\WeChatClient::getQrcodeImgUrlByTicket($ticket); //
        }

        public static function getQrcodeTicket($options = array())
        {
            return \Cooper\Wechat\WeChatClient::getQrcodeTicket($options); //
        }

    }


 }

