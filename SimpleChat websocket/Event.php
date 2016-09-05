<?php
/**
 * 
 * 主逻辑
 * 主要是处理 onMessage onClose 三个方法
 * @author walkor <walkor@workerman.net>
 * 
 */

use \GatewayWorker\Lib\Gateway;

class Event
{
   /**
    * 有消息时
    * @param int $client_id
    * @param string $message
    */
   public $user_num;
   public static function onMessage($client_id, $message)
   {
        // 获取客户端请求
    $message_data = json_decode($message, true);
    echo 'message'.$message.'ID'.$client_id;
    if(!$message_data)
    {
        return ;
    }
//text-info 是系统发送的。text-user 是其他用户发送的。

    switch($message_data['type'])
    {
        case 'JOIN':
        // 转播给所有用户
        Gateway::sendToAll(json_encode(
            array(
                'type'     => 'NOTE',
                'id'         => $client_id,
                'text_type'   => 'text-info',
                'msg' => $message_data['user_nickname'].'加入聊天。当前共有'.count(Gateway::getOnlineStatus()).'把剪子在线。',
                )
            ));
        break;
        case 'QUIT':
        // 转播给所有用户
        GateWay::sendToAll(json_encode(array('type'=>'QUIT', 'msg'=>$message_data['from'].'退出聊天啦 T^T'),true));
        break;
        case 'EDIT':
        // 转播给所有用户
        Gateway::sendToAll(json_encode(
            array(
                'type'     => 'EDIT',
                'from'         => $message_data['from'],
                'to'   => $message_data['to'],
                'head' => $message_data['head'],
                )
            ));
        break;
        case 'NAME':
            // var_export(Gateway::getOnlineStatus());

            // echo 'online num :'.count(Gateway::getOnlineStatus());
        $id=mt_rand(1,9);
        Gateway::sendToCurrentClient('{"type":"NAME","head":"http://img3.178.com/acg1/201507/230072993522/230073874484.jpg","name":"剪纸'.$client_id.'号","msg":"大家好，剪纸'.$client_id.'号来啦。"}');
        echo 'NAME IS come ';
        

        break;
            // 更新用户
        case 'POST':
                // 转播给所有用户
        echo 'POST IS IN';
        Gateway::sendToAll(json_encode(
            array(
                'type'     => 'POST',
                'from'         => $message_data['from'],
                'msg'                => $message_data['context'],
                'head'  => $message_data['head'],
                )
            ));
        return;
            // 聊天
        case 'message':
                // 向大家说
        $new_message = array(
            'type'=>'message', 
            'id'=>$client_id,
            'message'=>$message_data['message'],
            );
        return Gateway::sendToAll(json_encode($new_message));
    }
}

   /**
    * 当用户断开连接时
    * @param integer $client_id 用户id
    */
   public static function onClose($client_id)
   {

       // 广播 xxx 退出了
    // echo $message;
    // $message_data1 = json_decode($message,true);
    // if(!$message_data1)
    // {
    //     echo  'message_data null';
    //     return ;
    // }
    // echo 'from  '.$message_data1['from'];
    // GateWay::sendToAll(json_encode(array('type'=>'QUIT', 'msg'=>$message_data1['from'].'有个剪纸退出聊天啦'),true));
}
}
