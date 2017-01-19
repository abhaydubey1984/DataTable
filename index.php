<!DOCTYPE html>
<html>
<head>
		<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
		<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
		<script type="text/javascript">
			jQuery(document).ready(function(){
				var dtt=jQuery('#dt').dataTable({
					"bFilter": false,
					"bLengthChange": false,
					"bSort": true,
					"paging": true,
					"iDisplayLength": 10,
					"bProcessing": true,
					"bServerSide": true,
					"info": false,
					"serverSide": true,
					"buttons": ['copy', 'excel', 'pdf'],
					"ordering": true,
					"searching": true,
					"order": [[ 3, "desc" ]],
					"sAjaxSource": "Getdata_API.php",
					"oLanguage": {
						"sEmptyTable": "No Review founds in the system.",
						"sZeroRecords": "No Connected account to display",
						"sProcessing": "Loading..."
					},
					"fnPreDrawCallback": function (oSettings) {
						//logged_in_or_not();
						
					},
					"fnServerParams": function (aoData) {
						aoData.push({"name": "get_social_detail", "value": true});
					}		
				});
			});
		</script>
	
</head>
<body>
<div class="container">
			<table id="dt" class="tableMerchant">
				<thead>
					<tr>
						<th>Name</th>
						<th>City</th>
						<th>Age</th>
						<th>Salary</th>
					</tr>
				</thead>
			</table>
		</div>
</body>
</html>