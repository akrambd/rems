<?php
	$agent_id = $_SESSION['agent_id'];
	$sql = $conn->prepare("SELECT * FROM property_type_list,property_info,agent_assign,user_info,property_request 
		WHERE property_info.property_type=property_type_list.property_type_id AND 
		agent_assign.property_id=property_info.id
		AND agent_assign.agent_id='$agent_id' 
		AND property_info.active_status_property='2'
		AND user_info.user_id=property_info.user_id
		AND property_request.property_id=property_info.id
		AND property_request.active_status_request='accept'
		");// 
	$sql->execute();
	$data = $sql->fetchAll();

	// $sender_id=$data['sender_id'];


	// $sql1 = $conn->prepare("SELECT * FROM property_request,user_info
	// 						WHERE property_request.sender_id=user_info.user_id
	// 						AND property_request.sender_id=$sender_id");// 
	// $sql1->execute();
	// $data1 = $sql1->fetchAll();
		 
?>	


		
		
	<?php if(isset($sms)){echo $sms;}?>
		
		<!-- Start Design of Manage Admin Pannel -->
		
	<div class="panel panel-default">
		<div class="panel-heading bg-info"><p style="font-size:20px;color:#000;">Sold Property List</p></div>
		<div class="panel-body">
			<div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                        	<th>SL</th>
                        	<th>Property ID</th>
                        	<th>Posted By</th>
                            <th>Property Type</th>
                            <th>Area</th>                                          
                            <th>Property</th>
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
                                	<td> <h4> <?php echo  $value['user_name']; ?> </h4></td>
                                    <td> <h4> <?php echo  $value['property_type_name']; ?> </h4></td>
                                    <td> <h4> <?php echo  $value['area']; ?> </h4></td>
                                    <td> <h4> <img src="../user/<?php echo  $value['img_1']; ?>" height="80" width="80"></h4></td>
                                    							
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