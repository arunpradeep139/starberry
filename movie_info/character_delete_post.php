<?php
	
	require_once("../includes/config.php");

	$sql = "Exec delete_charcater @id = ?";
	$result = sqlsrv_query($conn, $sql, array($_POST['id']));

	$row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC);
	
	echo json_encode($row);

?>
