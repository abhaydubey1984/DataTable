<?php
$conn=new mysqli("localhost","root","root","ado_test");
$data = json_decode(file_get_contents("php://input"));
$name=$data->name;
$salary=$data->salary;
$age=$data->age;
$str="insert into employee(employee_name,employee_salary,employee_age) values('$name',$salary,$age)";
$conn->query($str);
?>