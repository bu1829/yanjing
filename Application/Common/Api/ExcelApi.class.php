<?php
namespace Common\Api;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class ExcelApi extends  Controller{

    
public function leadingOutExcel(){
        //首先创建一个新的对象

        require_once 'Public/Common/PHPExcel.php';
        $objPhpexcel=new \PHPExcel();
        
        //设置文件的一些属性
        $objPhpexcel
                    ->getProperties()//获得文件属性对象,给下文提供设置资源
                    ->setCreator("administrator")
                    ->setLastModifiedBy("administrator")//设置最后修改者
                    ->setTitle("office 2007 text")//设置标题
                    ->setSubject("text")//设置主题
                    ->setDescription("remark")//设置备注
                    ->setKeywords("bj")//设置标记
                    ->setCategory("text type");//设置类别
    
        $objPhpexcel->setActiveSheetIndex(0)//设置第一个内置表
                    ->setCellValue('A1','用户名')
                    ->setCellValue('B1','登陆次数')
                    ->setCellValue('C1','注册时间');
        
    
        //从数据库查找数据，加入到excel表单
        $model=M("user");
    
         
        $count=$model->count();
         
        $row=$model
        /* ->field("users.username,users.addtime,useraddress.community,useraddress.address") */
      		->select();
        for ($i = 2; $i <= $count+1; $i++){
            $objPhpexcel->setActiveSheetIndex(0)//设置第一个内置表（一个xls文件里可以有多个表）
            ->setCellValue('A'.$i,$row[$i-2]['username'])
            ->setCellValue('B'.$i,$row[$i-2]['login'])
            //->setCellValue('B'.$i,$row[$i-2]['community'].$row[$i-2]['address'])
            ->setCellValue('C'.$i,date("Y-m-d",$row[$i-2]['reg_time']));
    
    
            $objPhpexcel->getActiveSheet()->getStyle('A'.$i)->getFont()->setSize(13);//设置字体大小
            $objPhpexcel->getActiveSheet()->getStyle('B'.$i)->getFont()->setSize(13);//设置字体大小
            $objPhpexcel->getActiveSheet()->getStyle('C'.$i)->getFont()->setSize(13);//设置字体大小
           
            $objPhpexcel->getActiveSheet()->getStyle('A'.$i)->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);//设置字体颜色
            	
            //设置一行高度
            $objPhpexcel->getActiveSheet()->getRowDimension($i)->setRowHeight(40);
            	
            //设置每一个的对其方式
            $objPhpexcel->getActiveSheet()->getStyle('A'.$i)->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);//垂直
            $objPhpexcel->getActiveSheet()->getStyle('B'.$i)->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);//垂直
            $objPhpexcel->getActiveSheet()->getStyle('C'.$i)->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);//垂直
            
    
            $objPhpexcel->getActiveSheet()->getStyle('A'.$i)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);//居中
            $objPhpexcel->getActiveSheet()->getStyle('B'.$i)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);//居中
            $objPhpexcel->getActiveSheet()->getStyle('C'.$i)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);//居中
    
        }
    
        $today=date("Y-m-d");
    
        //下载 生成2007excel格式的xlsx文件
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="加盟商表'.$today.'.xlsx"');
        header('Cache-Control: max-age=0');
    
        $objWriter = \PHPExcel_IOFactory:: createWriter($objPhpexcel, 'Excel2007');
        $objWriter->save( 'php://output');
    }
}//类的结束