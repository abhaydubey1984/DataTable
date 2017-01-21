<?php
$conn=new mysqli("localhost","root","root","DataTable");
$data = json_decode(file_get_contents("php://input"));
$name=$data->name;
$city=$data->city;
$age=$data->age;
$salary=$data->salary;
$str="insert into employee(name,city,age,salary) values('$name','$city',$age,$salary)";
$sql=$conn->query($str);
?>