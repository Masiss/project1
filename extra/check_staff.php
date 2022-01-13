<?php 
session_start();
if(empty($_SESSION['id'])){
	header("Location: ./index.php");
	exit;
} else if($_SESSION['level']==1){
	header("Location: ../admin/index.php");
	exit;
}?>