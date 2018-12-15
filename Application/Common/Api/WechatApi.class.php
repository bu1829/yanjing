<?php
namespace Common\Api;
use Think\Controller;

class WechatApi extends Controller{

	const APPID = 'wx818d3b7d1d08b14a';
    const APPSECRET = '4ee193ea2a6eeae1bd116403d8b137f9';
    public function __construct()
    {
        parent::__construct();
    }

    //获取access_token
    public function accessToken()
    {
        wx_get_token();
    }

    // //用第一步拿到的access_token 采用http GET方式请求获得jsapi_ticket
    public function jsapiTicket()
    {
        wx_get_jsapi_ticket();
    }


    //获取signature
    public function signature($nonceStr,$url,$timestamp)
    {
    	return setSignature($nonceStr,$url,$timestamp);
    }

    public function httpGet($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 500);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_URL, $url);

        $res = curl_exec($curl);
        curl_close($curl);

        return $res;
    }



}