<?php

	function test(){
		echo'this is a shuaige';
	}
	//通过分类id的获取名称
	function getCateNameByCateId($id)
	{
		if($id==0){
			return'顶级分类';
		}
		$cate =\APP\Cate::find($id);
		if(empty($cate)){
			return'无';
		}else{
			return $cate->name;
		}
	}
?>