<?php 
	class Lib_Page
	{
		public $currentPage=0;							//当前页数
		private $totalPage=0;								//总页数
		private $totalNums=0;						    //总记录数
		private $perNums=0;								//每页显示的记录数
		private $type = 0;									//显示类型
		
		public function __construct($totalNums , $perNums,$type=0)
		{
			$this->totalNums	= intval($totalNums);
			$this->perNums		= intval($perNums);
			$this->totalPage		=	intval(ceil($this->totalNums / $this->perNums));
			$this->currentPage	= min(max(1 , $_REQUEST['p']) , $this->totalPage);
			$this->type 				=	intval($type);
		}
		
		private function first()
		{
			if ($this->currentPage==1) 	return false;
			return "<a href='?p=1'>首页</a>&nbsp;&nbsp;";
		}
		
		private function last()
		{
			if ($this->currentPage==$this->totalPage) 	return false;
			return "<a href='?p={$this->totalPage}'>尾页</a>&nbsp;&nbsp;";
		}
		
		private function next()
		{
			$p = min($this->currentPage+1 , $this->totalPage);
			if ($p==$this->totalPage) 	return false;
			return "<a href='?p={$p}'>下一页</a>&nbsp;&nbsp;";
		}
		
		private function prev()
		{
			$p =  max(1 , $this->currentPage - 1);
			if($p==1)		return false;
			return "<a href='?p={$p}'>上一页</a>&nbsp;&nbsp;";
		}
		
		private function total()
		{
			return "<span>共 {$this->totalPage} 页</span> | <span>{$this->totalNums} 条记录</span> | <span>当前第 {$this->currentPage} 页</span>";
		}
		
		private function page()
		{
			$show = "";
			for ($i=1; $i<=$this->totalPage; $i++){
				if ($i==$this->currentPage) 
					$show .= "<a href='?p={$i}' class='active' >{$i}</a>&nbsp;&nbsp;";
				else
					$show .= "<a href='?p={$i}' >{$i}</a>&nbsp;&nbsp;";
			}
			return $show;
		}
		
		public function show()
		{
			if ($this->type==1) {
				return $this->total().' '.$this->page();
			}else if($this->type==2){
				return $this->total().' '.$this->first().' '.$this->prev().' '.$this->next().' '.$this->last();
			}elseif ($this->type==0){
				return $this->total().' '.$this->first().' '.$this->prev().' '.$this->page().' '.$this->next().' '.$this->last();
			}
		}
		
	}
	
	$totalNums = 80;
	$perNums = 10;
	$page = new Lib_Page($totalNums, $perNums);
	echo $page->show();
?>