<?php 
	class Lib_Tree
	{
		private $items = array();
		private $icon = array(
			'├',
			'&nbsp;&nbsp;├',
			'&nbsp;&nbsp;&nbsp;&nbsp;├',
			'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├',
			'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├',
			'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└',	
		);
		private $field = array('id','name');
		public $ret = '<table><tr><th>类名</th> <th>操作</th></tr>';
		
		public function __construct($items)
		{
			$this->items = $items;
		}
		
		public function setIcon($icon)
		{
			$this->icon = $icon;
		}
		
		public function getChildren($pid)
		{
			foreach ($this->items as $item)
			{
				if($item['pid']==$pid)
				{
					$children[] = $item;
				}
			}	
			return $children && is_array($children) ? $children : false;
		}
		
		public function getParent($id)
		{
			return $this->items[$this->items[$id]['pid']];
		}
		
		public function show($pid)
		{
			$children = $this->getChildren($pid);
			if(!$children) return false;
			foreach ($children as $child)
			{
				$this->ret.='<tr>';
				$this->ret.='<td>'.$this->icon[$child['level']].$child['name'].'</td>';
				$this->ret.='<td><a href="?c=category&m=del&id='.$child['id'].'">删除</a> <a href="?c=category&m=add&id='.$child['id'].'">添加</a> <a href="?c=category&m=mod&id='.$child['id'].'">修改</a></td>';
				$this->ret.='</tr>';
				$this->show($child['id']);
			}
		}
		
		
	}

	$items = array(
			array('id'=>1 , 'name'=>'湖北', 'pid'=>0, 'level'=>0),
			array('id'=>2 , 'name'=>'武汉', 'pid'=>1, 'level'=>1),
			array('id'=>3 , 'name'=>'孝感', 'pid'=>1, 'level'=>1),
			array('id'=>4 , 'name'=>'广东', 'pid'=>0, 'level'=>0),
			array('id'=>5 , 'name'=>'广州', 'pid'=>4, 'level'=>1),
			array('id'=>6 , 'name'=>'深圳', 'pid'=>4, 'level'=>1),
			array('id'=>7 , 'name'=>'东莞', 'pid'=>4, 'level'=>1),
			array('id'=>8 , 'name'=>'宜昌', 'pid'=>1, 'level'=>1),
			array('id'=>9 , 'name'=>'云梦', 'pid'=>3, 'level'=>2),
			array('id'=>10 , 'name'=>'南山区', 'pid'=>6, 'level'=>2),
			array('id'=>11 , 'name'=>'宝安全', 'pid'=>6, 'level'=>2),
			array('id'=>12 , 'name'=>'倒店', 'pid'=>9, 'level'=>3),
			array('id'=>13 , 'name'=>'罗范大队', 'pid'=>12, 'level'=>4),
			array('id'=>14 , 'name'=>'下范存', 'pid'=>13, 'level'=>5),
	);
	
	$tree = new Lib_Tree($items);
	 $tree->show(0);
	 echo $tree->ret;
	
?>