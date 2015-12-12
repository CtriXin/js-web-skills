<?php
class page{
     
    public $page; //当前页
    public $pagenum;  // 页数
    public $pagesize;  // 每页显示条数
    public function __construct($count, $pagesize){
        $this->pagenum = ceil($count/$pagesize);
        $this->pagesize = $pagesize;
        $this->page =(isset($_GET['p'])&&$_GET['p']>0) ? intval($_GET['p']) : 1;
    }
    /**
     * 获得 url 后面GET传递的参数
     */
    public function getUrl(){   
        $url = 'index.php?'.http_build_query($_GET);
        $url = preg_replace('/[?,&]p=(\w)+/','',$url);
        $url .= (strpos($url,"?") === false) ? '?' : '&';
        return $url;
    }
    /**
     * 获得分页HTML
     */
    public function getPage(){
        $url = $this->getUrl();
        $start = $this->page-5;
        $start=$start>0 ? $start : 1; 
        $end   = $start+9;
        $end = $end<$this->pagenum ? $end : $this->pagenum;
        $pagestr = '';
        if($this->page>5){
            $pagestr = "<a href=".$url."p=1".">首页</a> ";
        }
        if($this->page!=1){
            $pagestr.= "<a href=".$url."p=".($this->page-1).">上一页</a>";
        }
         
        for($i=$start;$i<=$end;$i++){
            $pagestr.= "<a href=".$url."p=".$i.">".$i."</a>  ";                     
        }
        if($this->page!=$this->pagenum){
            $pagestr.="<a href=".$url."p=".($this->page+1).">下一页</a>";
             
        }
        if($this->page+5<$this->pagenum){
            $pagestr.="<a href=".$url."p=".$this->pagenum.">尾页</a> ";
        }
        return $pagestr;    
    }
     
}
// 测试代码
$page = new page(100,10);
$str=$page->getPage();
echo $str;
 
 
?>