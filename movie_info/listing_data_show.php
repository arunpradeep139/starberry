
<style>

	<?php require_once("../assets/css/common.css"); ?>
	<?php require_once("../assets/css/responsive.css"); ?>
	
</style>

<head>
	
	<?php require_once("../general_scripts.php"); ?>
		
</head>

<?php require_once("../movie_info/listing_data_post.php"); ?>

<div class="container main-section">


    <section class="call-in-section pt-max-xl-0">
        <div class="container-bg">
			<div class="card mt-3 shadow-lg">
				<div class="card-body">
					<div class="col-md-12 d-flex p-2 justify-content-center">	
						<img src="../assets/images/img.png" alt="Starwars Characters" class="responsive">
					</div>
					
					<button type="button" title="Add Record" class="btn btn-info" style="color:white;" onclick="Add_record()">Add Record</button>
					
					<input type="hidden" id="hf_id" value="" />

					
					<div class="row mt-3">
						<div class="col-md-12" id="div_result">
							<div class="table-responsive" id="orderperiod_tablesection">
								<table id="result_tbl">
								<thead>
								  <tr>
									 <th scope="col" style="width:15%;">Name</th>
									 <th scope="col" style="width:10%;">Height</th>
									 <th scope="col" style="width:10%;">Mass</th>
									 <th scope="col" style="width:13%;">Hair Color</th>
									 <th scope="col" style="width:13%;">Skin Color</th>
									 <th scope="col" style="width:10%;">Eye Color</th>
									 <th scope="col" style="width:13%;">Birth Year</th>
									 <th scope="col" style="width:10%;">Gender</th>
									 <th scope="col" style="width:15%;">Action</th>
								  </tr>
							   </thead>
							   <tbody>
								<!--<pre>
									 <?php 
									 print_r($data);
									 ?>
								</pre>-->
								<?php
								
								 foreach ($data as $val) { ?>
								
									<tr>
										<td data-label="Name"><?php echo $val['name']; ?></td>
										<td data-label="Height"><?php echo $val['height']; ?></td>	
										<td data-label="Mass"><?php echo $val['mass']; ?></td>
										<td data-label="Hair Color"><?php echo $val['hair_color']; ?></td>
										<td data-label="Skin Color"><?php echo $val['skin_color']; ?></td>
										<td data-label="Eye Color"><?php echo $val['eye_color']; ?></td>
										<td data-label="Birth Year"><?php echo $val['birth_year']; ?></td>
										<td data-label="Gender"><?php echo $val['gender']; ?></td>
										<td data-label="Action">
											<button type="button" title="Info" id="update" onclick="show_details('<?php echo $val['character_id']; ?>')" class="btn btn-primary" style="color:white!important;"><i class="fa fa-info"></i></button>
											<button type="button" title="Update" id="update" onclick="Update_record('<?php echo $val['character_id']; ?>')" class="btn btn-warning" style="color:white!important;"><i class="fas fa-edit"></i></button>
											<button type="button" title="Delete" id="delete" onclick="Delete_model_show('<?php echo $val['character_id']; ?>')" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>                    
										</td>
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
		
		<!-- Modal Save-->
		<div class="modal fade" id="Modal_Add" role="dialog" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog">

			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="modal-header">
				  
				  <h4 class="modal-title">Update Record</h4>
				</div>
				<div class="modal-body">
					<span id="details_add_err" style="color:red;font-weight:bold;">*Please enter all the details</span>
					<table>
						
						<tr>
							<td style="text-align:left;">
								<label>Name</label>
							</td>
							<td>
								<input type="text" class="form-control input-normal"  id="txt_name" name="txt_name" placeholder="Name">
							</td>
						</tr>
						<tr>
							<td style="text-align:left;">
								<label>Height</label>
							</td>
							<td>
								<input type="number" class="form-control"  id="txt_height" name="txt_height" placeholder="Height">
							</td>
						</tr>
						<tr>
							<td style="text-align:left;">
								<label>Mass</label>
							</td>
							<td>
								<input type="number" class="form-control"  id="txt_mass" name="txt_mass" placeholder="Mass / Weight">
							</td>
						</tr>
						<tr>
							<td style="text-align:left;">
								<label>Hair Color</label>
							</td>
							<td>
								<input type="text" class="form-control"  id="txt_hair_color" name="txt_hair_color" placeholder="Hair Color Name">
							</td>
						</tr>
						<tr>
							<td style="text-align:left;">
								<label>Skin Color</label>
							</td>
							<td>
								<input type="text" class="form-control"  id="txt_skin_color" name="txt_skin_color" placeholder="Skin Color">
							</td>
						</tr>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" onclick="SaveRecord()">Save</button>
					<button type="button" class="btn btn-secondary" onclick="modal_close()">Close</button>
				</div>
			  </div>
			  
			</div>
		</div>
		
		<!-- Modal Delete Alert -->
		<div class="modal fade" id="ModalDeleteAlert" role="dialog">
			<div class="modal-dialog">

			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="modal-header">
				  
				  <h4 class="modal-title">Delete Record</h4>
				</div>
				<div class="modal-body">
					<label>Are you sure do yo want to delete this record?</label>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" onclick="DeleteRecord()">Yes</button>
					<button type="button" class="btn btn-secondary" onclick="modal_close()">No</button>
				</div>
			  </div>
			  
			</div>
		</div>
		
		<!-- Modal Notification Alert -->
		<div class="modal fade" id="ModalNotificationAlert" role="dialog">
			<div class="modal-dialog">

			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="modal-header">
				  
				  <h4 class="modal-title">Notification</h4>
				</div>
				<div class="modal-body">
					<label style="color: #198754;font-weight: 600;font-size: x-large;" id="lbl_status"></label>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" onclick="modal_load()">Ok</button>
				</div>
			  </div>
			  
			</div>
		</div>
		
    </section>
</div>


<script type="text/javascript">

	function myFunction() {
	  var x = document.getElementById("myTopnav");
	  if (x.className === "topnav") {
		x.className += " responsive";
	  } else {
		x.className = "topnav";
	  }
	}

/*
	$('#Modal_Add').on('hide.bs.modal', function (e) {
		e.preventDefault();
		e.stopPropagation();
		return false;
	});
	*/

	$(document).ready( function () {
		
		var table = $('#result_tbl').DataTable( {
			rowReorder: {
				selector: 'td:nth-child(2)'
			},
			responsive: true
		} );
		
		$("#details_add_err").addClass('dis-none');
	});
	
	
 
 
	function Add_record(){
		$("#details_add_err").addClass('dis-none');
		
		$("#txt_name").val('');
		$("#txt_height").val('');
		$("#txt_mass").val('');
		$("#txt_hair_color").val('');
		$("#txt_skin_color").val('');
		$("#hf_id").val('');
		
		$('#Modal_Add').modal('show'); 
	}

	function Update_record(id){
		
		var data = <?php echo JSON_encode($data)?>;
		
		$("#hf_id").val(id);
		
		$("#txt_name").val(data[id]['name']);
		$("#txt_height").val(data[id]['height']);
		$("#txt_mass").val(data[id]['mass']);
		$("#txt_hair_color").val(data[id]['hair_color']);
		$("#txt_skin_color").val(data[id]['skin_color']);
		
		$('#Modal_Add').modal('show'); 
		
		
	}
	
	function SaveRecord(){
		
		if($("#txt_name").val() == "" || $("#txt_height").val() == "" || $("#txt_mass").val() == "" || $("#txt_hair_color").val() == "" || $("#txt_skin_color").val() == "")
		{
			
			$("#details_add_err").addClass('dis-block');
			$("#details_add_err").removeClass('dis-none');
			
			return false;
		}
		
		$("#details_add_err").addClass('dis-none');
		$("#details_add_err").removeClass('dis-block');
			
		
		jQuery.ajax({
			url: "character_edit_save_post.php",
			data: {
					id: $("#hf_id").val(),
					name: $("#txt_name").val(),
					height: $("#txt_height").val(),
					mass: $("#txt_mass").val(),
					hair_color: $("#txt_hair_color").val(),
					skin_color: $("#txt_skin_color").val()
				},
			type: "POST",
			success:function(data){
				var res = $.parseJSON(data);
				
				if(res['status_code'] == '1'){
					
					//$("#Modal_Add").addClass('dis-none');
					//$("#Modal_Add").removeClass('dis-block');
		
					$('#Modal_Add').modal('hide'); 
					
					$("#txt_name").val('');
					$("#txt_height").val('');
					$("#txt_mass").val('');
					$("#txt_hair_color").val('');
					$("#txt_skin_color").val('');
					$("#hf_id").val('');
					
					$('#ModalNotificationAlert').modal('show'); 
					$("#lbl_status").html(res['status_msg'])
				}
			},
			error:function ()
			{
				event.preventDefault();
				alert('error');
			}
		});
	}
	
	function Delete_model_show(id){
		$("#hf_id").val(id);
		
		$('#ModalDeleteAlert').modal('show'); 
	}

	function DeleteRecord(){
		
		jQuery.ajax({
			url: "character_delete_post.php",
			data: {
					id: $("#hf_id").val()
				},
			type: "POST",
			success:function(data){
				
				var res = $.parseJSON(data);
				
				if(res['status_code'] == '1'){
					$("#hf_id").val('');
					
					$('#ModalNotificationAlert').modal('show'); 
					$("#lbl_status").html(res['status_msg'])
				}
			},
			error:function ()
			{
				event.preventDefault();
				alert('error');
			}
		});
		
	}
	
	function show_details(id){
		
		window.open('http://localhost/starwars/movie_info/movie_info_show.php?character_id='+id, '_blank');
	}
	
	function modal_load(){
		window.location.href='http://localhost/starwars/movie_info/listing_data_show.php';      
	}
	
	function modal_close(){
		$('#Modal_Add').modal('hide'); 
		$('#ModalDeleteAlert').modal('hide'); 
		
/*
		$("#Modal_Add").addClass('dis-none');
		$("#Modal_Add").removeClass('dis-block');
		$('.modal-backdrop').remove();*/
	}

</script>

