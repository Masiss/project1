<?php 
if(isset($_GET['page'])){
	$page=$_GET['page'];
}else $page=1;

$search='';
if(isset($_GET['search'])){
	$search=$_GET['search'];
}
$items=5;
