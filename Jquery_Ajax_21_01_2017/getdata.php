<?php
$conn=new mysqli("localhost","root","root","ado_test");
if(isset($_REQUEST['id']))
{
	$id=$_REQUEST['id'];
	$str="select * from employee where id=$id";
}
else
{
	$str="select * from employee";
}

$sql=$conn->query($str);
$arr=array();
while($data=$sql->fetch_array())
{
	$arr[]=$data;
}
echo json_encode($arr);
?>