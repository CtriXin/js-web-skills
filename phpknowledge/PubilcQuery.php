<?php
set_time_limit(0);
// require_once "lib/WechatDownloader.php";
// require_once('lib/Ucpaas.class.php');
// require_once('lib/RongYun.php');

class PubilcQuery extends WechatBaseController{
	const DEF_REPLY="为了更好的为您服务，请先进行认证。";
	const DEF_CANCELL=",如需取消当前操作请回复'9'";
	const YG_REGISTER_SUCCE="么么哒，资料记录完毕，义工注册成功，点下面菜单的/:heart后才可以接收到问题哦";
	const DESCRIBE="思路飞扬公众号是专为视障者朋友服务的：\n在工作时间内可以发送图片或拍照提问给我们，我们会尽快回复您图片是什么的。\n 我们将会对您的个人资料进行保密，更多功能，请回复\n【6】修改手机号\n【7】验证手机号\n【9】取消当前操作";
	
	private $openid,$keyword,$mem,$yg_voiceReply,$mediaId,$fromUsername,$recognition;
	public $ygReply,$msg_id;




public function query(){
	$this->openid = Input::get('args');
	if ($this->openid) {
		$idArr=DB::select("select id from users where name ='$this->openid'");
	if(empty($idArr)){
		// Log::info("insert into users (name,group_id)values('$this->openid',$group_id)");
		return 'error';
	}else{
		$id=$idArr[0]->id;
		$idArr=DB::select("SELECT distinct reply.messages_reply,reply.messages_id FROM `reply` inner join users where reply.state=512 and reply.users_id=262 and reply.messages_reply!='' limit 0,10");
		return var_dump((array)$idArr);
	}
	}else{
		return 'error';
	}
	

}
}
?>