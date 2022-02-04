<?php
	
	require_once("../includes/config.php");
	
	
	if($_POST['id'] == '')
			$id = -1;
	else
		$id = $_POST['id'];
		
	$sql = "Exec save_character @id = ? ,@name = ?, @height = ?, @mass = ?, @hair_color = ?, @skin_color = ?";
	$result = sqlsrv_query($conn, $sql, array($id, $_POST['name'], $_POST['height'], $_POST['mass'], $_POST['hair_color'], $_POST['skin_color']));

	//$row['data'] = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC);
	$row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC);
	
	echo json_encode($row);

?>
