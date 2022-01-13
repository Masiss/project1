<?php 
session_start();
if(!isset($_SESSION['id'])){
	header("Location: ./index.php");
	exit;
} else if($_SESSION['level']==0){
	header("Location: ../staff/index.php");
	exit;
}?>