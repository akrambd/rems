<?php
	$user_id = $_SESSION['user_id'];
	$sql = $conn->prepare("SELECT * FROM property_info,property_type_list WHERE property_info.property_type=property_type_list.property_type_id AND user_id='$user_id' AND active_status_property='1'");// middle/last/first
	$sql->execute();
	$data = $sql->fetchAll();
		 
?>	

	<script type="text/javascript">
		function confirmation() 
		{
			return confirm('Are you sure you want to do this?');
		}
	</script>
		
		
	<?php if(isset($sms)){echo $sms;}?>
		
		<!-- Start Design of Manage Admin Pannel -->
		
	<div class="panel panel-default">
		<div class="panel-heading bg-info"><p style="font-size:20px;color:#000;">My property List</p></div>
		<div class="panel-body">
			<div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr class="info">
                        	<th>SL</th>
                        	<th>Property ID</th>
                            <th>Property Type</th>
                            <th>Area</th>                                          
                            <th>Property</th>
                            <th>Agent Assign</th>
                            <th>Inspection time</th>
                            <th>Request</th>
                        </tr>
                    </thead>
					
                    <tbody>					
						<?php
						$i=1;
						foreach($data as $value)
						{
						?>
							<form method="post">
                                <tr class="odd gradeX">
                                	<td> <h4> <?php echo  $i; ?> </h4></td>
                                	<td> <h4> <?php echo  $value['id']; ?> </h4></td>
                                    <td> <h4> <?php echo  $value['property_type_name']; ?> </h4></td>
                                    <td> <h4> <?php echo  $value['area']; ?> </h4></td>
                                    <td> <h4> <img src="<?php echo  $value['img_1']; ?>" height="80" width="80"></h4></td>
                                    

									<td>
                                    <a class="btn btn-sm btn-info" href="index.php?page=agent_assign&property_id=<?php echo $value['id'] ?>">Manage</a>
									</td>



                                    <td>

                                    <a class="btn btn-sm btn-info" href="index.php?page=inspection_time&property_id=<?php echo $value['id'] ?>">Manage</a>
									</td>

									<td>

                                    <a class="btn btn-sm btn-info" href="index.php?page=individual_property_request&property_id=<?php echo $value['id'];?>">Manage</a>
									</td>							
                                </tr>
							</form>
						<?php
						$i++;
						}
						?>
						
                    </tbody>
                </table>
            </div>
		</div>
	</div>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>