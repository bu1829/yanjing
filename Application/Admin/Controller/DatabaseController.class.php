<?php
namespace Admin\Controller;
use Common\Api\CommonApi;
/**
 * 数据库控制器
 */
class DatabaseController extends AdminController{
    public function __construct(){
        parent::__construct();
    }
    
    /**
     * 数据表列表
     */
    public function index() {
        $m_table = M('table');
        if(empty($_GET['p'])){
            $db_name=C("DB_NAME");
            $list = M()->query("SHOW TABLE STATUS FROM `$db_name`");  //得到表的信息
           
            $arr1=array();
            foreach($list as $k=>$v){
                $l=$v['data_length'];
                if($l>=0 && $l<1024){
                    $list[$k]['size']=$l."B";
                }elseif($l>=1024 && $l<1024*1024){
                    $size=round(($l/1024),2);
                    $list[$k]['size']=$size."KB";
                }elseif($l>=1024*1024){
                    $size=round(($l/1024/1024),2);
                    $list[$k]['size']=$size."MB";
                }
                $arr1[]=$v['name'];
            }
            
            //查找当前的table 表
            $list2 = $m_table->field("name")->select();
            // var_dump($list2);exit;
            $arr2=array();
            foreach($list2 as $k=>$v){
                $arr2[$k]=$v['name'];
            }
            
            //数据表中的表不在实际的表中，则删除掉
            $diffent=array_diff($arr2,$arr1);
            foreach($diffent as $k=>$v){
                $m_table->where(array("name"=>$v))->delete();
            }
            
            foreach($list as $k=>$v){
                $name = $v['name'];
                $size = $v['size'];
                $create = $v['create_time'];
                $id = $m_table->where(array("name"=>$name))->find();
                if(empty($id)){
                    $arr = array("name"=>$name,"size"=>$size,"create_time"=>$create);
                    $m_table->add($arr);
                }else{
                    $arr = array("name"=>$name,"size"=>$size,"create_time"=>$create);
                    $m_table->where(array("name"=>$name))->save($arr);
                }
            }
        }
        
        $this->lists("table","","id");
        $this->meta_title="优化数据表";
        $this->display();
    }
    
    /**
     * 优化表(ajax)
     */
    public function optimizeTable(){
    	$m_table = M('table');
    	$action = I("action");
    	if('one' == $action){
    		$id=I("post.id");
    		$Common = new CommonApi();
    		if($id && is_numeric($id)){
    			$data = $m_table->field("name")->where(array("id"=>$id))->find();
    			$name = $data['name'];
    			if(!empty($name)){
    				$sql="optimize table ".$name;
    				if(M()->query($sql)){
    					$arr = array('optimize_time'=>time());
    					$m_table->field("optimize_time")->where(array("id"=>$id))->save($arr);
    					$time = date("Y-m-d H:i:s");
    					$Common->json($time,"1");//优化成功
    				}else{
    					$Common->json("优化失败","2");
    				}
    			}else{
    				$Common->json("不存在此表","3");
    			}
    		}else{
    			$Common->json("非法操作","3");
    		}
    	}elseif('all' == $action){//一键优化全部
    		$list=$m_table->select();
    		foreach($list as $k=>$v){
    			$sql = "optimize table ".$v['name'];
    			if(M()->query($sql)){
    				$arr=array('optimize_time'=>time());
    				$m_table->field("optimize_time")->where(array("id"=>$v['id']))->save($arr);
    			}
    		}
    		$this->success("恭喜，全部优化完毕!");
    	}
    }
    
    
    /**
     * 备份数据库
     */
    public function database() {
        $this->meta_title='数据库备份/还原';

        $DataDir = 'Data/';
        if(!file_exists($DataDir)){
            mkdir($DataDir,0777);
        }
          
        $lists = $this->MyScandir($DataDir);
        $this->assign("datadir",$DataDir);
        $this->assign("lists", $lists);
        $this->display();
    }
    
    
    /**
     * 获得路径
     * @param string $FilePath
     * @param number $Order
     * @return string
     */
    private function MyScandir($FilePath = './', $Order = 0) {
        $FilePath = opendir($FilePath);
        while (false !== ($filename = readdir($FilePath))) {
            $FileAndFolderAyy[] = $filename;
        }
        $Order == 0 ? sort($FileAndFolderAyy) : rsort($FileAndFolderAyy);
        return $FileAndFolderAyy;
    }

    /**
     * 添加新备份
     */
    public function newBackup(){
        $msr = $this->sqlInfo();
        if($msr->backup()){
            $this->success('数据备份成功！');
        }
    }

    /**
     * 数据还原
     */
    public function restore(){
        $file = I("file");
        $msr = $this->sqlInfo();
        if($msr->recover($file)){
            $this->success('数据还原成功！');
        }
    }

    /**
     * 数据删除
     */
    public function delData(){
        $file = I("file");
        $msr = $this->sqlInfo();
        $Common = new CommonApi();
        if (@unlink('Data/' . $file)) {
            $Common->json("删除成功",1);
        } else {
            $Common->json("删除失败",2);
        }
    }

    /**
     * 数据下载
     */
    public function downloadData(){
        $file = I("file");
        $msr = $this->sqlInfo();

        function DownloadFile($fileName) {
            ob_end_clean();
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Length: ' . filesize($fileName));
            header('Content-Disposition: attachment; filename=' . basename($fileName));
            readfile($fileName);
        }
        DownloadFile('Data/' . $_GET['file']);
        exit();
    }

    private function sqlInfo(){
        import("Common.Org.MySQLReback");
        $DataDir = "Data/";
        if(!file_exists($DataDir)){
            mkdir($DataDir,0777);
        }
        $config = array(
            'host' => C('DB_HOST'),
            'port' => C('DB_PORT'),
            'userName' => C('DB_USER'),
            'userPassword' => C('DB_PWD'),
            'dbprefix' => C('DB_PREFIX'),
            'charset' => 'UTF8',
            'path' => $DataDir,
            'isCompress' => 0, //是否开启gzip压缩
            'isDownload' => 0
        );
        $msr = new MySQLReback($config);
        $msr->setDBName(C('DB_NAME'));
        return $msr;
    }

}