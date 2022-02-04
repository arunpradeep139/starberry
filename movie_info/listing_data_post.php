<?php

	
	require_once("../includes/config.php");
	
	require_once("../movie_info/curl_call.php");
	
	
	$sql = "Exec get_data";
	$stmt = sqlsrv_query( $conn, $sql );
	if( $stmt === false) {
		die( print_r( sqlsrv_errors(), true) );
	}
	$data = array();
	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
		$data[$row['character_id']] = $row;  
	}
	

?>