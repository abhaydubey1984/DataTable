<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="jQuery/j1.js"></script>
	<script type="text/javascript" language="javascript" src="jQuery/j2.js"></script>
	<script type="text/javascript" language="javascript" src="jQuery/j3.js"></script>
	<script type="text/javascript" language="javascript" src="jQuery/j4.js"></script>
	<script type="text/javascript" language="javascript" src="jQuery/j5.js"></script>
	<script type="text/javascript" language="javascript" src="jQuery/j6.js"></script>
	<script type="text/javascript" language="javascript" src="jQuery/j7.js"></script>
	<script type="text/javascript" language="javascript" src="jQuery/j8.js"></script>

	<link rel="stylesheet" type="text/css" href="css/css1.css">
	<link rel="stylesheet" type="text/css" href="css/css2.css">
	<link rel="stylesheet" type="text/css" href="css/css3.css">
	<link rel="stylesheet" type="text/css" href="css/css4.css">
	<link rel="stylesheet" type="text/css" href="css/css5.css">

	<script type="text/javascript">
		jQuery(document).ready(function(){
			var selected = [];
			var dt=jQuery("#example").DataTable({
					'fields': [ {
	                label: 'Id',
	                name: 'Id',
	                }, {
	                label: 'Name:',
	                name:  'name'
	            	}, {
	                label: 'City:',
	                name:  'city'
	            	}, {
	                label: 'Age',
	                name:  'age'
	            	},{
	            	label: 'Salary',
	                name:  'salary'	
	            	}
	       			],
				"bSort": true,
				"paging": true,
				"iDisplayLength": 10,
				"bProcessing": true,
				"bServerSide": true,
				"serverSide": true,
				"searching": true,
				"ordering": true,
				"rowReorder":{"update":true},
				"pagingType": "full_numbers",
				"sAjaxSource": "getdata.php",
				"rowCallback": function( row, data ) {
            	if( jQuery.inArray(data.DT_RowId, selected) !== -1 )
            	{
            		alert(data);
                	jQuery(row).addClass('selected');

            	}
        		},
				"fnPreDrawCallback": function (oSettings) {
						//logged_in_or_not();
					},
				"fnServerParams": function (aoData) {
						aoData.push({"name": "get_social_detail", "value": true});
					}	
			});
			jQuery('#example tbody').on('click','tr',function(){
				if(jQuery(this).hasClass('selected'))
				{
					jQuery(this).removeClass('selected');
				}
				else
				{
					dt.$('tr.selected').removeClass('selected');
					jQuery(this).addClass('selected');
				}

			});
			jQuery('#insert').click(function(){
				var name=jQuery("#name").val();
				var city=jQuery("#city").val();
				var age=jQuery("#age").val();
				var salary=jQuery("#salary").val();
				var arr={"name":name,"city":city,"age":age,"salary":salary};
				var data=JSON.stringify(arr); 
				jQuery.ajax({
	           url: "insertdata.php",
	           type: 'POST',
	           dataType: 'json',
	           data: data,
	           success:function(resp){
	         	jQuery("#name").val()="";
	         	
	        	 }
				});
			});
		});
	</script>
</head>
<body>
<input type="button" value="Delete" id="btndel">
<table id="example" class="display">
	<thead>
	<th>id</th>
	<th>Name</th>
	<th>City</th>
	<th>Age</th>
	<th>Salary</th>
	</thead>
</table>
<div class="container">


  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Insert</button>
  <div class="modal fade" id="myModal" role="dialog" >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Insert </h4>
        </div>
        <div class="modal-body">
          <table>
          <tr>
          <td>
          <input type="text" name="name" id="name" placeholder="Enter Name">
          </td>
          </tr>
          <tr>
          <td>
          <input type="text" name="city" id="city" placeholder="Enter City">
          </td>
          </tr>
          <tr>
          <td>
          <input type="text" name="age" id="age" placeholder="Enter Age">
          </td>
          </tr>
          <tr>
          <td>
          <input type="text" name="salary" id="salary" placeholder="Enter Salary">
          </td>
          </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="insert">Insert</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>