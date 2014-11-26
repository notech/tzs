<?php namespace Cooper\Wechat;

use Illuminate\Support\Facades\Input as Input;
use Illuminate\Support\Facades\Config as Config;
use Illuminate\Support\Facades\Cache as Cache;

/**
 * Class WeChatClient 微信接口
 *
 * @package Cooper\Wechat
 */
class WeChatClient {

    public static $_URL_API_ROOT = 'https://api.weixin.qq.com';

    public static $_URL_FILE_API_ROOT = 'http://file.api.weixin.qq.com';

    public static $_URL_QR_ROOT = 'http://mp.weixin.qq.com';

    public static $_QRCODE_TICKET_DEFAULT_ID = 1;

    public static $ERRCODE_MAP = array(
        '-1'    => '&#x7CFB;&#x7EDF;&#x7E41;&#x5FD9;',
        '0'     => '&#x8BF7;&#x6C42;&#x6210;&#x529F;',
        '40001' => '&#x83B7;&#x53D6;access_token&#x65F6;AppSecret&#x9519;&#x8BEF;&#xFF0C;&#x6216;&#x8005;access_token&#x65E0;&#x6548;',
        '40002' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;&#x51ED;&#x8BC1;&#x7C7B;&#x578B;',
        '40003' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;OpenID',
        '40004' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;&#x5A92;&#x4F53;&#x6587;&#x4EF6;&#x7C7B;&#x578B;',
        '40005' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;&#x6587;&#x4EF6;&#x7C7B;&#x578B;',
        '40006' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;&#x6587;&#x4EF6;&#x5927;&#x5C0F;',
        '40007' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;&#x5A92;&#x4F53;&#x6587;&#x4EF6;id',
        '40008' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;&#x6D88;&#x606F;&#x7C7B;&#x578B;',
        '40009' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;&#x56FE;&#x7247;&#x6587;&#x4EF6;&#x5927;&#x5C0F;',
        '40010' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;&#x8BED;&#x97F3;&#x6587;&#x4EF6;&#x5927;&#x5C0F;',
        '40011' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;&#x89C6;&#x9891;&#x6587;&#x4EF6;&#x5927;&#x5C0F;',
        '40012' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;&#x7F29;&#x7565;&#x56FE;&#x6587;&#x4EF6;&#x5927;&#x5C0F;',
        '40013' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;APPID',
        '40014' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;access_token',
        '40015' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;&#x83DC;&#x5355;&#x7C7B;&#x578B;',
        '40016' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;&#x6309;&#x94AE;&#x4E2A;&#x6570;',
        '40017' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;&#x6309;&#x94AE;&#x4E2A;&#x6570;',
        '40018' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;&#x6309;&#x94AE;&#x540D;&#x5B57;&#x957F;&#x5EA6;',
        '40019' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;&#x6309;&#x94AE;KEY&#x957F;&#x5EA6;',
        '40020' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;&#x6309;&#x94AE;URL&#x957F;&#x5EA6;',
        '40021' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;&#x83DC;&#x5355;&#x7248;&#x672C;&#x53F7;',
        '40022' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;&#x5B50;&#x83DC;&#x5355;&#x7EA7;&#x6570;',
        '40023' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;&#x5B50;&#x83DC;&#x5355;&#x6309;&#x94AE;&#x4E2A;&#x6570;',
        '40024' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;&#x5B50;&#x83DC;&#x5355;&#x6309;&#x94AE;&#x7C7B;&#x578B;',
        '40025' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;&#x5B50;&#x83DC;&#x5355;&#x6309;&#x94AE;&#x540D;&#x5B57;&#x957F;&#x5EA6;',
        '40026' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;&#x5B50;&#x83DC;&#x5355;&#x6309;&#x94AE;KEY&#x957F;&#x5EA6;',
        '40027' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;&#x5B50;&#x83DC;&#x5355;&#x6309;&#x94AE;URL&#x957F;&#x5EA6;',
        '40028' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;&#x81EA;&#x5B9A;&#x4E49;&#x83DC;&#x5355;&#x4F7F;&#x7528;&#x7528;&#x6237;',
        '40029' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;oauth_code',
        '40030' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;refresh_token',
        '40031' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;openid&#x5217;&#x8868;',
        '40032' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;openid&#x5217;&#x8868;&#x957F;&#x5EA6;',
        '40033' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;&#x8BF7;&#x6C42;&#x5B57;&#x7B26;&#xFF0C;&#x4E0D;&#x80FD;&#x5305;&#x542B;\uxxxx&#x683C;&#x5F0F;&#x7684;&#x5B57;&#x7B26;',
        '40035' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;&#x53C2;&#x6570;',
        '40038' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;&#x8BF7;&#x6C42;&#x683C;&#x5F0F;',
        '40039' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;URL&#x957F;&#x5EA6;',
        '40050' => '&#x4E0D;&#x5408;&#x6CD5;&#x7684;&#x5206;&#x7EC4;id',
        '40051' => '&#x5206;&#x7EC4;&#x540D;&#x5B57;&#x4E0D;&#x5408;&#x6CD5;',
        '41001' => '&#x7F3A;&#x5C11;access_token&#x53C2;&#x6570;',
        '41002' => '&#x7F3A;&#x5C11;appid&#x53C2;&#x6570;',
        '41003' => '&#x7F3A;&#x5C11;refresh_token&#x53C2;&#x6570;',
        '41004' => '&#x7F3A;&#x5C11;secret&#x53C2;&#x6570;',
        '41005' => '&#x7F3A;&#x5C11;&#x591A;&#x5A92;&#x4F53;&#x6587;&#x4EF6;&#x6570;&#x636E;',
        '41006' => '&#x7F3A;&#x5C11;media_id&#x53C2;&#x6570;',
        '41007' => '&#x7F3A;&#x5C11;&#x5B50;&#x83DC;&#x5355;&#x6570;&#x636E;',
        '41008' => '&#x7F3A;&#x5C11;oauth code',
        '41009' => '&#x7F3A;&#x5C11;openid',
        '42001' => 'access_token&#x8D85;&#x65F6;',
        '42002' => 'refresh_token&#x8D85;&#x65F6;',
        '42003' => 'oauth_code&#x8D85;&#x65F6;',
        '43001' => '&#x9700;&#x8981;GET&#x8BF7;&#x6C42;',
        '43002' => '&#x9700;&#x8981;POST&#x8BF7;&#x6C42;',
        '43003' => '&#x9700;&#x8981;HTTPS&#x8BF7;&#x6C42;',
        '43004' => '&#x9700;&#x8981;&#x63A5;&#x6536;&#x8005;&#x5173;&#x6CE8;',
        '43005' => '&#x9700;&#x8981;&#x597D;&#x53CB;&#x5173;&#x7CFB;',
        '44001' => '&#x591A;&#x5A92;&#x4F53;&#x6587;&#x4EF6;&#x4E3A;&#x7A7A;',
        '44002' => 'POST&#x7684;&#x6570;&#x636E;&#x5305;&#x4E3A;&#x7A7A;',
        '44003' => '&#x56FE;&#x6587;&#x6D88;&#x606F;&#x5185;&#x5BB9;&#x4E3A;&#x7A7A;',
        '44004' => '&#x6587;&#x672C;&#x6D88;&#x606F;&#x5185;&#x5BB9;&#x4E3A;&#x7A7A;',
        '45001' => '&#x591A;&#x5A92;&#x4F53;&#x6587;&#x4EF6;&#x5927;&#x5C0F;&#x8D85;&#x8FC7;&#x9650;&#x5236;',
        '45002' => '&#x6D88;&#x606F;&#x5185;&#x5BB9;&#x8D85;&#x8FC7;&#x9650;&#x5236;',
        '45003' => '&#x6807;&#x9898;&#x5B57;&#x6BB5;&#x8D85;&#x8FC7;&#x9650;&#x5236;',
        '45004' => '&#x63CF;&#x8FF0;&#x5B57;&#x6BB5;&#x8D85;&#x8FC7;&#x9650;&#x5236;',
        '45005' => '&#x94FE;&#x63A5;&#x5B57;&#x6BB5;&#x8D85;&#x8FC7;&#x9650;&#x5236;',
        '45006' => '&#x56FE;&#x7247;&#x94FE;&#x63A5;&#x5B57;&#x6BB5;&#x8D85;&#x8FC7;&#x9650;&#x5236;',
        '45007' => '&#x8BED;&#x97F3;&#x64AD;&#x653E;&#x65F6;&#x95F4;&#x8D85;&#x8FC7;&#x9650;&#x5236;',
        '45008' => '&#x56FE;&#x6587;&#x6D88;&#x606F;&#x8D85;&#x8FC7;&#x9650;&#x5236;',
        '45009' => '&#x63A5;&#x53E3;&#x8C03;&#x7528;&#x8D85;&#x8FC7;&#x9650;&#x5236;',
        '45010' => '&#x521B;&#x5EFA;&#x83DC;&#x5355;&#x4E2A;&#x6570;&#x8D85;&#x8FC7;&#x9650;&#x5236;',
        '45015' => '&#x56DE;&#x590D;&#x65F6;&#x95F4;&#x8D85;&#x8FC7;&#x9650;&#x5236;',
        '45016' => '&#x7CFB;&#x7EDF;&#x5206;&#x7EC4;&#xFF0C;&#x4E0D;&#x5141;&#x8BB8;&#x4FEE;&#x6539;',
        '45017' => '&#x5206;&#x7EC4;&#x540D;&#x5B57;&#x8FC7;&#x957F;',
        '45018' => '&#x5206;&#x7EC4;&#x6570;&#x91CF;&#x8D85;&#x8FC7;&#x4E0A;&#x9650;',
        '46001' => '&#x4E0D;&#x5B58;&#x5728;&#x5A92;&#x4F53;&#x6570;&#x636E;',
        '46002' => '&#x4E0D;&#x5B58;&#x5728;&#x7684;&#x83DC;&#x5355;&#x7248;&#x672C;',
        '46003' => '&#x4E0D;&#x5B58;&#x5728;&#x7684;&#x83DC;&#x5355;&#x6570;&#x636E;',
        '46004' => '&#x4E0D;&#x5B58;&#x5728;&#x7684;&#x7528;&#x6237;',
        '47001' => '&#x89E3;&#x6790;JSON/XML&#x5185;&#x5BB9;&#x9519;&#x8BEF;',
        '48001' => 'api&#x529F;&#x80FD;&#x672A;&#x6388;&#x6743;',
        '50001' => '&#x7528;&#x6237;&#x672A;&#x6388;&#x6743;&#x8BE5;api',
    );

    public static $_USERINFO_LANG = 'en';

    private $_appid;

    private $_appsecret;

    private static $_accessTokenCache = array();

    private static $ERROR_LOGS = array();

    private static $ERROR_NO = 0;

    /**
     * 构造函数 设置appid、appsecret
     *
     * @param string $appid
     * @param string $appsecret
     */
    public function __construct($appid = '', $appsecret = '')
    {
        if ($appsecret && $appid)
        {
            $this->_appid     = $appid;
            $this->_appsecret = $appsecret;
        }
        else
        {
            $this->_appid     = Config::get('wechat::wechat.appId');
            $this->_appsecret = Config::get('wechat::wechat.appSecret');
        }
    }

    /**
     * 处理错误信息
     *
     * @return int
     */
    public static function error()
    {
        return self::$ERRCODE_MAP[self::$ERROR_NO] ? self::$ERRCODE_MAP[self::$ERROR_NO] : self::$ERROR_NO;
    }

    /**
     * 判断结果状态
     *
     * @param $res
     *
     * @return bool
     */
    public static function checkIsSuc($res)
    {
        $result = TRUE;

        if (is_string($res))
        {
            $res = json_decode($res, TRUE);
        }

        if (isset($res['errcode']) && (0 !== (int)$res['errcode']))
        {
            array_push(self::$ERROR_LOGS, $res);
            $result         = FALSE;
            self::$ERROR_NO = $res['errcode'];
        }

        return $result;
    }

    /**
     * 模拟GET
     *
     * @param $url
     *
     * @return string
     */
    private static function get($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        # curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

        if (!curl_exec($ch))
        {
            error_log(curl_error($ch));
            $data = '';
        }
        else
        {
            $data = curl_multi_getcontent($ch);
        }
        curl_close($ch);

        return $data;
    }

    /**
     * 模拟POST
     *
     * @param $url
     * @param $data
     *
     * @return mixed|string
     */
    private static function post($url, $data)
    {
        if (!function_exists('curl_init'))
        {
            return '';
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        # curl_setopt( $ch, CURLOPT_HEADER, 1);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $data = curl_exec($ch);
        if (!$data)
        {
            error_log(curl_error($ch));
        }
        curl_close($ch);

        return $data;
    }

    /**
     * 获取 AccessToken
     *
     * @param int $tokenOnly
     * @param int $nocache
     *
     * @return array|null
     */
    public function getAccessToken($tokenOnly = 1, $nocache = 0)
    {
        $myTokenInfo = NULL;
        $appid       = $this->_appid;
        $appsecret   = $this->_appsecret;
        $cachename   = 'wechatat_' . $appid;

        if ($nocache || empty(self::$_accessTokenCache[$appid]))
        {
            self::$_accessTokenCache[$appid] = Cache::get($cachename);
        }

        if (!empty(self::$_accessTokenCache[$appid]))
        {
            $myTokenInfo = self::$_accessTokenCache[$appid];
            if (time() < $myTokenInfo['expiration'])
            {
                return $tokenOnly ? $myTokenInfo['token'] : $myTokenInfo;
            }
        }

        $url = self::$_URL_API_ROOT . "/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";

        $json = self::get($url);
        $res  = json_decode($json, TRUE);

        if (self::checkIsSuc($res))
        {
            self::$_accessTokenCache[$appid] = $myTokenInfo = array(
                'token'      => $res['access_token'],
                'expiration' => time() + (int)$res['expires_in']
            );

            Cache::put($cachename, $myTokenInfo, ((int)$res['expires_in'] / 60));
        }

        return $tokenOnly ? $myTokenInfo['token'] : $myTokenInfo;
    }

    /**
     * 设置 AccessToken
     *
     * @param $tokenInfo
     */
    public function setAccessToken($tokenInfo)
    {
        if ($tokenInfo)
        {
            $appid                           = $this->_appid;
            self::$_accessTokenCache[$appid] = array(
                'token'  => $tokenInfo['token'],
                'expire' => $tokenInfo['expire']
            );
        }
    }

    /**
     * 上传多媒体文件
     *
     * @param     $type
     * @param     $file_path
     * @param int $mediaidOnly
     *
     * @return mixed|null
     */
    public function upload($type, $file_path, $mediaidOnly = 1)
    {
        $access_token = $this->getAccessToken();
        $url          = self::$_URL_FILE_API_ROOT . "/cgi-bin/media/upload?access_token=$access_token&type=$type";

        $res = self::post($url, array('media' => "@$file_path"));
        $res = json_decode($res, TRUE);

        if (self::checkIsSuc($res))
        {
            return $mediaidOnly ? $res['media_id'] : $res;
        }

        return NULL;
    }

    /**
     * 下载多媒体文件
     *
     * @param $mid
     *
     * @return string
     */
    public function download($mid)
    {
        $access_token = $this->getAccessToken();
        $url          = self::$_URL_FILE_API_ROOT . "/cgi-bin/media/get?access_token=$access_token&media_id=$mid";

        return self::get($url);
    }

    /**
     * 获取自定义菜单
     *
     * @return mixed|null
     */
    public function getMenu()
    {
        $access_token = $this->getAccessToken();
        $url          = self::$_URL_API_ROOT . "/cgi-bin/menu/get?access_token=$access_token";

        $json = self::get($url);

        $res = json_decode($json, TRUE);
        if (self::checkIsSuc($res))
        {
            return $res;
        }

        return NULL;
    }

    /**
     * 删除自定义菜单
     *
     * @return bool
     */
    public function deleteMenu()
    {
        $access_token = $this->getAccessToken();
        $url          = self::$_URL_API_ROOT . "/cgi-bin/menu/delete?access_token=$access_token";

        $res = self::get($url);

        return self::checkIsSuc($res);
    }

    /**
     * 设置自定义菜单
     *
     * @param $myMenu
     *
     * @return bool
     */
    public function setMenu($myMenu)
    {
        $access_token = $this->getAccessToken();
        $url          = self::$_URL_API_ROOT . "/cgi-bin/menu/create?access_token=$access_token";

        if (defined('JSON_UNESCAPED_UNICODE'))
        {
            $json = is_string($myMenu) ? $myMenu : json_encode($myMenu, JSON_UNESCAPED_UNICODE);
        }
        else
        {
            $json = is_string($myMenu) ? $myMenu : json_encode($myMenu);
        }

        $json = urldecode($json);
        $res  = self::post($url, $json);

        return self::checkIsSuc($res);
    }

    /**
     * 发送信息
     *
     * @param $to
     * @param $type
     * @param $data
     *
     * @return bool
     */
    private function _send($to, $type, $data)
    {

        $json = json_encode(
            array(
                'touser'  => $to,
                'msgtype' => $type,
                $type     => $data
            ), JSON_UNESCAPED_UNICODE
        );
        //如果是debug状态下,直接返回内容
        if(Input::get('debug') == 'true') return $json;

        $access_token = $this->getAccessToken();
        $url          = self::$_URL_API_ROOT . "/cgi-bin/message/custom/send?access_token=$access_token";

        $res = self::post($url, $json);

        return self::checkIsSuc($res);
    }

    /**
     * 发送文本消息（发送客服消息）
     *
     * @param $to
     * @param $msg
     *
     * @return bool
     */
    public function sendTextMsg($to, $msg)
    {
        return $this->_send($to, 'text', array('content' => $msg));
    }

    /**
     * 发送图片消息（发送客服消息）
     *
     * @param $to
     * @param $mid
     *
     * @return bool
     */
    public function sendImgMsg($to, $mid)
    {
        return $this->_send($to, 'image', array('media_id' => $mid));
    }

    /**
     * 发送语音消息（发送客服消息）
     *
     * @param $to
     * @param $mid
     *
     * @return bool
     */
    public function sendVoice($to, $mid)
    {
        return $this->_send($to, 'voice', array('media_id' => $mid));
    }

    /**
     * 发送视频消息（发送客服消息）
     *
     * @param $to
     * @param $mid
     * @param $title
     * @param $desc
     *
     * @return bool
     */
    public function sendVideo($to, $mid, $title, $desc)
    {
        return $this->_send($to, 'video', array(
            'media_id'    => $mid,
            'title'       => $title,
            'description' => $desc
        ));
    }

    /**
     * 发送音乐消息（发送客服消息）
     *
     * @param        $to
     * @param        $url
     * @param        $mid
     * @param        $thumb_mid
     * @param        $title
     * @param string $desc
     * @param string $hq_url
     *
     * @return bool
     */
    public function sendMusic($to, $url, $mid, $thumb_mid, $title, $desc = '', $hq_url = '')
    {
        return $this->_send($to, 'music', array(
            'media_id'       => $mid,
            'title'          => $title,
            'description'    => $desc || $title,
            'musicurl'       => $url,
            'thumb_media_id' => $thumb_mid,
            'hqmusicurl'     => $hq_url || $url
        ));
    }

    /**
     * 图文数据数组
     *
     * @param $articles
     *
     * @return array
     */
    static private function _filterForRichMsg($articles)
    {
        $i      = 0;
        $ii     = len($articles);
        $result = array();
        while ($i < $ii)
        {
            $currentArticle = $articles[$i++];
            try
            {
                array_push($result, array(
                    'title'       => $currentArticle['title'],
                    'description' => $currentArticle['desc'],
                    'url'         => $currentArticle['url'],
                    'picurl'      => $currentArticle['thumb_url']
                ));
            }
            catch (Exception $e)
            {

            }
        }

        return $result;
    }

    /**
     * 发送图文消息（发送客服消息）
     *
     * @param $to
     * @param $articles
     *
     * @return bool
     */
    public function sendRichMsg($to, $articles)
    {
        return $this->_send($to, 'news', array(
            'articles' => self::_filterForRichMsg($articles)
        ));
    }

    /**
     * 创建分组
     *
     * @param $name
     *
     * @return null
     */
    public function createGroup($name)
    {
        $access_token = $this->getAccessToken();
        $url          = self::$_URL_API_ROOT . "/cgi-bin/groups/create?access_token=$access_token";

        $res = self::post($url, json_encode(array(
            'group' => array('name' => $name)
        )));

        $res = json_decode($res, TRUE);

        return self::checkIsSuc($res) ? $res['group']['id'] : NULL;
    }

    /**
     * 修改分组名
     *
     * @param $gid
     * @param $name
     *
     * @return bool
     */
    public function renameGroup($gid, $name)
    {
        $access_token = $this->getAccessToken();
        $url          = self::$_URL_API_ROOT . "/cgi-bin/groups/update?access_token=$access_token";

        $res = self::post($url, json_encode(array(
            'group' => array(
                'id'   => $gid,
                'name' => $name
            )
        )));

        $res = json_decode($res, TRUE);

        return self::checkIsSuc($res);
    }

    /**
     * 查询所有分组
     *
     * @return null
     */
    public function getAllGroups()
    {
        $access_token = $this->getAccessToken();
        $url          = self::$_URL_API_ROOT . "/cgi-bin/groups/get?access_token=$access_token";

        $res = self::get($url);
        // echo $res;
        $res = json_decode($res, TRUE);

        return self::checkIsSuc($res) ? $res['groups'] : NULL;
    }

    /**
     * 移动用户分组
     *
     * @param $uid
     * @param $gid
     *
     * @return bool
     */
    public function moveUserById($uid, $gid)
    {
        $access_token = $this->getAccessToken();
        $url          = self::$_URL_API_ROOT . "/cgi-bin/groups/members/update?access_token=$access_token";

        $res = self::post(
            $url, json_encode(
                array(
                    'openid'     => $uid,
                    'to_groupid' => $gid
                )
            )
        );

        $res = json_decode($res, TRUE);

        return self::checkIsSuc($res);
    }

    /**
     * 查询用户所在分组 通过用户的OpenID查询其所在的GroupID。
     *
     * @param $uid
     *
     * @return null
     */
    public function getGroupidByUserid($uid)
    {
        $access_token = $this->getAccessToken();
        $url          = self::$_URL_API_ROOT . "/cgi-bin/groups/getid?access_token=$access_token";

        $res = self::post($url, json_encode(array(
            'openid' => $uid
        )));

        $res = json_decode($res, TRUE);

        return self::checkIsSuc($res) ? $res['groupid'] : NULL;
    }

    /**
     * 根据用户ID 获取用户基本信息
     *
     * @param        $uid
     * @param string $lang
     *
     * @return mixed|null
     */
    public function getUserInfoById($uid, $lang = '')
    {
        if (!$lang)
        {
            $lang = self::$_USERINFO_LANG;
        }
        $access_token = $this->getAccessToken();
        $url          = self::$_URL_API_ROOT . "/cgi-bin/user/info?access_token=$access_token&openid=$uid&lang=$lang";

        $res = json_decode(self::get($url), TRUE);

        return self::checkIsSuc($res) ? $res : NULL;
    }

    /**
     * 获取关注者列表
     *
     * @param string $next_id
     *
     * @return array|null
     */
    public function getFollowersList($next_id = '')
    {
        $access_token = $this->getAccessToken();
        $extend       = '';
        if ($next_id)
        {
            $extend = "&next_openid=$next_id";
        }
        $url = self::$_URL_API_ROOT . "/cgi-bin/user/get?access_token=${access_token}$extend";

        $res = json_decode(
            self::get($url), TRUE
        );

        return self::checkIsSuc($res) ? array(
            'total'   => $res['total'],
            'list'    => $res['data']['openid'],
            'next_id' => isset($res['next_openid']) ? $res['next_openid'] : NULL
        ) : NULL;
    }

    /**
     * 1、用户同意授权，获取code。
     *
     * @param        $redirect_uri
     * @param string $state
     * @param string $scope
     *
     * @return string
     */
    public function getOAuthConnectUri($redirect_uri, $state = '', $scope = 'snsapi_base')
    {
        $redirect_uri = urlencode($redirect_uri);
        $url          = "https://open.weixin.qq.com/connect/oauth2/authorize?appid={$this->_appid}&redirect_uri={$redirect_uri}&response_type=code&scope={$scope}&state={$state}#wechat_redirect";

        return $url;
    }

    /**
     * 2、通过code换取网页授权access_token
     *
     * @param $code
     *
     * @return mixed
     */
    public function getAccessTokenByCode($code)
    {
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$this->_appid}&secret={$this->_appsecret}&code=$code&grant_type=authorization_code";
        $res = json_decode(self::get($url), TRUE);

        return $res;
    }

    /**
     * 3、刷新access_token（如果需要）
     *
     * @param $refresh_token
     *
     * @return mixed
     */
    public function refreshAccessTocken($refresh_token)
    {
        $url = "https://api.weixin.qq.com/sns/oauth2/refresh_token?appid={$this->_appid}&grant_type=refresh_token&refresh_token=$refresh_token";
        $res = json_decode(self::get($url), TRUE);

        return $res;
    }

    /**
     * 4、拉取用户信息(需scope为 snsapi_userinfo)
     *
     * @param        $access_token
     * @param        $openid
     * @param string $lang
     *
     * @return mixed
     */
    public function getUserInfoByAuth($access_token, $openid, $lang = 'zh_CN')
    {
        $url = "https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=$lang";
        $res = json_decode(self::get($url), TRUE);

        return $res;
    }

    /**
     * 获取二维码
     *
     * @param $ticket
     *
     * @return string
     */
    public static function getQrcodeImgByTicket($ticket)
    {
        return self::get(self::getQrcodeImgUrlByTicket($ticket));
    }

    /**
     * 通过ticket换取二维码
     *
     * @param $ticket
     *
     * @return string
     */
    public static function getQrcodeImgUrlByTicket($ticket)
    {
        $ticket = urlencode($ticket);

        return self::$_URL_QR_ROOT . "/cgi-bin/showqrcode?ticket=$ticket";
    }

    /**
     * 创建二维码ticket
     *
     * @param array $options
     *
     * @return array|null
     */
    public function getQrcodeTicket($options = array())
    {
        $access_token = $this->getAccessToken();

        $scene_id   = isset($options['scene_id']) ? (int)$options['scene_id'] : 0;
        $expire     = isset($options['expire']) ? (int)$options['expire'] : 0;
        $ticketOnly = isset($options['ticketOnly']) ? $options['ticketOnly'] : 1;

        $url  = self::$_URL_API_ROOT . "/cgi-bin/qrcode/create?access_token=$access_token";
        $data = array(
            'action_name' => 'QR_LIMIT_SCENE',
            'action_info' => array(
                'scene' => array(
                    'scene_id' => $scene_id
                )
            )
        );
        if ($expire)
        {
            $data['expire_seconds'] = $expire;
            $data['action_name']    = 'QR_SCENE';
        }

        if ($data['action_name'] == 'QR_LIMIT_SCENE' && $scene_id > 100000)
        {
            $data['action_info']['scene']['scene_id'] = self::$_QRCODE_TICKET_DEFAULT_ID;
        }

        $data = json_encode($data);

        $res = self::post($url, $data);
        $res = json_decode($res, TRUE);

        if (self::checkIsSuc($res))
        {
            return $ticketOnly ? $res['ticket'] : array(
                'ticket' => $res['ticket'],
                'expire' => $res['expire_seconds']
            );
        }

        return NULL;
    }
}
