<?php
	$user_id = $_SESSION['user_id'];
	$sql = $conn->prepare("SELECT * FROM property_info WHERE user_id='$user_id' AND active_status_property='2'");
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

		<div class="panel-heading bg-info">
			<h3 style="text-align: center;"><b>Sold Property List</b></h3>
			<!-- <div class="container">
    		<div class="col-md-12">
        		<div class="text-right">
            		<a class="btn btn-warning" href="bought_property_report.php?">Report</a>
        		</div>
    		</div>
		</div> -->
		</div>
		
		<div class="panel-body">
			<div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead class="">
                        <tr class="info">
                        	<th>SL</th>
                        	<th>Property ID</th>
                            <th>Property Type</th>
                            <th>Area</th>                                          
                            <th>Property</th>
                            <th>Status</th>                                      
                        </tr>
                    </thead>
					
                    <tbody>					
						<?php
						$i=1;
						foreach($data as $value)
						{
						?>
							<form method="post">
                                <tr class="odd gradeX Active">
                                	<td> <h4> <?php echo  $i; ?> </h4></td>
                                	<td> <h4> <?php echo  $value['id']; ?> </h4></td>
                                    <td> <h4> <?php echo  $value['property_type']; ?> </h4></td>
                                    <td> <h4> <?php echo  $value['area']; ?> </h4></td>
                                    <td> <h4> <img src="<?php echo  $value['img_1']; ?>" height="80" width="80"></h4></td>

                                    <td> <h4> <?php if ($value['active_status_property']==1) {echo "Active";} elseif ($value['active_status_property']==0) {echo "Hidden";} elseif ($value['active_status_property']==2) {echo "Sold";}?> </h4></td>							
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