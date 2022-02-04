<?php

	
	require_once("../includes/config.php");
	
	//Starships Data
	$sql = "Exec get_starships_data @id = ?";
	$stmt = sqlsrv_query( $conn, $sql , array($_GET['character_id']));
	if( $stmt === false) {
		die( print_r( sqlsrv_errors(), true) );
	}
	$starships = array();
	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
		$starships[$row['startships_id']] = $row;  
	}
	
	//Species Data
	$sql1 = "Exec get_species_data @id = ?";
	$stmt1 = sqlsrv_query( $conn, $sql1 , array($_GET['character_id']));
	if( $stmt1 === false) {
		die( print_r( sqlsrv_errors(), true) );
	}
	$species = array();
	while( $row = sqlsrv_fetch_array( $stmt1, SQLSRV_FETCH_ASSOC) ) {
		$species[$row['species_id']] = $row;  
	}
	
	//Films Data
	$sql2 = "Exec get_films_data @id = ?";
	$stmt2 = sqlsrv_query( $conn, $sql2 , array($_GET['character_id']));
	if( $stmt2 === false) {
		die( print_r( sqlsrv_errors(), true) );
	}
	$films = array();
	while( $row = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC) ) {
		$films[$row['films_id']] = $row;  
	}
	
	//Vehicles Data
	$sql3 = "Exec get_vehicles_data @id = ?";
	$stmt3 = sqlsrv_query( $conn, $sql3 , array($_GET['character_id']));
	if( $stmt3 === false) {
		die( print_r( sqlsrv_errors(), true) );
	}
	$vehicles = array();
	while( $row = sqlsrv_fetch_array( $stmt3, SQLSRV_FETCH_ASSOC) ) {
		$vehicles[$row['vehicles_id']] = $row;  
	}
	

?>