<?php
include 'config.php';
if(isset($_REQUEST['get_social_detail']))
{
	$columns=array(
	0=>'id',
    1=>'name',
    2=>'city',
    3=>'age',
    4=>'salary');
	$sql="select * from employee where 1=1";
	
	$Json['aaData'] = array();
	if( !empty($_REQUEST['sSearch'])){// if there is a search parameter, $requestData['search']['value'] contains search parameter
    $sql.=" AND ( name LIKE '".$_REQUEST['sSearch']."%' ";    
    $sql.=" OR salary LIKE '".$_REQUEST['sSearch']."%' ";
    $sql.="OR city LIKE '".$_REQUEST['sSearch']."%' ";
    $sql.=" OR age LIKE '".$_REQUEST['sSearch']."%' )";
    }
    if(isset( $_REQUEST['iSortCol_0'] )  && isset($_REQUEST['sSortDir_0']))	
	{
		    $sql .= " Order by ".$columns[$_REQUEST['iSortCol_0']] ." ". $_REQUEST['sSortDir_0'];
	}	
    if ( isset( $_REQUEST['iDisplayStart'] ) && $_REQUEST['iDisplayLength'] != '-1' )
    {
            $sql.= " LIMIT ".$_REQUEST['iDisplayStart'].", ".$_REQUEST['iDisplayLength'];
    }
	$query=mysqli_query($conn,$sql);
	$k =0;
    while($Row = mysqli_fetch_array($query))
    {
		$Json['aaData'][$k][]= $Row['id'];
		$Json['aaData'][$k][]= $Row['name'];
		$Json['aaData'][$k][]= $Row['city'];
		$Json['aaData'][$k][]= $Row['age'];
		$Json['aaData'][$k][]= $Row['salary'];
		$k++;
       
	}
	$Json['iTotalDisplayRecords'] = 46;
	$Json['sEcho'] = $_REQUEST['sEcho'];
	echo json_encode($Json);
	exit;	
}
?>