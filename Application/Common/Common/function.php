<?php
/*
 * 判断是否在别处登录（后台）
 * @author xuxiaowen
 */
function is_other_login_admin(){
    $where['user_id']=$_SESSION[C("USER_AUTH_KEY")];
    $data=M("admin")->field("session_id")->where($where)->find();
    $session_id=$data['session_id'];//判断是否在别处登录
    if($session_id!=session_id()){
        //unset($_SESSION['login_state']);//清除登陆状态
        $_SESSION['islogin']="other";//标识说明是被别人顶下去的
        return true;
    }else{
        return false;
    }
}

/**
 * 判断手机系统
 * @author xuxiaowen
 */
function phoneSystem(){
    if(strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone')||strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')){
        $system='IOS';
    }else if(strpos($_SERVER['HTTP_USER_AGENT'], 'Android')){
        $system='Android';
    }else{
        $system='Other';
    }
    return $system;
}


/*
 * 判断是否在别处登录（前台）
* @author xuxiaowen
*/
function is_other_login_home(){
    $where['user_id']=$_SESSION['user_id_app'];
    $data=M("user")->field("session_id")->where($where)->find();
    $session_id=$data['session_id'];//判断是否在别处登录
    if($session_id!=session_id()){
        //unset($_SESSION['login_state']);//清除登陆状态
        $_SESSION['islogin']="other";//标识说明是被别人顶下去的
        return true;
    }else{
        return false;
    }
}

/*
 * 判断是否是微信浏览器
 * @author xuxiaowen
 */
function is_weixin(){
    if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {
        return true;
    }else{
        return false;
    }
}

/*
 * 去除空格、换行
 * @author xuxiaowen
 */
function trimall($str){
    $qian=array(" ","　","\t","\n","\r");
    return str_replace($qian,"", $str);
}

/*
 * 乘以
 * @author xuxiaowen
 * @param int $a
 * @param int $b
 * @return number
 */
function chengyi($a,$b){
    return $a*$b;
}


/**
 * 计算万元
 * @author xuxiaowen
 */
function wan($num){
    $b=stristr($num,".",true);
    
    $c=stristr($num,".");
    if($c==".00"){
        $num=$b;
    }
    
    if($b==""){
        $b=$num;
    }
    $length=strlen($b);
    if($length>=5){
        $num=round(($num/10000),2)."万";
    }
    return $num;
}

/**
 * 折扣,打几折
 * @author xuxiaowen
 * @param $market_price 市场价
 * @param $price 现价
 */
function zhekou($market_price,$price){
    $zhekou=round(($price/$market_price)*10,1);
    return $zhekou;
}

/**
 * 限时抢购，已售比例
 * @author xuxiaowen
 * @param $sale_num 已售数量
 * @paran $rush_num 剩余抢购数量
 */
function salebili($sale_num,$rush_num){
    $num=round($sale_num/($sale_num+$rush_num)*100,0);
    return $num;
}




/*
 * 获取一个随机且唯一的分享码；
 * @author xuxiaowen
 */
function getShareCode(){
    $User=M('user');
    $numbers = range (1,99);
    shuffle ($numbers);
    $cut=rand(1,3);
    $code=array_slice($numbers,0,$cut);
    $sharecode=$code[0].$code[1].$code[2];
    $oldcode=$User->where(array("sharecode"=>$sharecode))->getField('sharecode');
    if($oldcode){
        getShareCode();
    }else{
        return $sharecode;
    }
}

/*
 * 获取一个随机且唯一的邀请码
 */
function getInviteCode(){
    $invitecode = uni(1,4);
    $oldcode = M('merch')->where(array("invitecode"=>$invitecode))->getField('invitecode');
    if($oldcode){
        getInviteCode();
    }else{
        return $invitecode;
    }
}

/*
 * 获取一个随机且唯一的加盟商邀请码
 */
function getJoinCode(){
    $joincode = uni(1,6);
    $oldcode = M('merch')->where(array("joincode"=>$joincode))->getField('joincode');
    if($oldcode){
        getJoinCode();
    }else{
        return $joincode;
    }
}

/*
 * 插入登录记录
 * @param  int  $user_id   会员id
 * @param  int  $login_types  登录方式  1网页登录   2APP登录  3微信登录  4QQ登录
 * @param  int  $login_types $role 登录角色  1普通会员  2管理员
 * @author xuxiaowen
 */
function login($user_id,$login_types,$role=1){
    $loginInfo=array(
            "user_id"=>$user_id,
            "login_time"=>time(),
            "login_ip"=>get_client_ip(),
            "login_location"=>getLastLocation(),
            "login_types"=>$login_types,
            "role"=>$role,
    );
    
    M("user_login")->add($loginInfo);
}

/*
 * 转换编码
 * @param int  $state  状态
 */
function Code($keywords,$state){
    if($state==2){//转化
        $str=iconv("GBK", "UTF-8",$keywords);//服务器上
    }elseif($state==1){//不转
        $str=$keywords;
    }
    $str=str_replace(' ', '', $str);
    return $str;
}

/*
 * 分析枚举类型配置值 格式 a:名称1,b:名称2(借鉴ot)
 * @author xuxiaowen
*/
function parse_config_attr($string) {
    $array = preg_split('/[,;\r\n]+/', trim($string, ",;\r\n"));
    if(strpos($string,':')){
        $value  =   array();
        foreach ($array as $val) {
            list($k, $v) = explode(':', $val);
            $value[$k]   = $v;
        }
    }else{
        $value  =   $array;
    }
    return $value;
}

/*
 * 分析枚举类型配置值 格式 a:名称1,b:名称2(借鉴ot)
 * @author xuxiaowen
 */
function parse_config_attr2($string) {
    $array = preg_split('/[,;\r\n]+/', trim($string, ",;\r\n"));
    $value  =   $array;
    return $value;
}



/*
 * 自动验证手机号码的
 */
function phone($phone){
    if(preg_match("/^1[3|4|5|7|8][0-9]\d{8}$/",$phone)){
        return true;
    }else{
        return false;
    }
}

/*
 * 自动验证密码的
 */
function password($password){
    if(preg_match("/^[\\~!@#$%^&*()-_=+|{}\[\],.?\/:;\'\"\d\w]{6,20}$/",$password)){
        return true;
    }else{
        return false;
    }
}

/*
 * 自动验证昵称的
*/
function nickname($string){
        $len=strlen($string);
        if($len>=4 && $len<=20){
            if(preg_match("/^[0-9a-zA-Z_\x{4e00}-\x{9fa5}]+$/u",$string)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
}

/*
 * 删除
 * @author xuxiaowen
 * @param   string  $model  实力模型数据表名字
 * @param   array   $where  要删除的条件
 * @param   array   $filenames   要删除的文件的字段名
 * @param   int     $state  1:删除图片  2删除图片，且删除数据
 * @return  boolean 
 */
function delete($model,$where,$filenames,$state){
    $Model=M("$model");
    $list=$Model->where($where)->select();
    
    if(!empty($filenames)){
        foreach($list as $k=>$v){
            /*删除旧图片*/
            foreach($filenames as $kk=>$vv){
                unlink(".".$v[$vv]);
            }
        }
    }
    if($state==1){
        return true;
    }elseif($state==2){
        $re=$Model->where($where)->delete();
        return $re;
    }
    
}

/*
 * 判断是不是手机
 * @author xuxiaowen
 */
function ismobile() {
    // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
    if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))

        return true;

    //此条摘自TPM智能切换模板引擎，适合TPM开发

    if(isset ($_SERVER['HTTP_CLIENT']) &&'PhoneClient'==$_SERVER['HTTP_CLIENT'])

        return true;

    //如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息

    if (isset ($_SERVER['HTTP_VIA']))

        //找不到为flase,否则为true

        return stristr($_SERVER['HTTP_VIA'], 'wap') ? true : false;

    //判断手机发送的客户端标志,兼容性有待提高

    if (isset ($_SERVER['HTTP_USER_AGENT'])) {

        $clientkeywords = array(

            'nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile'

        );

        //从HTTP_USER_AGENT中查找手机浏览器的关键字

        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {

            return true;

        }

    }

    //协议法，因为有可能不准确，放到最后判断

    if (isset ($_SERVER['HTTP_ACCEPT'])) {

        // 如果只支持wml并且不支持html那一定是移动设备

        // 如果支持wml和html但是wml在html之前则是移动设备

        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {

            return true;

        }

    }

    return false;

    //协议法,因为有可能不准确,放到最后判断

    if(isset ($_SERVER['HTTP_ACCEPT'])){

        // 如果只支持wml并且不支持html那一定是移动设备

        // 如果支持wml和html但是wml在html之前则是移动设备

        if((strpos($_SERVER['HTTP_ACCEPT'],'vnd.wap.wml')!==false)&&(strpos($_SERVER['HTTP_ACCEPT'],'text/html')===false||(strpos($_SERVER['HTTP_ACCEPT'],'vnd.wap.wml')<     strpos($_SERVER['HTTP_ACCEPT'],'text/html')))){

            returntrue;

        }

    }

    return false;
}

/*
 * 获得登录前地址
 * @author xuxiaowen
 */
function urlBeforeLogin(){
    return  $_SESSION['surl']=$_SERVER['REQUEST_URI'];
}


/*
 * 获得子栏目列表(无限极分类)
 * @author xuxiaowen
 * @param string  $model  数据表名称|模型名称
 * @param string  $name   名称的字段
 * @param int     $id     id的字段
 * @param string  $sort   排序的字段
 * @return array
 */
function getColumn($model,$name,$id='id',$sort='sort'){
    $Model=M("$model");
    $cat = $Model->where(array('pid'=>0))->order("$sort")->select();
    $data=getCatSon($cat, $model, $name, $id,$sort);
    return $data;
}

/*
 * 获得日期
 * @author xuxiaowen
 */
function gettime(){
    $weekarray=array("日","一","二","三","四","五","六");
    $week="星期".$weekarray[date("w")];
    $time=date("Y年m月d日")." ".$week." ".date("H:i:s");
    return $time;
}




/*
 * 隐藏字符串
 * @author xuxiaowen
 * @param  string  $str     要隐藏的字符串
 * @param  string  $star    要显示的*
 * @param  int     $start   开始隐藏的位数
 * @param  int     $length  隐藏多少的位数
 *   
 */
function hidestring($str,$star,$start,$length){
    $str= substr_replace($str,$star,$start,$length);
    return $str;
}


/*
 * 更新订单状态，写入订单支付后返回的数据
 * @author xuxiaowen
 */
function orderhandle($parameter){
    $order_sn=$parameter['out_trade_no'];//订单号
    $pay_time=$parameter['notify_time'];//支付时间
    $buyer_email=$parameter['buyer_email'];//支付账号
    $total_fee=$parameter['total_fee'];//支付金额
    $pay_type=$parameter['pay_type'];//支付方式0未知，1,支付宝，2微信，3钱包 4，银联,
    if(!empty($parameter['notify_time'])){
        $notify_time=strtotime($parameter['notify_time']);//支付时间
    }else{
        $notify_time=time();//支付时间
    }
    
    $yue=$parameter['yue'];//钱包余额
    
    $Order=M("order");
    //查找订单的支付用户
    $where=array("order_sn"=>$order_sn,"order_status"=>1,"pay_status"=>0);
    
    $data=$Order->where($where)->find();
    if(!empty($data)){
        $user_id=$data['user_id'];
        
        switch ($pay_type){
            case 1:
                $payremark="支付宝";
                break;
            case 2:
                $payremark="微信";
                break;
            case 3:
                $payremark="钱包";
                //修改会员余额
                M("user")->field("money")->where(array("user_id"=>$user_id))->save(array("money"=>$yue));
                break;
        }
        
        if($pay_type==3){//只有是钱包的时候，才会插入交易记录
            //插入会员交易记录
            $record=array(
                    "user_id"=>$user_id,
                    "spend"=>"$total_fee",
                    "yue"=>"$yue",
                    "types"=>"2",
                    "status"=>"1",
                    "name"=>"支出",
                    "remark"=>$payremark."支付订单",
                    "order_id"=>$data['order_id'],
                    "add_time"=>time(),
            );
            M("money_record")->add($record);
        }

        //修改商品的销售状态
        $ordergoods=M("order_goods")->where(array("order_id"=>$data['order_id']))->select();
        foreach($ordergoods as $k=>$v){
            M('goods')->where(array("id"=>$v['gid']))->save(array('is_sell'=>1));
        }
        
        //修改订单支付状态
        $res=$Order->field("order_status,pay_status,pay_time,pay_type,finish_time")->where($where)->save(array("order_status"=>2,"pay_status"=>1,"pay_time"=>$notify_time,"pay_type"=>$pay_type,"finish_time"=>time()));
        if(NULL!==$res){
            if($data['order_source']!=3){
                getProfit($order_sn);
            }
            
            //优惠券改为已使用
            if($data['cid']){
                M('user_coupon')->where(array("id"=>$data['cid'],"user_id"=>$data['user_id']))->save(array("use_state"=>2,"use_time"=>time(),"order_id"=>$data['order_id']));
            }
            if($data['order_source']==1){
                delSchedule($data['order_id']);
                $start_time = time();
                $time = time();
                sendProfitNotify($data['user_id'],$data['order_id'],$start_time,$time);
            }

            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
/**
 * 下单成功后发放收益
 * @author bu
 */
function getProfit($order_sn){
    $Order = M("order");
    $Ordergoods = M('order_goods');
    $Goods = M('goods');
    $info = $Order->field('order_id')->where(array('order_sn'=>$order_sn))->find();
    $order_id = $info['order_id'];
    $where = array("order_sn"=>$order_sn,"order_status"=>2);
    $data = $Order->where($where)->find();
    
    $user_id=$data['user_id'];
    
           
    $ratesql="
    SELECT goods_rate INTO @goods_rate FROM win_rate WHERE id=1;
    SELECT ROUND(total_price*@goods_rate/365*7,2) INTO @every FROM win_order WHERE order_sn=$order_sn;
    SELECT order_status INTO @status FROM win_order WHERE order_id=$order_id;
    if @status=2 OR @status=3 OR @status=4 OR @status=5 OR @status=6 OR @status=9 OR @status=10 OR @status=11 OR @status=12 OR @status=13 then
    UPDATE win_user SET money=money+@every WHERE user_id=$user_id;
    SELECT money INTO @money FROM win_user WHERE user_id=$user_id;
    INSERT INTO win_money_record(user_id,income,balance,types,`name`,remark,order_id,add_time) VALUES('$user_id',@every,@money,3,'收益','商品分红收益',$order_id,UNIX_TIMESTAMP());
    INSERT INTO win_message(title,content,types,chose,receiver,add_time) VALUES('收益提醒','您有新的收益，请注意查收！',8,2,'$user_id',UNIX_TIMESTAMP());
    end if;
    ";

    //INSERT INTO win_message(title,content,types,chose,receiver,add_time) VALUES('收益提醒','您有新的收益，请注意查收！',8,2,'$user_id',UNIX_TIMESTAMP());
        
    $rateprocedure=
    "drop procedure if exists  rateprocedure$order_id;
    create procedure rateprocedure$order_id()
    begin
    $ratesql
    end;";
    
    //$procedure;
    $rerate=M()->execute($rateprocedure);

    //创建定时器
    $rateevent="
    CREATE EVENT IF NOT EXISTS rate$order_id 
    ON SCHEDULE EVERY 7 DAY STARTS DATE_ADD(NOW(),INTERVAL 7 DAY) 
    ON COMPLETION PRESERVE 
    DO CALL rateprocedure$order_id; 
    ";
    $rerate=M()->execute($rateevent);
    

    //每三个月额外收益
    $ratesql2="
    SELECT ext_rate INTO @ext_rate FROM win_rate WHERE id=1;
    SELECT ROUND(total_price*@ext_rate,2) INTO @every2 FROM win_order WHERE order_sn=$order_sn;
    SELECT order_status INTO @status FROM win_order WHERE order_id=$order_id;
    if @status=2 OR @status=3 OR @status=4 OR @status=5 OR @status=6 OR @status=9 OR @status=10 OR @status=11  OR @status=12 OR @status=13 then
    UPDATE win_user SET money=money+@every2 WHERE user_id=$user_id;
    SELECT money INTO @money FROM win_user WHERE user_id=$user_id;
    INSERT INTO win_money_record(user_id,income,balance,types,`name`,remark,order_id,add_time) VALUES('$user_id',@every2,@money,3,'收益','商品分红收益',$order_id,UNIX_TIMESTAMP());
    INSERT INTO win_message(title,content,types,chose,receiver,add_time) VALUES('收益提醒','您有新的收益，请注意查收！',8,2,'$user_id',UNIX_TIMESTAMP());
    end if;
    drop event if exists extevent$order_id;
    ";
        
    $extprocedure=
    "drop procedure if exists  extprocedure$order_id;
    create procedure extprocedure$order_id()
    begin
    $ratesql2
    end;";
    
    //$procedure;
    $ext=M()->execute($extprocedure);

    //创建定时器
    $extevent="
    CREATE EVENT IF NOT EXISTS ext$order_id 
    ON SCHEDULE EVERY 90 DAY STARTS DATE_ADD(NOW(),INTERVAL 90 DAY) 
    ON COMPLETION PRESERVE 
    DO CALL extprocedure$order_id; 
    ";
    $ext=M()->execute($extevent);
    
    
}

function sendMess($user_id,$order_id){
    $client = new \Common\Api\PushApi();
    $alias = $user_id;
    $content = '您挑选的艺术品已售出，请您重新选择！';
    $extras = array('extras'=>array('type'=>3,'title'=>'订单状态','order_id'=>$order_id));
    $data['send_type'] = 1;
    $data['send_id'] = 1;
    $data['title'] = '订单状态';
    $data['content'] = $content;
    $data['extras'] = serialize($extras['extras']);
    $data['types'] = 3;
    $data['add_time'] = time();
    $data['chose'] = 2;
    $data['receiver'] = $alias;
    $mid = M('message')->add($data);
    $client->sendNotifySpecial($alias,$content,$extras);
}

function sendProfitNotify($user_id,$order_id,$start_time,$time){
    $client = new \Common\Api\PushApi();

    $alias = $user_id;
    $content = '您有新的收益，请注意查收！';
    $name = "profit_" . $order_id;
    $start_time = date('Y-m-d H:i:s',($start_time+604800));
    $time = date('H:i:s',($time+604800));
    $extras = array(
        'extras'=>array(
            "type"=>8,
            "title"=>'收益提醒',
            "start"=>$start_time,
            //"end"=>"2016-12-25 13:45:00",
            "time"=>$time,
            "time_unit"=>"WEEK",
            "frequency"=>1
        ));
    //$extras = array("time"=>"2017-10-21 17:24:00");
    $response = $client->sendPeriodicalSchedule($alias,$content,$name,$extras);
    
    if($response){
        $data['schedule_id'] = $response['body']['schedule_id'];
        $data['schedule_name'] = $response['body']['name'];
        $data['add_time'] = time();
        $res = M('schedule')->add($data);
    }
    
}

function delSchedule($order_id){
    $client = new \Common\Api\PushApi();
    $Schedule = M('schedule');
    $info1 = $Schedule->where(array('schedule_name'=>"order5min_" . $order_id))->find();
    $info2 = $Schedule->where(array('schedule_name'=>"ordercancel_" . $order_id))->find();
    if($info1){
        $client->deleteSchedule($info1['schedule_id']);
    }
    if($info2){
        $client->deleteSchedule($info2['schedule_id']);
    }
}
/*
 * 获取一个随机且唯一的订单号；
 * @author xuxiaowen
 */
function getordcode(){
    $Ord=M('order');
    $numbers = range (10,99);
    shuffle ($numbers);
    $code=array_slice($numbers,0,5);
    $ordcode=date("Ymd").$code[0].$code[1].$code[2].$code[3].$code[4];
    $oldcode=$Ord->where("order_sn='".$ordcode."'")->getField('order_sn');
    if($oldcode){
        getordcode();
    }else{
        return $ordcode;
    }
}



/*
 * 递归删除
 * @author xuxiaowen
 */
function delDir($directory){
    if(file_exists($directory)){
        if($dir_handle=@opendir($directory)){
            while($filename=readdir($dir_handle)){
                if($filename!="." && $filename!=".."){
                    $subfile=$directory."/".$filename;
                    if(is_dir($subfile))
                        delDir($subfile);
                    if(is_file($subfile))
                        unlink($subfile);
                }
            }
            closedir($dir_handle);
            rmdir($directory);
        }
    }
}


/*
 * 截取中文
 * @author  xuxiaowen
 * @param   string  $str    要截取的文字
 * @param   int     $s      开始
 * @param   int     $l      长度
 * @return  string
 */
function jiequ($str,$s,$l){
    $subject = strip_tags($str);//去除html标签
    $pattern = '/\s/';//去除空白
    $content = preg_replace($pattern, '', $subject);
    $data = mb_substr($content,$s,$l,"utf-8");
    return $data;
}


/*
 * 密码加密(10遍md5)
 * @author  xuxiaowen
 * @param   string  $password    要转化的密码
 */
function md10($password){
    for($i=1;$i<=10;$i++){
        $pass.=$password;
        $password=md5($pass);
    }
    return $password;
}

/*
 * 生成6位数字验证码
 * @author  xuxiaowen
 */
function code6(){
    $str1=substr(str_shuffle("123456789"),1,1);
    $str2=substr(str_shuffle("12034506789123450678910234056789"),0,5);
    return $str1.$str2;
}

/*
 * 随机生成字符串
 * @author xuxiaowen
 */
function uni($type,$length){
    $shuzi="123456789123456789123456789";
    $zimu="qwertyuiopasdfghjklzxcvbnm";
    switch ($type){
        case 1:
            $str=substr(str_shuffle($shuzi),0,$length);
            break;
        case 2:
            $str=substr(str_shuffle($zimu),0,$length);
            break;
        case 3:
            $str=substr(str_shuffle($shuzi.$zimu),0,$length);
            break;
    }
    return $str;
}


/*
 * 发送站内信
 * @param string $title 标题
 * @param string $content 内容
 * @param string $url  链接
 * @param array $receivers 接收者，数组
 * @param int $types 1为已发送，2为收件箱',
 * @param int $send_type 发送方式，1管理员发送，2会员发送,3系统发送',
 * @param int $send_id 发送者id
 */
function sendMessage($title,$content,$url,$receivers,$types=1,$send_type=3,$send_id=0){
    //判断接收者
    if(empty($receivers)){
        return false;
    }
    
    //给用户发送站内信
    $Message=M("message");
    
    $data=array(
            "title"=>$title,//标题
            "url"=>$url,//链接
            "content"=>$content,//内容
            "send_type"=>$send_type,//发送方式
            "types"=>$types,//1为已发送，2为收件箱',
            "send_id"=>$send_id,//发送者id
            "add_time"=>time(),//发送时间
            "chose" => 2//2指定会员
    );
    $re=$Message->add($data);
    if($re){
        foreach($receivers as $k=>$v){
            $arr=array(
                    "mid"=>$re,//信息id
                    "receive_id"=>$v,//接收者id
                    "add_time"=>time(),//时间
            );
            M("message_state")->add($arr);
        }
    }
    return $re;
}



/*
 * @author  xuxiaowen
 * @param   string     $to       邮箱地址
 * @param   string     $title    标题
 * @param   string     $content  内容
 * @return  boolean
 */
function sendMail($to, $title, $content) {  
    Vendor('PHPMailer.PHPMailerAutoload');
    $mail = new PHPMailer(); //实例化
    $mail->IsSMTP(); // 启用SMTP
    $mail->Host=C('MAIL_HOST'); //smtp服务器的名称（这里以QQ邮箱为例）
    $mail->SMTPAuth = C('MAIL_SMTPAUTH'); //启用smtp认证
    $mail->Username = C('MAIL_USERNAME'); //你的邮箱名
    $mail->Password = C('MAIL_PASSWORD') ; //邮箱密码
    $mail->From = C('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
    $mail->FromName = C('MAIL_FROMNAME'); //发件人姓名
    $mail->AddAddress($to,"尊敬的客户");
    $mail->WordWrap = 50; //设置每行字符长度
    $mail->IsHTML(C('MAIL_ISHTML')); // 是否HTML格式邮件
    $mail->CharSet=C('MAIL_CHARSET'); //设置邮件编码
    $mail->Subject =$title; //邮件主题
    $mail->Body = $content; //邮件内容
    $mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; //邮件正文不支持HTML的备用显示
    return($mail->Send());
}

function Post($data, $target) {
    $url_info = parse_url($target);
    $httpheader = "POST " . $url_info['path'] . " HTTP/1.0\r\n";
    $httpheader .= "Host:" . $url_info['host'] . "\r\n";
    $httpheader .= "Content-Type:application/x-www-form-urlencoded\r\n";
    $httpheader .= "Content-Length:" . strlen($data) . "\r\n";
    $httpheader .= "Connection:close\r\n\r\n";
    //$httpheader .= "Connection:Keep-Alive\r\n\r\n";
    $httpheader .= $data;

    $fd = fsockopen($url_info['host'], 80);
    fwrite($fd, $httpheader);
    $gets = "";
    while(!feof($fd)) {
        $gets .= fread($fd, 128);
    }
    fclose($fd);
    if($gets != ''){
        $start = strpos($gets, '<?xml');
        if($start > 0) {
            $gets = substr($gets, $start);
        }
    }
    return $gets;
}

/*
 * 发送短信(验证码) 
 * @param $phone  手机号
 * @param $content 短信内容
 * @param $type 类型  1012888（验证短信4万条）  1012808（行业短信 5000条）    1012812（营销短信  5000条）
 * @author xuxiaowen
 */
function sendLine($phone,$content,$type="1012888"){
    $target = "http://cf.51welink.com/submitdata/Service.asmx/g_Submit";
    //替换成自己的测试账号,参数顺序和wenservice对应
    $post_data = "sname=dltybao0&spwd=taoyibao123&scorpid=&sprdid=".$type."&sdst=".$phone."&smsg=".rawurlencode("".$content);
    //$binarydata = pack("A", $post_data);
    $gets = Post($post_data, $target);
    $data=(array)simplexml_load_string($gets);
    $state=$data['State'];
    if($state=="0"){
        return true;
    }else{
        return false;
    }
}


/*
 * 无限极分类
 * @author  xuxiaowen
 * @param array         $arr        第一级分类，数组
 * @param string        $dbname     数据表名称
 * @param string        $name1      第一个字段的名称
 * @param string        $name2      第二个字段的名称
 * @param string        $order      排序的条件
 * @param string        $a          空格
 * @param string        $html       空格
 * @param number        $grade      级数，默认为0，用于折叠效果
 * @return string|Ambigous <multitype:, multitype:number >
 */
function getCatSon($arr,$dbname,$name1,$name2,$order='sort',$a='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$html='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└ ',$grade = 0){
    if(!count($arr)){
        return '';
        exit;
    }
    $return = array();
    foreach($arr as $v){
        $v['grade'] = $grade;
        $return[] = $v;
        $return = array_merge($return,getCatChild($dbname,$name1,$name2,$v[$name2],$order,$a,$html,$grade));
    }
    return $return;
}

function getCatChild($dbname,$name1,$name2,$pid,$order,$a,$html,$grade){
    $grade ++;
    $db = M($dbname);
    $init = $db->where(array('pid'=>$pid))->order($order)->select();
    $return = array();
    foreach($init as $v){
        $v['grade'] = $grade;
        $v[$name1] = $html.$v[$name1];
        $return[] = $v;
        $return = array_merge($return,getCatChild($dbname,$name1,$name2,$v[$name2],$order,$a,$a.$html,$grade));
    }
    return $return;
}

/*
 * 获取数据库所有的配置数据
 * @author xuxiaowen
 */
function getConfigData(){
    //获取配置
    $config=M("config")->field("name,val")->select();
    $arr=array();
    foreach($config as $k=>$v){
        $arr[]=array($v[name]=>$v[val]);
    }
    
    $c=array();
    //将$old_arr二维数组转换为一维数组
    foreach($arr as $key => $val) {
        $a=array_keys($val);
        $b=array_values($val);
        $c[$a[0]]=$b[0];
    }
    return $c;
}



/*
 * 创建目录
 * @author xuxiaowen
 */
function createFolder($path)
{
    if (!file_exists($path))
    {
        createFolder(dirname($path));
        mkdir($path, 0777);
    }
}

/**********************数据库备份*****************************/
/*
 * 处理方法
 * @author xuxiaowen
 */
function rmdirr($dirname) {
    if (!file_exists($dirname)) {
        return false;
    }
    if (is_file($dirname) || is_link($dirname)) {
        return unlink($dirname);
    }
    $dir = dir($dirname);
    if ($dir) {
        while (false !== $entry = $dir->read()) {
            if ($entry == '.' || $entry == '..') {
                continue;
            }
            //递归
            rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
        }
    }
}

/*
 * 获取文件修改时间
 * @author xuxiaowen
 */
function getfiletime($file, $DataDir) {
    $a = filemtime($DataDir . $file);
    $time = date("Y-m-d H:i:s", $a);
    return $time;
}

/*
 * 获取文件的大小 
 * @author xuxiaowen
 * @param  $file     string  文件名|当$DataDir为空时，就是大小
 * @param  $DataDir  string  路径
 */
function getfilesize($file, $DataDir) {
    if(!empty($DataDir)){
        $perms = stat($DataDir . $file);
        $size = $perms['size'];
    }else{
        $size=$file;
    }

    // 单位自动转换函数
    $kb = 1024;         // Kilobyte
    $mb = 1024 * $kb;   // Megabyte
    $gb = 1024 * $mb;   // Gigabyte
    $tb = 1024 * $gb;   // Terabyte

    if ($size < $kb) {
        return $size . " B";
    } else if ($size < $mb) {
        return round($size / $kb, 2) . " KB";
    } else if ($size < $gb) {
        return round($size / $mb, 2) . " MB";
    } else if ($size < $tb) {
        return round($size / $gb, 2) . " GB";
    } else {
        return round($size / $tb, 2) . " TB";
    }
}




/***************************以下是浏览器相关*******************************************************/

/*
 * 获得访客浏览器类型
 */
function Get_Browse(){
    if(!empty($_SERVER['HTTP_USER_AGENT'])){
        $br = $_SERVER['HTTP_USER_AGENT'];
        if (preg_match('/MSIE/i',$br)) {
            $br = 'MSIE';
        }
        elseif (preg_match('/Firefox/i',$br)) {
            $br = 'Firefox';
        }
        elseif (preg_match('/Chrome/i',$br)) {
            $br = 'Chrome';
        }
        elseif (preg_match('/Safari/i',$br)) {
            $br = 'Safari';
        }
        elseif (preg_match('/Opera/i',$br)) {
            $br = 'Opera';
        }else {
            $br = 'Other';
        }
        return $br;
    }else{
        return "unknow";
    }
}

/*
 * 获得访客浏览器语言
 */
function Get_Lang(){
    if(!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])){
        $lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
        $lang = substr($lang,0,5);
        if(preg_match("/zh-cn/i",$lang)){
            $lang = "简体中文";
        }
        elseif(preg_match("/zh/i",$lang)){
            $lang = "繁体中文";
        }
        else{
            $lang = "English";
        }
        return $lang;
    }
    else{
        return "unknow";
    }
}

/*
 * 获取访客操作系统
 */
function Get_Os(){
    if(!empty($_SERVER['HTTP_USER_AGENT'])){
        $OS = $_SERVER['HTTP_USER_AGENT'];
        if (preg_match('/win/i',$OS)) {
            $OS = 'Windows';
        }
        elseif (preg_match('/mac/i',$OS)) {
            $OS = 'MAC';
        }
        elseif (preg_match('/linux/i',$OS)) {
            $OS = 'Linux';
        }
        elseif (preg_match('/unix/i',$OS)) {
            $OS = 'Unix';
        }
        elseif (preg_match('/bsd/i',$OS)) {
            $OS = 'BSD';
        }
        else {
            $OS = 'Other';
        }
        return $OS;
    }
    else{
        return "unknow";
    }
}

/*
 * 获得本地真实IP
 */
function get_onlineip() {
    $mip = file_get_contents("http://www.ip138.com/ip2city.asp");
    if($mip){
        preg_match("/\[.*\]/",$mip,$sip);
        $p = array("/\[/","/\]/");
        return preg_replace($p,"",$sip[0]);
    }else{return "获取本地IP失败！";}
}

/*
 * 根据ip获得访客所在地地名（需要联网）
 */
function Getaddress($ip=''){
    if(empty($ip)){
        $ip = $this->Getip();
    }
    $ipadd = file_get_contents("http://int.dpool.sina.com.cn/iplookup/iplookup.php?ip=".$ip);//根据新浪api接口获取
    if($ipadd){
        $charset = iconv("gbk","utf-8",$ipadd);
        preg_match_all("/[\x{4e00}-\x{9fa5}]+/u",$charset,$ipadds);
        return $ipadds;   //返回一个二维数组
    }else{
        return "addree is none";
    }
}


/*
 * 获得登录的地名（字符串）
 * @author xuxiaowen
 */
function getLastLocation(){
    $data=Getaddress(get_client_ip());
    if(!empty($data)){
        return $data[0][0]."-".$data[0][1]."-".$data[0][2];
    }
}


function GetIp(){
    $realip = '';
    $unknown = 'unknown';
    if (isset($_SERVER)){
        if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], $unknown)){
            $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            foreach($arr as $ip){
                $ip = trim($ip);
                if ($ip != 'unknown'){
                    $realip = $ip;
                    break;
                }
            }
        }else if(isset($_SERVER['HTTP_CLIENT_IP']) && !empty($_SERVER['HTTP_CLIENT_IP']) && strcasecmp($_SERVER['HTTP_CLIENT_IP'], $unknown)){
            $realip = $_SERVER['HTTP_CLIENT_IP'];
        }else if(isset($_SERVER['REMOTE_ADDR']) && !empty($_SERVER['REMOTE_ADDR']) && strcasecmp($_SERVER['REMOTE_ADDR'], $unknown)){
            $realip = $_SERVER['REMOTE_ADDR'];
        }else{
            $realip = $unknown;
        }
    }else{
        if(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), $unknown)){
            $realip = getenv("HTTP_X_FORWARDED_FOR");
        }else if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), $unknown)){
            $realip = getenv("HTTP_CLIENT_IP");
        }else if(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), $unknown)){
            $realip = getenv("REMOTE_ADDR");
        }else{
            $realip = $unknown;
        }
    }
    $realip = preg_match("/[\d\.]{7,15}/", $realip, $matches) ? $matches[0] : $unknown;
    return $realip;
}

function GetIpLookup($ip = ''){
    if(empty($ip)){
        $ip = $this->GetIp();
    }
    $res = @file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=' . $ip);
    if(empty($res)){ return false; }
    $jsonMatches = array();
    preg_match('#\{.+?\}#', $res, $jsonMatches);
    if(!isset($jsonMatches[0])){ return false; }
    $json = json_decode($jsonMatches[0], true);
    if(isset($json['ret']) && $json['ret'] == 1){
        $json['ip'] = $ip;
        unset($json['ret']);
    }else{
        return false;
    }
    return $json;
}



/**
 * 导出表格
 * @param string $fileName 文件名字
 * @param array $headArr
 * @param array  $data 查询的结果
 * @param array  $arr  设置行数以及宽度
 */
function getExcel($fileName,$headArr,$data,$arr)
{
    //导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
    import("Org.Util.PHPExcel");
    import("Org.Util.PHPExcel.Writer.Excel5");
    import("Org.Util.PHPExcel.IOFactory.php");

    //创建PHPExcel对象，注意，不能少了\
    $objPHPExcel = new \PHPExcel();
    $objProps = $objPHPExcel->getProperties();

    //设置表头
    $key = ord("A");
    //print_r($headArr);exit;
    foreach($headArr as $v){
        $colum = chr($key);
        $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
        $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
        $key += 1;
    }

    $column = 2;
    $objActSheet = $objPHPExcel->getActiveSheet();

    //文本格式
    //$objPHPExcel->getActiveSheet()->getStyle('A')->getNumberFormat()->setFormatCode(\PHPExcel_Style_NumberFormat::FORMAT_TEXT);

    //
    //$objPhpexcel->getActiveSheet()->getStyle('A'.$i)->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);//垂直
    //$objPhpexcel->getActiveSheet()->getStyle('A'.$i)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);//居中
    //$objPhpexcel->getActiveSheet()->getStyle('C'.$i)->getFont()->setSize(13);//设置字体大小
    //$objPhpexcel->getActiveSheet()->getStyle('A'.$i)->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);//设置字体颜色
    //设置列表宽度
    foreach($arr as $k=>$v){
        $letter=$v['letter'];
        $width=empty($v['width']) ? 10 : $v['width'];//宽度
        $size=empty($v['size']) ? 12 : $v['size'];//字体
        //$objPHPExcel->getActiveSheet()->getStyle($number)->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_WHITE);//设置字体颜色
        //$objPHPExcel->getActiveSheet()->getStyle($number)->getNumberFormat()->setFormatCode(\PHPExcel_Style_NumberFormat::FORMAT_GENERAL);//格式
        $objPHPExcel->getActiveSheet()->getColumnDimension($letter)->setWidth($width);//设置宽度
        $objPHPExcel->getActiveSheet()->getStyle($letter)->getFont()->setSize($size);//字体大小
        
    }

    //print_r($data);exit;
    foreach($data as $key => $rows){ //行写入
        $span = ord("A");
        foreach($rows as $keyName=>$value){// 列写入
            $j = chr($span);
            $objActSheet->setCellValue($j.$column, $value);
            $span++;
        }
        $column++;
    }

    $fileName = iconv("utf-8", "gb2312", $fileName);
    //重命名表
    //$objPHPExcel->getActiveSheet()->setTitle('test');
    //设置活动单指数到第一个表,所以Excel打开这是第一个表
    $objPHPExcel->setActiveSheetIndex(0);
    header('Content-Type: application/vnd.ms-excel');
    header("Content-Disposition: attachment;filename=\"$fileName\"");
    header('Cache-Control: max-age=0');

    $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output'); //文件通过浏览器下载
    exit;
}




/**
 * 获得二手物品的新旧程度
 * @author Dongzhixin
 */
function getdegree($degree)
{
    switch($degree)
    {
        case 1:
            $result = '全新';
            break;
        case 2:
            $result = '95成新 ';
            break;
        case 3:
            $result = '9成新';
            break;
        case 4:
            $result = '8成新';
            break;
        case 5:
            $result = '7成新及以下';
            break;
    }
    return $result;
}


//二维数组转一维 兼容PHP5.5(array_column)版本以下
function i_array_column($input, $columnKey, $indexKey=null){
    if(!function_exists('array_column')){ 
        $columnKeyIsNumber  = (is_numeric($columnKey))?true:false; 
        $indexKeyIsNull            = (is_null($indexKey))?true :false; 
        $indexKeyIsNumber     = (is_numeric($indexKey))?true:false; 
        $result                         = array(); 
        foreach((array)$input as $key=>$row){ 
            if($columnKeyIsNumber){ 
                $tmp= array_slice($row, $columnKey, 1); 
                $tmp= (is_array($tmp) && !empty($tmp))?current($tmp):null; 
            }else{ 
                $tmp= isset($row[$columnKey])?$row[$columnKey]:null; 
            } 
            if(!$indexKeyIsNull){ 
                if($indexKeyIsNumber){ 
                  $key = array_slice($row, $indexKey, 1); 
                  $key = (is_array($key) && !empty($key))?current($key):null; 
                  $key = is_null($key)?0:$key; 
                }else{ 
                  $key = isset($row[$indexKey])?$row[$indexKey]:0; 
                } 
            } 
            $result[$key] = $tmp; 
        } 
        return $result; 
    }else{
        return array_column($input, $columnKey, $indexKey);
    }
}


function arr2str ($arr)
{
    foreach ($arr as $v)
    {
        $v = join(",",$v); //可以用implode将一维数组转换为用逗号连接的字符串
        $temp[] = $v;
    }
    $t="";
    foreach($temp as $v){
        $t.=$v.",";
    }
    $t=substr($t,0,-1);
    return $t;
}



//注意：返回的access_token长度至少要留够512字节。接口返回值：
//{"access_token":"ACCESS_TOKEN","expires_in":7200}
//{"access_token":"vdlThyTfyB0N5eMoi3n_aMFMKPuwkE0MgyGf_0h0fpzL8p_hsdUX8VGxz5oSXuq5dM69lxP9wBwN9Yzg-0kVHY33BykRC0YXZZZ-WdxEic4","expires_in":7200}

function wx_get_token() {

    $token = S('access_token');

    if (!$token) {

        $res = file_get_contents('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='            .'wx818d3b7d1d08b14a'.'&secret='.'4ee193ea2a6eeae1bd116403d8b137f9');

        $res = json_decode($res, true);

        $token = $res['access_token'];

        // 注意：这里需要将获取到的token缓存起来（或写到数据库中）

        // 不能频繁的访问https://api.weixin.qq.com/cgi-bin/token，每日有次数限制

        // 通过此接口返回的token的有效期目前为2小时。令牌失效后，JS-SDK也就不能用了。

        // 因此，这里将token值缓存1小时，比2小时小。缓存失效后，再从接口获取新的token，这样

        // 就可以避免token失效。

        // S()是ThinkPhp的缓存函数，如果使用的是不ThinkPhp框架，可以使用你的缓存函数，或使用数据库来保存。

        S('access_token', $token, 3600);

    }

    return $token;

}




//获取jsapi的ticket。jsapi_ticket是公众号用于调用微信JS接口的临时票据。正常情况下，jsapi_ticket的有效期为7200秒，通过access_token来获取。

//接口返回值：
//{"errcode":0,"errmsg":"ok","ticket":"sM4AOVdWfPE4DxkXGEs8VMKv7FMCPm-I98-klC6SO3Q3AwzxqljYWtzTCxIH9hDOXZCo9cgfHI6kwbe_YWtOQg","expires_in":7200}

function wx_get_jsapi_ticket(){

    $ticket = "";

    do{

        $ticket = S('wx_ticket');

        if (!empty($ticket)) {

            break;

        }

        $token = S('access_token');

        if (empty($token)){

            wx_get_token();

        }

        $token = S('access_token');

        if (empty($token)) {

            logErr("get access token error.");

            break;

        }

        $url2 = sprintf("https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=%s&type=jsapi",

            $token);

        $res = file_get_contents($url2);

        $res = json_decode($res, true);

        $ticket = $res['ticket'];

        // 注意：这里需要将获取到的ticket缓存起来（或写到数据库中）

        // ticket和token一样，不能频繁的访问接口来获取，在每次获取后，我们把它保存起来。

        S('wx_ticket', $ticket, 3600);

    }while(0);

    return $ticket;

}

function setSignature($nonceStr,$url,$timestamp){
    //签名，将jsapi_ticket、noncestr、timestamp、分享的url按字母顺序连接起来，进行sha1签名。noncestr是你设置的任意字符串。timestamp为时间戳。

   //  $timestamp = time();
   //  $wxnonceStr = "taoyibao609";
   //  $wxticket = wx_get_jsapi_ticket();
   //  $wxOri = sprintf("jsapi_ticket=%s&noncestr=%s&timestamp=%s&url=%s",$wxticket, $wxnonceStr, $timestamp,'要分享的url(从http开始，如果有参数，包含参数）');
   // $wxSha1 = sha1($wxOri);
    
   
    //$timestamp = $timestamp;
    $wxnonceStr = $nonceStr;
    $wxticket = wx_get_jsapi_ticket();
    //$url = C("APP_SITE");
    $wxOri = sprintf("jsapi_ticket=%s&noncestr=%s&timestamp=%s&url=%s",$wxticket,$wxnonceStr,$timestamp,$url);

    $wxSha1 = sha1($wxOri);
// dump($wxSha1);exit;
    return $wxSha1;
}

//生成随机字符串
function createNonceStr($length = 16) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $str = "";
    for ($i = 0; $i < $length; $i++) {
        $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
    }
    return $str;
}





/**
 * 业务员提成
 */
function getBonus($user_id){
    $info = M('merch')->field('invitecode,joincode')->where(array('user_id'=>$user_id))->find();
    $code = $info['invitecode'];
    $code2 = $info['joincode'];
    
    $bonussql="
    SELECT commission as commission INTO @commission FROM win_rate WHERE id=1;
    SELECT proportion1 as proportion1 INTO @proportion1 FROM win_rate WHERE id=1;
    SELECT ROUND(IFNULL(SUM(total_price)*@commission/100,0),2) as sum INTO @sum FROM win_order WHERE user_id IN (SELECT user_id FROM win_user WHERE inviter=$code OR inviter=$code2) AND order_status IN(2,3,4,5,6,9,10,11,12,13);
    SELECT ROUND(IFNULL(SUM(total_price)*@commission/100,0)*@proportion1,2) as sum2 INTO @sum2 FROM win_order WHERE user_id IN (SELECT user_id FROM win_user WHERE inviter IN(SELECT invitecode FROM win_merch WHERE user_id IN(SELECT user_id FROM win_user WHERE inviter=(SELECT joincode FROM win_merch WHERE user_id=$user_id)))) AND order_status IN(2,3,4,5,6,9,10,11,12,13);
    UPDATE win_user SET money=money+@sum+@sum2 WHERE user_id=$user_id;
    SELECT money INTO @money FROM win_user WHERE user_id=$user_id;
    INSERT INTO win_money_record(user_id,income,balance,types,`name`,remark,order_id,add_time) VALUES('$user_id',@sum,@money,4,'提成','业务员提成',0,UNIX_TIMESTAMP());
    ";

    $bonusprocedure=
    "drop procedure if exists  bonusprocedure$user_id;
    create procedure bonusprocedure$user_id()
    begin
    $bonussql
    end;";
    
    
    $res1 = M()->execute($bonusprocedure);

    //创建定时器
    $bonusevent="
    CREATE EVENT IF NOT EXISTS bonus$user_id 
    ON SCHEDULE EVERY 7 DAY STARTS FROM_UNIXTIME(UNIX_TIMESTAMP(subdate(curdate(),date_format(curdate(),'%w')-8)))
    ON COMPLETION PRESERVE 
    DO CALL bonusprocedure$user_id; 
    ";
    $res2 = M()->execute($bonusevent);
    
}


/**
 * 加盟商提成
 */
function getJoins($user_id){

    $info = M('merch')->field('invitecode,joincode')->where(array('user_id'=>$user_id))->find();
    $code = $info['invitecode'];
    $code2 = $info['joincode'];
    
    $joinssql="
    SELECT commission as commission INTO @commission FROM win_rate WHERE id=1;
    SELECT proportion1 as proportion1 INTO @proportion1 FROM win_rate WHERE id=1;
    SELECT ROUND(IFNULL(SUM(total_price)*@commission/100,0),2) as sum INTO @sum FROM win_order WHERE user_id IN (SELECT user_id FROM win_user WHERE inviter=$code OR inviter=$code2) AND order_status IN(2,3,4,5,6,9,10,11,12,13);
    SELECT ROUND(IFNULL(SUM(total_price)*@commission/100,0)*@proportion1,2) as sum2 INTO @sum2 FROM win_order WHERE user_id IN (SELECT user_id FROM win_user WHERE inviter IN(SELECT invitecode FROM win_merch WHERE user_id IN(SELECT user_id FROM win_user WHERE inviter=(SELECT joincode FROM win_merch WHERE user_id=$user_id)))) AND order_status IN(2,3,4,5,6,9,10,11,12,13);
    UPDATE win_user SET money=money+@sum+@sum2 WHERE user_id=$user_id;
    SELECT money INTO @money FROM win_user WHERE user_id=$user_id;
    INSERT INTO win_money_record(user_id,income,balance,types,`name`,remark,order_id,add_time) VALUES('$user_id',@sum,@money,4,'提成','加盟商提成',0,UNIX_TIMESTAMP());
    ";


    // $info = M('merch')->field('invitecode')->where(array('user_id'=>$user_id))->find();
    // $code = $info['invitecode'];
    
    // $joinssql="
    // SELECT ROUND(IFNULL(SUM(total_price)*5.5/52/100,0),2) as sum INTO @sum FROM win_order WHERE user_id IN (SELECT user_id FROM win_user WHERE inviter=$code) AND order_status IN(2,3,4,5,6,9,10,11,12,13);
    // UPDATE win_user SET money=money+@sum WHERE user_id=$user_id;
    // SELECT money INTO @money FROM win_user WHERE user_id=$user_id;
    // INSERT INTO win_money_record(user_id,income,balance,types,`name`,remark,order_id,add_time) VALUES('$user_id',@sum,@money,4,'提成','加盟商提成',0,UNIX_TIMESTAMP());
    // ";



    $joinsprocedure=
    "drop procedure if exists  joinsprocedure$user_id;
    create procedure joinsprocedure$user_id()
    begin
    $joinssql
    end;";
    
    
    $res1 = M()->execute($joinsprocedure);

    //创建定时器
    $joinsevent="
    CREATE EVENT IF NOT EXISTS joins$user_id 
    ON SCHEDULE EVERY 7 DAY STARTS FROM_UNIXTIME(UNIX_TIMESTAMP(subdate(curdate(),date_format(curdate(),'%w')-8)))
    ON COMPLETION PRESERVE 
    DO CALL joinsprocedure$user_id; 
    ";
    $res2 = M()->execute($joinsevent);
    
}

/**
 * 压缩html : 清除换行符,清除制表符,去掉注释标记  
 * @param $string  
 * @return  压缩后的$string 
 * */
function compress_html($string) {  
    $string = str_replace("\r\n", '', $string); //清除换行符  
    $string = str_replace("\n", '', $string); //清除换行符  
    $string = str_replace("\t", '', $string); //清除制表符  
    $pattern = array (  
                    "/> *([^ ]*) *</", //去掉注释标记  
                    "/[\s]+/",  
                    "/<!--[^!]*-->/",  
                    "/\" /",  
                    "/ \"/",  
                    "'/\*[^*]*\*/'"  
                    );  
    $replace = array (  
                    ">\\1<",  
                    " ",  
                    "",  
                    "\"",  
                    "\"",  
                    ""  
                    );  
    return preg_replace($pattern, $replace, $string);  
}

//俩个时间戳相差多少
function timediff($begin_time,$end_time){
    if($begin_time < $end_time){
        $starttime = $begin_time;
        $endtime = $end_time;
    }else{
        $starttime = $end_time;
        $endtime = $begin_time;
    }

    //计算天数
    $timediff = $endtime-$starttime;
    $days = intval($timediff/86400);
    //计算小时数
    $remain = $timediff%86400;
    $hours = intval($remain/3600);
    //计算分钟数
    $remain = $remain%3600;
    $mins = intval($remain/60);
    //计算秒数
    $secs = $remain%60;
    $res = array("day" => $days,"hour" => $hours,"min" => $mins,"sec" => $secs);
    return $res;
}
