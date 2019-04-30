
<?php
	$agent_id = $_SESSION['agent_id'];
	$sql = $conn->prepare("SELECT property_request.*,user_info.*,property_info.* FROM property_request 
						   LEFT JOIN user_info ON property_request.sender_id=user_info.user_id 
						   INNER JOIN property_info ON property_request.property_id=property_info.id  
						   WHERE property_request.receiver_id='$agent_id' AND property_request.active_status_request='pending' ORDER BY property_request.request_id DESC");

	$sql->execute();
	$data = $sql->fetchAll();
		 
		if(isset($_POST['approve']))
		 {

			   $id = $_POST['request_id'];
			   $modal_selling_price=$_POST['modal_selling_price'];
			   $modal_selling_price=$_POST['modal_selling_price'];		
			   $query = "UPDATE property_request,property_info SET property_request.active_status_request='accept',property_info.selling_price=$modal_selling_price,property_info.active_status_property='2' where property_request.property_id=property_info.id  AND request_id='$id'";
			   $stmt = $conn->prepare($query);
			   $end = $stmt->execute();			  
	}

		$sql = $conn->prepare("SELECT property_request.*,user_info.*,property_info.* FROM property_request 
						   		LEFT JOIN user_info ON property_request.sender_id=user_info.user_id 
						   		INNER JOIN property_info ON property_request.property_id=property_info.id  
						   WHERE property_request.receiver_id='$agent_id' AND property_request.active_status_request='pending' ORDER BY property_request.request_id DESC");
		 
?>	

	<script type="text/javascript">
		function confirmation() 
		{
			return confirm('Are you sure you want to do this?');
		}
	</script>
		
		
	<?php if(isset($sms)){echo $sms;} ?>
		
		<!-- Start Design of Manage Admin Pannel -->
		
	<div class="panel panel-default">
		<div class="panel-heading bg-info"><p style="font-size:20px;color:#000;">Manage Request</p></div>
		<div class="panel-body">
			<div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                        	<th>SL</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Property ID</th>
                            <th>Property</th>
                            <th>Price</th>                                        
                            <th>Subject</th>                                          
                            <th>Message</th>                                    
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
                                    <td> <h4> <?php echo  $value['user_name']; ?> </h4></td>
                                    <td> <h4> <?php echo  $value['user_mobile']; ?> </h4></td>
                                    <td> <h4> <?php echo  $value['property_id']; ?> </h4></td>
                                    <td> <h4> <img src="<?php echo  $value['img_1']; ?>" style="height: 80px;width: 80px"></h4></td>
                                    <td> <h4> <?php echo  $value['price']; ?></h4></td>
                                    <td> <h4> <?php echo  $value['subject']; ?></h4></td>
                                    <td> <h4> <?php echo  $value['message']; ?></h4></td>

									<td class="center">
									
										<a class="btn btn-xs btn-success" href="" data-toggle="modal" data-target="#myModal">
											<span class="glyphicon glyphicon-ok"></span>
										</a>
										<!-- <button class="btn btn-success" type="submit" name="approve" ">
													<span class="glyphicon glyphicon-ok"></span>
												</button>	

                                                <input type="hidden" name="request_id" value="<?php echo $value['request_id']; ?>"> -->
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
		<!-- End Design of Manage Admin 
	<!-- modal part -->
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <!-- Trigger the modal with a button -->
<!--   <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Small Modal</button> -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
        	<form method="post">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Input Selling Price</h4>
        </div>
        <div class="modal-body">
          <input type="text" name="modal_selling_price">
        </div>
        <div class="modal-footer">
          <button class="btn btn-success" type="submit" name="approve">OK</button>
         <input type="hidden" name="request_id" value="<?php echo $value['request_id']; ?>">
         </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- modal end -->