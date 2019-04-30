<?php
	$agent_id = $_SESSION['agent_id'];
	$sql = $conn->prepare("SELECT * FROM agent_assign,agent_info,property_info,property_type_list
							WHERE property_info.property_type=property_type_list.property_type_id
							AND agent_assign.agent_id='$agent_id'
							AND agent_assign.property_id=property_info.id
							AND agent_info.agent_id=agent_assign.agent_id");
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
                        <tr>
                        	<th>SL</th>
                        	<th>Property ID</th>
                            <th>Property Type</th>
                            <th>Area</th>                                          
                            <th>Property</th>
                            <th>Inspection time</th>
                            <th>Status</th>                                      
                            <th>Action</th>
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
                                    <td> <h4> <img src="../user/<?php echo  $value['img_1']; ?>" height="80" width="80"></h4></td>
                                    

                                    <td><h4><a href="index.php?page=inspection_time&property_id=<?php echo $value['id'] ?>">manage</a></h4></td>

                                    <td> <h4> <?php if ($value['active_status_property']==1) {echo "Active";} elseif ($value['active_status_property']==0) {echo "Hidden";} elseif ($value['active_status_property']==2) {echo "Sold";}?> </h4></td>

									<td class="center">
									
										
										<a  href="manage-request-update.php?id=<?php echo $value[0]; ?>&status=rejected">
											<button class="btn-danger">Delete</button>
										</a>
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