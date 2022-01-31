<?php 
include './connect.php';
$gpfd=mysqli_query($connect,"select product_image from product");
$dir=scandir('../admin/pic_product');
$count=0;
$arr=[];

foreach ($gpfd as $image) {
	for($i=2;$i<count($dir);$i++){
		if ($dir[$i]==$image["product_image"]){
			
			$count++;
			break;
		} else {
			
			
		}
	}
}
var_dump($arr);
var_dump($count);


