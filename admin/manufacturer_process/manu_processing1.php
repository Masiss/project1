<?php 
$id=$_GET['id'];
$manu_name=addslashes($_POST['manu_name']);
include '../../extra/connect.php';
$sql="update manufacturer
set manufacturer_name='$manu_name'
where manufacturer_id='$id'";

mysqli_query($connect,$sql);
header("Location: /project1/admin/manufacturer_manage.php");