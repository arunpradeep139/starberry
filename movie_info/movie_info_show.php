
<style>

<?php require_once("../assets/css/common.css"); ?>

</style>

<head>
	
	<?php require_once("../general_scripts.php"); ?>
		
</head>

<?php require_once("../movie_info/movie_info_post.php"); ?>

<div class="container main-section">


    <section class="call-in-section pt-max-xl-0">
        <div class="container-bg">
			<div class="card mt-3 shadow-lg">
				<div class="card-body">
					<div class="col-md-12 d-flex p-2 justify-content-center">	
						<h2>Starwars Films</h2>
					</div>
					
					
					<input type="hidden" id="hf_id" value="" />

					
					<div class="row mt-3">
						<div class="col-md-12" id="div_result">
							<div class="table-responsive" id="orderperiod_tablesection">
								<table width="100%" class="table table-striped table-bordered table-hover" id="result_films_tbl">
								<thead>
								  <tr>
									 <th>Title</th>
									 <th>Director</th>
									 <th>Producer</th>
								  </tr>
							   </thead>
							   <tbody>
								
								<?php foreach ($films as $val) { ?>
								
									<tr>
										<td><?php echo $val['title']; ?></td>
										<td><?php echo $val['director']; ?></td>	
										<td><?php echo $val['producer']; ?></td>
									</tr>
								<?php } ?>
								
							   </tbody>
								</table>
							</div>
						</div>
					</div>
					
				</div>
				
				<hr>
				
				<div class="card-body">
					<div class="col-md-12 d-flex p-2 justify-content-center">	
						<h2>Starwars Vehicles</h2>
					</div>
					
					
					<input type="hidden" id="hf_id" value="" />

					
					<div class="row mt-3">
						<div class="col-md-12" id="div_result">
							<div class="table-responsive" id="orderperiod_tablesection">
								<table width="100%" class="table table-striped table-bordered table-hover" id="result_vehicles_tbl">
								<thead>
								  <tr>
									 <th>Name</th>
									 <th>Model</th>
									 <th>Manufacturer</th>
									 <th>Speed</th>
									 <th>Vehicle Class</th>
								  </tr>
							   </thead>
							   <tbody>
								
								<?php foreach ($vehicles as $val) { ?>
								
									<tr>
										<td><?php echo $val['name']; ?></td>
										<td><?php echo $val['model']; ?></td>	
										<td><?php echo $val['manufacturer']; ?></td>
										<td><?php echo $val['max_atmosphering_speed']; ?></td>	
										<td><?php echo $val['vehicle_class']; ?></td>
									</tr>
								<?php } ?>
								
							   </tbody>
								</table>
							</div>
						</div>
					</div>
					
				</div>
				
				<hr>
				
				<div class="card-body">
					<div class="col-md-12 d-flex p-2 justify-content-center">	
						<h2>Starwars Species</h2>
					</div>
					
					
					<input type="hidden" id="hf_id" value="" />

					
					<div class="row mt-3">
						<div class="col-md-12" id="div_result">
							<div class="table-responsive" id="orderperiod_tablesection">
								<table width="100%" class="table table-striped table-bordered table-hover" id="result_species_tbl">
								<thead>
								  <tr>
									 <th>Name</th>
									 <th>Designation</th>
									 <th>Average Height</th>
								  </tr>
							   </thead>
							   <tbody>
								
								<?php foreach ($species as $val) { ?>
								
									<tr>
										<td><?php echo $val['name']; ?></td>
										<td><?php echo $val['designation']; ?></td>	
										<td><?php echo $val['average_height']; ?></td>
									</tr>
								<?php } ?>
								
							   </tbody>
								</table>
							</div>
						</div>
					</div>
					
				</div>
				
				<hr>
				
				<div class="card-body">
					<div class="col-md-12 d-flex p-2 justify-content-center">	
						<h2>Starwars Starships</h2>
					</div>
					
					
					<input type="hidden" id="hf_id" value="" />

					
					<div class="row mt-3">
						<div class="col-md-12" id="div_result">
							<div class="table-responsive" id="orderperiod_tablesection">
								<table width="100%" class="table table-striped table-bordered table-hover" id="result_starships_tbl">
								<thead>
								  <tr>
									 <th>Name</th>
									 <th>Model</th>
									 <th>Starship Class</th>
								  </tr>
							   </thead>
							   <tbody>
								
								<?php foreach ($starships as $val) { ?>
								
									<tr>
										<td><?php echo $val['name']; ?></td>
										<td><?php echo $val['model']; ?></td>	
										<td><?php echo $val['starship_class']; ?></td>
									</tr>
								<?php } ?>
								
							   </tbody>
								</table>
							</div>
						</div>
					</div>
					
				</div>
				
			</div>
        </div>
    </section>
</div>

<script type="text/javascript">

	$(document).ready( function () {
		
		$('#result_films_tbl').DataTable();
		$('#result_vehicles_tbl').DataTable();
		$('#result_species_tbl').DataTable();
		$('#result_starships_tbl').DataTable();
		
	});

</script>
