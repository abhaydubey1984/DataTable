<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function(data){
			var id=jQuery("#id").val();
			jQuery.ajax({
				url:"getdata.php?id="+id,
				type:"GET",
				success:function(result){
					var data=JSON.parse(result);
					jQuery("#name").val(data[0].employee_name);
					jQuery("#salary").val(data[0].employee_salary);
					jQuery("#age").val(data[0].employee_age);
				}
			});
			jQuery("#update").click(function(){
				var name=jQuery("#name").val();
				var salary=jQuery("#salary").val();
				var age=jQuery("#age").val();
				var arr={"id":id,"name":name,"salary":salary,"age":age};
				var data=JSON.stringify(arr);
				jQuery.ajax({
				url:"update_api.php",
				type:"POST",	
				data:data,
				success:function(){
				  	//alert("hello");
				  	window.location.href = "index.php";
				}
			});
			});
		});
	</script>
</head>
<body>
<?php
$id=$_REQUEST["id"];

?>
<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
<table>
<tr>
	<td>
		Employee Name
	</td>
	<td>
	<input type="text" name="name" id="name">
	</td>
</tr>
<tr>
	<td>
	Employee Salary
	</td>
	<td>
	<input type="text" name="salary" id="salary">
	</td>
</tr>
<tr>
	<td>
	Employee Age
	</td>
	<td>
	<input type="text" name="age" id="age">
	</td>
</tr>
<tr>
<td>
<input type="button" name="update" value="Update" id="update">
</td>
</tr>
</table>
</body>
</html>