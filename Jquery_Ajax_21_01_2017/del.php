<?php
$conn=new mysqli("localhost","root","root","ado_test");
$id=$_REQUEST['id'];
//echo $id;
$str="delete from employee where id=$id";
//echo $str;
$conn->query($str);
header('location:index.php')
?>