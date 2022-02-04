<?php
	require_once("../includes/config.php");
	
		$ch = curl_init();
		
		$url = "https://swapi.dev/api/people/";
		
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		$resp = curl_exec($ch);
		
		if($e = curl_error($ch)){
			echo $e;
		}
		else{
			$decode = json_decode($resp, true);
			
			
			
			if(count($decode['results']) > 0)
			{
				$result_count = count($decode['results']);
				
				
				foreach($decode['results'] as $data)
				{
					
					$sql = "Exec characters_save @name = ?,@height = ?, @mass = ?, @hair_color = ?, @skin_color = ?, @eye_color = ?, @birth_year = ?, @gender = ?, @url = ?";
					$result = sqlsrv_query($conn, $sql, array($data['name'], $data['height'], $data['mass'], $data['hair_color'], $data['skin_color'], $data['eye_color'], $data['birth_year'], $data['gender'], $data['url']));
	

					$row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC);
					
					if($row['status_code'] == 1)
					{
						for($i=0;$i<count($data['films']);$i++){
							
							$ch1 = curl_init();
		
							$url = $data['films'][$i];
							
							curl_setopt($ch1, CURLOPT_URL, $url);
							curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
							
							$resp = curl_exec($ch1);
							
							if($e = curl_error($ch1)){
								echo $e;
							}
							else{
								$films = json_decode($resp, true);
							}
							
							$sql1 = "Exec films_save @title = ?,@episode_id = ?, @director = ?, @producer = ?, @character_id = ?";
							$result1 = sqlsrv_query($conn, $sql1, array($films['title'], $films['episode_id'], $films['director'], $films['producer'], $row['id']));
			

							$row1 = sqlsrv_fetch_array( $result1, SQLSRV_FETCH_ASSOC);
							
							curl_close($ch1);
						}
						
						for($i=0;$i<count($data['species']);$i++){
							
							$ch2 = curl_init();
		
							$url = $data['species'][$i];
							
							curl_setopt($ch2, CURLOPT_URL, $url);
							curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
							
							$resp = curl_exec($ch2);
							
							if($e = curl_error($ch2)){
								echo $e;
							}
							else{
								$species = json_decode($resp, true);
							}
							
							$sql2 = "Exec species_save @name = ?,@designation = ?, @average_height = ?, @language = ?, @character_id = ?";
							$result2 = sqlsrv_query($conn, $sql2, array($species['name'], $species['designation'], $species['average_height'], $species['language'], $row['id']));
			

							$row2 = sqlsrv_fetch_array( $result2, SQLSRV_FETCH_ASSOC);
							
							curl_close($ch2);
						}
						
						for($i=0;$i<count($data['vehicles']);$i++){
							
							$ch3 = curl_init();
		
							$url = $data['vehicles'][$i];
							
							curl_setopt($ch3, CURLOPT_URL, $url);
							curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);
							
							$resp = curl_exec($ch3);
							
							if($e = curl_error($ch3)){
								echo $e;
							}
							else{
								$vehicles = json_decode($resp, true);
							}
							
							$sql3 = "Exec vehicles_save @name = ?,@model = ?, @manufacturer = ?, @max_atmosphering_speed = ?, @vehicle_class = ?, @character_id = ?";
							$result3 = sqlsrv_query($conn, $sql3, array($vehicles['name'], $vehicles['model'], $vehicles['manufacturer'], $vehicles['max_atmosphering_speed'], $vehicles['vehicle_class'],$row['id']));
			

							$row3 = sqlsrv_fetch_array( $result3, SQLSRV_FETCH_ASSOC);
							
							curl_close($ch3);
						}
						
						for($i=0;$i<count($data['starships']);$i++){
							
							$ch4 = curl_init();
		
							$url = $data['starships'][$i];
							
							curl_setopt($ch4, CURLOPT_URL, $url);
							curl_setopt($ch4, CURLOPT_RETURNTRANSFER, true);
							
							$resp = curl_exec($ch4);
							
							if($e = curl_error($ch4)){
								echo $e;
							}
							else{
								$starships = json_decode($resp, true);
							}
							
							$sql4 = "Exec starships_save @name = ?,@model = ?, @starship_class = ?, @character_id = ?";
							$result4 = sqlsrv_query($conn, $sql4, array($starships['name'], $starships['model'], $starships['starship_class'], $row['id']));
			

							$row4 = sqlsrv_fetch_array( $result4, SQLSRV_FETCH_ASSOC);
							
							curl_close($ch4);
						}
					}	
					//print_r($row['id']);die();
				}
			}
			
		}
		 
		curl_close($ch);
		
?>