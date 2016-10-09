<?php
      
       class SqlTool {
              
              //属性
              private $conn;
              private $host="localhost";
              private $user="root";
              private $password="root";
              private $db="test";
              function SqlTool(){
                     
                     $this->conn=mysql_connect($this->host,$this->user,$this->password);
                     if(!$this->conn){
                            die("连接数据库失败".mysql_error());
                     }
                     mysql_select_db($this->db,$this->conn);
                     mysql_query("set names utf8");
              }
              //方法..
              // 完成select dql
              public  function execute_dql($sql){
              
                     $res=mysql_query($sql,$this->conn) or die(mysql_error());
                     
                     return $res;
                     
              }
              //完成 update,delete ,insert dml
              public  function execute_dml($sql){
              
                     $b=mysql_query($sql,$this->conn);
                     //echo "添加的id=".mysql_insert_id($this->conn);
                     if(!$b){
                            return 0;//失败
                     }else{
                            if(mysql_affected_rows($this->conn)>0){
                                   return 1;//表示成功
                            }else{
                                   return 2;//表示没有行数影响.
                            }
                     }
              }
       }
?>