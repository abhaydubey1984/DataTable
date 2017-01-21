<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			var table="";
			table=table+"<table><th>Employee Name</th><th>Employee Salary</th><th>Employee Age</th>";
			jQuery.ajax({
				url:"getdata.php",
				type:"GET",
				success:function(result){
					var data=JSON.parse(result);
					for(var i=0;i<data.length;i++)
					{
							table=table+"<tr>";
							table=table+"<td>"+data[i].employee_name+"</td>";
							table=table+"<td>"+data[i].employee_salary+"</td>";
							table=table+"<td>"+data[i].employee_age+"</td>";
							table=table+"<td><a href='update.php?id="+data[i].id+"'>Update</a></td>";
							table=table+"<td><a href='del.php?id="+data[i].id+"'>Delete</a></td>";
							//table=table+"<td>"+data[i].employee_age+"</td>";
							table=table+"</tr>";
					}
					table=table+"</table>";
					jQuery("#dis").html(table);
				}
			});
		});
	</script>
</head>
<body>
<a href="insert.php">Insert</a>
<div id="dis">
</div>
</body>
</html>