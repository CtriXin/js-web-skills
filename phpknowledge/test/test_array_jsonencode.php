<?php
 $arr = array(array('id'=>1, 'xuefei'=>"50w" ), array('id'=>2, 'xuefei'=>"51~60" ));
// $arr = array('id'=>2, 'xuefei'=>'51~60' );
echo json_encode($arr);
print_r($arr);
$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => '5');

echo json_encode($arr);
// $json=json_encode(array('id'=>1, 'xuefei'=>"50мРртоб" ));
// echo('2'.$json);
?>