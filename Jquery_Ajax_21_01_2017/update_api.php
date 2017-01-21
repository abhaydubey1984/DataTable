<?php
$conn=new mysqli("localhost","root","root","ado_test");
$data = json_decode(file_get_contents("php://input"));
$id=$data->id;
$name=$data->name;
$salary=$data->salary;
$age=$data->age;
$str="update employee set employee_name='$name',employee_salary=$salary,employee_age=$age where id=$id";
$conn->query($str);
//header('location:index.php');
?>