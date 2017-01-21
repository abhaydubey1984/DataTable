<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery("#submit").click(function(){
			var name=jQuery("#name").val();
			var salary=jQuery("#salary").val();
			var age=jQuery("#age").val();
			var arr={"name":name,"salary":salary,"age":age};
			var data=JSON.stringify(arr); 
			jQuery.ajax({
				url:"insert_api.php",
				type:"POST",
				dataType:"json",
				data:data,
				success:function(){
				  	alert("success");
				}
			});

		});
	});
</script>
</head>
<body>
<a href="index.php">Display</a>
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
	<input type="text" name="Salary" id="salary">
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
	<input type="button" name="submit" id="submit" value="Insert">
	</td>
	</tr>
</table>
</body>
</html>