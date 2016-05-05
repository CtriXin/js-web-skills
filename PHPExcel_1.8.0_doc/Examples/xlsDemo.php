<?php
/*
*author zhy
*date 2012 06 12
*for excel
*/
date_default_timezone_set("PRC"); 
error_reporting(E_ALL);
error_reporting(0);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
/** Include PHPExcel */
require_once dirname(__FILE__) . '/../Classes/PHPExcel.php';
require_once("config.php");
require_once("mysql.class.php");
//根据时间生成采购报表
$time = date("a");
$minute = date("i");
$apm  = "";
if($time=='pm'){
    $apm     = $time;
    $stime   = mktime(12,00,00,date('m'),date('d')-1,date('Y'));
    $etime   = mktime(11,59,59,date('m'),date('d'),date('Y'));
}else{
  $apm     = $time;
    $stime   = mktime(12,00,00,date('m'),date('d')-1,date('Y'));
    $etime   = mktime(11,59,59,date('m'),date('d'),date('Y'));
}
//实例化excel类
$objPHPExcel = new PHPExcel();
////////获取文档信息
////////$objProps = $objPHPExcel->getProperties();
///////print_r($objProps);
///////echo "<br/>";
///////$objProps->setDescription("test_123456");
///////print_r($objProps);

$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A5','商品编码')
                ->setCellValue('B5','货号')
                ->setCellValue('C5','商品名称')
                ->setCellValue('D5','采购量');
//设置选定sheet表名
$objPHPExcel->getActiveSheet()->setTitle('祖名');
//设置字体样式
$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setName('Arial')->setSize(25);//////->setUnderline(true);/////->getColor()->setARGB('FFFF0000');///->setBold(true);
//合并单元格 给单元格赋值(数值，字符串，公式)
$objPHPExcel->getActiveSheet()->mergeCells('A1:D3')->setCellValue('A1', 'zhongyi清单');
///////$objPHPExcel->getActiveSheet()->mergeCells('A4:D4')->setCellValue('A4', "=SUM(E4:F4)");
$date_now  = date("Y-m-d");
$objPHPExcel->getActiveSheet()->mergeCells('A4:D4')->setCellValue('A4', "采购日期：".$date_now." ".$apm."　");
//设置单列宽度
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);//$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setRowHeight(50);/
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(44);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
//大边框样式 边框加粗
$lineBORDER = array(
 'borders' => array(
  'outline' => array(
   'style' => PHPExcel_Style_Border::BORDER_THICK,
   'color' => array('argb' => '000000'),
  ),
 ),
);
//表头样式
$head = array(
    'font'    => array(
    'bold'      => true
  ),
 'alignment' => array(
    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
   ),

);
//标题样式
$title = array(
    'font'    => array(
    'bold'      => true
    ),
);
//居中对齐
$CENTER = array(
    'alignment' => array(
      'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
      'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
     ),
);
//靠右对齐
$RIGHT = array(
    'alignment' => array(
      'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
      'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
     ),
);
//细边框样式
$linestyle = array(
 'borders' => array(
  'outline' => array(
   'style' => PHPExcel_Style_Border::BORDER_THIN,
   'color' => array('argb' => 'FF000000'),
  ),
 ),
);

$objPHPExcel->getActiveSheet()->getStyle('A1:D3')->applyFromArray($head);///->getAlignment()->getHorizontal('');///->getBorders()->getTop()->setBorderStyle('');
//->setWrapText(true);自动换行
$objPHPExcel->getActiveSheet()->getStyle('A4:D4')->applyFromArray($RIGHT); 
$objPHPExcel->getActiveSheet()->getStyle('A5:D5')->applyFromArray($title);
//填充色
/////$objPHPExcel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setARGB('FFFF0000');/
    
//插入数据
$dsql->Execute('omebrand_list',"select i.goods_id , sum( `nums` ) AS num, i.name,i.addon,i.price,g.bn as b,i.bn as h,
g.goods_id,i.goods_id,i.order_id
FROM `sdb_b2c_order_items` as i,sdb_b2c_goods as g
WHERE i.order_id in (select order_id from sdb_b2c_orders where status ='active' and createtime between $stime and $etime) and i.goods_id=g.goods_id and g.cat_id=173 GROUP BY h");
$m = 0;
  unset($re);
  while($row=$dsql->GetObject('omebrand_list'))
  {   $re[$m] = get_object_vars($row);
  $m++;
  }
$row_count = 5;
$objPHPExcel->setActiveSheetIndex(0)
   ->setCellValue('A6', 12325416541)
            ->setCellValue('B6', 4962132165262)
            ->setCellValue('C6', 121515212515241521)
            ->setCellValue('D6', 96215465415);
foreach($re as $r => $dataRow) {
 $baseRow = 6;
 $row = $baseRow + $r;
 $bn=$dataRow[h];
 $goods_id = $dataRow[goods_id];
   $spec_value = "";
   $aa = unserialize($dataRow[addon]);
   if ($aa['product_attr']){
    foreach ($aa['product_attr'] as $arr_special_info)  {
     $spec_value = $arr_special_info['value'];
    }
   }

   preg_match_all('/\-?\d+\.?\d*/i',$spec_value,$row1);
   $num = $row1[0][0];
   $all = $num*$dataRow[num];
   if($spec_value==''){
    $all=$dataRow['num'];
    //$prce=$dataRow[price];
   }
 $objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A'.$row, $dataRow['b'])
                ->setCellValue('B'.$row, $bn)
             ->setCellValue('C'.$row, $dataRow['name'])
             ->setCellValue('D'.$row, $all);
    $objPHPExcel->getActiveSheet()->getStyle('A'.$row_count)->applyFromArray($linestyle);             
    $objPHPExcel->getActiveSheet()->getStyle('B'.$row_count)->applyFromArray($linestyle);
    $objPHPExcel->getActiveSheet()->getStyle('C'.$row_count)->applyFromArray($linestyle);
    $objPHPExcel->getActiveSheet()->getStyle('D'.$row_count)->applyFromArray($linestyle);              

 $baseRow++;
    $row_count++;
}
$objPHPExcel->getActiveSheet()->getStyle('A'.$row_count)->applyFromArray($linestyle);             
$objPHPExcel->getActiveSheet()->getStyle('B'.$row_count)->applyFromArray($linestyle);
$objPHPExcel->getActiveSheet()->getStyle('C'.$row_count)->applyFromArray($linestyle);
$objPHPExcel->getActiveSheet()->getStyle('D'.$row_count)->applyFromArray($linestyle);  
$objPHPExcel->getActiveSheet()->getStyle('A5:D'.$row_count)->applyFromArray($CENTER);  
$objPHPExcel->getActiveSheet()->getStyle('A1:D'.$row_count)->applyFromArray($lineBORDER);

//设置打印页边距
$objPHPExcel->getActiveSheet()->getPageMargins()->setTop(0);
$objPHPExcel->getActiveSheet()->getPageMargins()->setRight(0);
$objPHPExcel->getActiveSheet()->getPageMargins()->setLeft(0);
$objPHPExcel->getActiveSheet()->getPageMargins()->setBottom(0);
//设置纸张类型
$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
//设置自动筛选
$objPHPExcel->getActiveSheet()->setAutoFilter('A5:D'.$row_count);
//设置自动换行
$objPHPExcel->getActiveSheet()->getStyle('B6:B'.$row_count)->getAlignment()->setWrapText(true);
//设置格式化数字
$objPHPExcel->getActiveSheet()->getStyle('A6:A'.$row_count)->getNumberFormat()->setFormatCode('0000000000');
//设置安全级别
$md=md5(time());
$md=substr($md,0,8);
$objPHPExcel->getActiveSheet()->getProtection()->setPassword("$md");
$objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);//
$objPHPExcel->getActiveSheet()->getProtection()->setSort(true);
$objPHPExcel->getActiveSheet()->getProtection()->setInsertRows(true);
$objPHPExcel->getActiveSheet()->getProtection()->setFormatCells(true);
//添加图片 
/*
$obj=$objPHPExcel->getActiveSheet();
$objDrawing = new PHPExcel_Worksheet_Drawing();   
$objDrawing->setName('wsyImg');   
$objDrawing->setDescription('Image inserted by zhy');   
$objDrawing->setPath('./wsy.jpg');   
$objDrawing->setHeight(50);   
$objDrawing->setCoordinates('H23');   
$objDrawing->setOffsetX(60);   
$objDrawing->setRotation(-10);   /
$objDrawing->getShadow()->setVisible(true);   
$objDrawing->getShadow()->setDirection(-20); / 
$objDrawing->setWorksheet($obj);
*/
//页眉页脚
//$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('zhy'); 
//$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('end');

$objPHPExcel->setActiveSheetIndex(0);
$tname=date('Y-m-dH',time());
$tnam=iconv('UTF-8','GBK','祖名订单');
$tname=$tnam.$tname;

// Excel 2007保存
//$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
//$objWriter->save(str_replace('.php', '.xlsx', __FILE__)); 

// Excel 5保存 
//$objWriter = new PHPExcel_Writer_Excel5($objPHPExcel); 
//$objWriter->save(str_replace('.php', '.xls', __FILE__));
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save(str_replace('.php', '.xls', __FILE__));

//$url = "/data/home/htdocs/ec/public/files/".date("Y")."/".date("Ym")."/";
createDir($url);
function createDir($dir) {
 if  (!is_dir ($dir )) {
  mkdir($dir, 0777, true);
  chmod($dir, 0777);  
  chown( $dir, 'daemon' );
  chgrp( $dir, 'daemon' );   
 }
}
$name='forexmple_excel';
rename(str_replace('.php', '.xls', __FILE__), $name.'.xls');

?>