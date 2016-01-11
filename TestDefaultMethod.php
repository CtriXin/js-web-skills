<?php 
/**
* 
*/
class TestDefaultMethod
{
	

public function test()
{
	return  1;
}

}


echo (new TestDefaultMethod())->test();
//默认不写未public

 ?>