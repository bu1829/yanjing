<?php
namespace Common\Api;
vendor('Jpush.autoload');
use Think\Controller;
use JPush\Client;
header("content-type:text/html;charset=utf-8");
/**
 * 极光推送相关的
 * @author xuxiaowen
*/
class PushApi extends Controller {
    private $app_key = '951a6d430f16fce66da5f4dd'; //待发送的应用程序(appKey)，只能填一个。
    private $master_secret = '11078a09143ea602fb444a70'; //主密码
    private $url = "https://api.jpush.cn/v3/push"; //推送的地址

    public function __construct($app_key=null, $master_secret=null,$url=null) {
        if ($app_key) $this->app_key = $app_key;
        if ($master_secret) $this->master_secret = $master_secret;
        if ($url) $this->url = $url;
    }

    public function send_pub($receiver,$content,$m_type,$m_txt,$m_time){
        $m_time = '86400';//离线保留时间
        $message = "";//存储推送状态
        $result = $this->push($receiver,$content,$m_type,$m_txt,$m_time);
        if($result){
            $res_arr = json_decode($result, true);
            if(isset($res_arr['error'])){                       //如果返回了error则证明失败
                echo $res_arr['error']['message'];          //错误信息
                $error_code=$res_arr['error']['code'];             //错误码
                switch ($error_code) {
                    case 200:
                        $message= '发送成功！';
                        break;
                    case 1000:
                        $message= '失败(系统内部错误)';
                        break;
                    case 1001:
                        $message = '失败(只支持 HTTP Post 方法，不支持 Get 方法)';
                        break;
                    case 1002:
                        $message= '失败(缺少了必须的参数)';
                        break;
                    case 1003:
                        $message= '失败(参数值不合法)';
                        break;
                    case 1004:
                        $message= '失败(验证失败)';
                        break;
                    case 1005:
                        $message= '失败(消息体太大)';
                        break;
                    case 1008:
                        $message= '失败(appkey参数非法)';
                        break;
                    case 1020:
                        $message= '失败(只支持 HTTPS 请求)';
                        break;
                    case 1030:
                        $message= '失败(内部服务超时)';
                        break;
                    default:
                        $message= '失败(返回其他状态，目前不清楚额，请联系开发人员！)';
                        break;
                }
            }else{
                $message="发送成功！";
            }
        }else{      //接口调用失败或无响应
            $message='接口调用失败或无响应';
        }
        echo  "<script>alert('推送信息:{$message}')</script>";
    }

    public function push($receiver='all',$content='',$m_type='',$m_txt='',$m_time='86400'){
        $base64 = base64_encode("$this->app_key:$this->master_secret");
        $header = array("Authorization:Basic $base64","Content-Type:application/json");
        $data = array();
        $data['platform'] = 'all'; //目标用户终端手机的平台类型android,ios,winphone
        $data['audience'] = $receiver; //目标用户

        $data['notification'] = array("alert"=>$content,
                    //安卓自定义
                    "android"=>array("alert"=>$content,"title"=>"","builder_id"=>1,"extras"=>array("type"=>$m_type,"txt"=>$m_txt)),
                    //iOS自定义
                    "ios"=>array("alert"=>$content,"badge"=>"1","sound"=>"default","extras"=>array("type"=>$m_type,"txt"=>$m_txt))
                    );
        //苹果自定义-弹出值调试
        $data['message'] = array("msg_content"=>$content,"extras"=>array("type"=>$m_type,"txt"=>$m_txt));

        $data['options'] = array("sendno"=>time(),
                                 "time_to_live"=>$m_time,//保留离线时间默认为1天
                                 "apns_production"=>false,); //指定APNS通知发送环境：0开发环境，1生产环境。或者传递false和true
        $param = json_encode($data);
        $res = $this->push_curl($param,$header);
        if($res){
            return $res;//得到返回值
        }else{
            return false;//未得到返回值
        }
        
    }

    public function push_curl($param="",$header=""){
        if(empty($param)){
            return false;
        }
        $postUrl = $this->url;
        $curlPost = $param;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$postUrl); //抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0); //设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_POST, 1); //post提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$header); // 增加 HTTP Header（头）里的字段
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // 终止从服务端进行验证
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        $data = curl_exec($ch); //运行curl
        curl_close($ch);
        return $data;
    }
    
    
    // /**
    //  * 推送信息(派送端)
    //  * @author xuxiaowen
    //  */
    // public function sendDeliver($alias,$title,$extras){
    //  $client=new \JPush\Client(C("PUSH_KEY_DELIVER"), C('PUSH_SECRET_DELIVER'));
    //  try{
       //   $response = $client->push()
       //   ->setPlatform(array('android'))
       //   ->addAlias($alias)
       //   ->androidNotification('美护康', array(
       //           'title' => $title,
       //           // 'build_id' => 2,
       //           'extras' => $extras,
       //   ))
       //   ->send();
    //  } catch (\JPush\Exceptions\APIConnectionException $e) {
             
    //  }
    // }
    




    /**     
     * 将数据先转换成json,然后转成array 
     */  
    public function json_array($result){  
       $result_json = json_encode($result);  
       return json_decode($result_json,true);  
    }  
      
    /** 
     * 向所有设备推送消息 
     * @param string $message 需要推送的消息 
     */  
    // public function sendNotifyAll($message){  
    //    $client=new \JPush\Client($this->app_key,$this->master_secret);  
    //    $result = $client->push()->setPlatform('all')->addAllAudience()->setNotificationAlert($message)->send();  
    //    return json_array($result);  
    // }  
      
      
    
      
    /** 
     * 向指定设备推送自定义消息 
     * @param string $message 发送消息内容 
     * @param array $regid 特定设备的id 
     * @param int $did 状态值1 
     * @param int $mid 状态值2 
     */
    public function sendSpecialMsg($regid,$message,$did,$mid){  
       $client=new \JPush\Client($this->app_key,$this->master_secret);  
       $result = $client->push()->setPlatform('all')->addRegistrationId($regid)  
          ->addAndroidNotification($message,'',1,array('did'=>$did,'mid'=>$mid))  
          ->addIosNotification($message,'','+1',true,'',array('did'=>$did,'mid'=>$mid))->send();  
      
       return json_array($result);  
    }  
      
    /** 
     * 得到各类统计数据 
     * @param array $msgIds 推送消息返回的msg_id列表 
     */  
    public function reportNotify($msgIds){  
       $client=new \JPush\Client($this->app_key,$this->master_secret);  
       $response = $client->report()->getReceived($msgIds);  
       return json_array($response);  
    }  


    /** 
     * 向所有设备推送消息 
     * @param string $message 需要推送的消息 
     */  
    public function sendNotifyAll($content,$extras){
        $client=new \JPush\Client($this->app_key,$this->master_secret);
        try{
            $result = $client->push()
                    ->setPlatform('all')
                    ->addAllAudience()
                    //->addRegistrationId($regid)
                    ->message('message content')
                    ->iosNotification($content,$extras)
                    ->androidNotification($content,$extras)
                    //->setNotificationAlert('活动优惠+周周收益+终身保退，这也许是你离原创艺术最近的一次！!!')
                    ->options(C('PUSH_APNS_PRODUCTION'))
                    ->send();  
        } catch (\JPush\Exceptions\APIConnectionException $e) {
            print $e;
        } catch (\JPush\Exceptions\APIRequestException $e) {
            print $e;
        }
  
    }  


    /** 
     * 向特定设备推送消息 
     * @param array $alias 指定用户的ID号
     * @param string $content 需要推送的消息 
     * @param array $extras 额外参数
     */  
    public function sendNotifySpecial($alias,$content,$extras){  
        $client=new \JPush\Client($this->app_key,$this->master_secret);
        try{
            $result = $client->push()
                    ->setPlatform('all')
                    ->addAlias($alias)
                    ->message('message content')
                    ->iosNotification($content,$extras)
                    ->androidNotification($content,$extras)
                    ->options(C('PUSH_APNS_PRODUCTION'))
                    ->send();  
        } catch (\JPush\Exceptions\APIConnectionException $e) {
            print $e;
        } catch (\JPush\Exceptions\APIRequestException $e) {
            print $e;
        }
       //return json_array($result);  
    }  


    /** 
     * 账号异地登录推送消息
     */  
    public function sendLogoutNotify($old_device_id,$content,$extras){  
        $client=new \JPush\Client($this->app_key,$this->master_secret);
        try{
            $result = $client->push()
                    ->setPlatform('all')
                    ->addRegistrationId($old_device_id)
                    ->message('message content')
                    ->iosNotification($content,$extras)
                    ->androidNotification($content,$extras)
                    ->options(C('PUSH_APNS_PRODUCTION'))
                    ->send();  
        } catch (\JPush\Exceptions\APIConnectionException $e) {
            print $e;
        } catch (\JPush\Exceptions\APIRequestException $e) {
            print $e;
        }
       //return json_array($result);  
    }

    public function sendPeriodicalSchedule($alias,$comment,$name,$extras){
        $client=new \JPush\Client($this->app_key,$this->master_secret);
        $payload = $client->push()
                ->setPlatform("all")
                ->addAlias($alias)
                // ->addAllAudience()
                ->setNotificationAlert($comment)
                ->options(C('PUSH_APNS_PRODUCTION'))
                ->build();

        $response = $client->schedule()->createPeriodicalSchedule("$name",$payload,$extras);
        return $response;
    }


    public function sendSingleSchedule($alias,$alert,$name,$extras){
        $client=new \JPush\Client($this->app_key,$this->master_secret);
        $payload = $client->push()
            ->setPlatform("all")
            ->addAlias($alias)
            //->addRegistrationId($regid)
            //->addAllAudience()
            ->setNotificationAlert($alert)
            ->options(C('PUSH_APNS_PRODUCTION'))
            ->build();

        $response = $client->schedule()->createSingleSchedule("$name",$payload,$extras);
        return $response;
        // dump($response);
    }

    public function deleteSchedule($schedule_id){
        $client=new \JPush\Client($this->app_key,$this->master_secret);
        $response = $client->schedule()->deleteSchedule($schedule_id);
    }

}
