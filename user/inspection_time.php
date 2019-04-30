<?php
	$property_id = $_GET['property_id'];
	$sql = $conn->prepare("SELECT * FROM `inspection_time_info` WHERE property_id='$property_id'");
	$sql->execute();
	$value=$sql->fetch(PDO::FETCH_ASSOC);
	// $data = $sql->fetchAll();


	if (isset($_POST['add_inspection'])) {

 			$property_id1 = $_POST['property_id1'];

 			if (!empty($id)) {
        	$data1 = array($property_id);
 			$inspection_query="INSERT INTO inspection_time_info (property_id) values(?)";
 			$stmt1 = $conn->prepare($inspection_query);
			$end1 = $stmt1->execute($data1);
		}

		}

	elseif(isset($_POST['date_fix']))
		 {

			   $property_id = $_POST['property_id'];
			   $inspection_date=$_POST['inspection_date'];
			   $inspection_time=$_POST['inspection_time'];		
			   $query = "UPDATE `inspection_time_info` SET inspection_date='$inspection_date',inspection_time='$inspection_time' WHERE property_id='$property_id'";
			   $stmt = $conn->prepare($query);
			   $end = $stmt->execute();

			   if($end)
					{
					
					// $user_id = $_SESSION['user_id'];
					$property_id=$_GET['property_id'];

					$request_query = $conn->prepare("SELECT inspection_time_info.*,property_request.*,property_info.*,user_info.* FROM inspection_time_info,property_request,property_info,user_info WHERE inspection_time_info.property_id=property_request.property_id AND property_request.property_id=property_info.id AND property_request.sender_id=user_info.user_id AND inspection_time_info.property_id=$property_id");
					$request_query->execute();
					while ( $data_request_query = $request_query->fetch(PDO::FETCH_ASSOC)) {
					 
						$user_name= $data_request_query['user_name'];
                    $user_email=$data_request_query['user_email'];					
                    $inspection_date= date('d F Y', strtotime($data_request_query['inspection_date']));					
                    $inspection_time= date('g:i a', strtotime($data_request_query['inspection_time']));		
						
					$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
					try {
						//Server settings
						//$mail->SMTPDebug = 2;                                 // Enable verbose debug output
						$mail->isSMTP();                                      // Set mailer to use SMTP
						$mail->Host = 'ssl://smtp.gmail.com';                       // Specify main and backup SMTP servers
						$mail->SMTPAuth = true;                               // Enable SMTP authentication
						$mail->Username = 'realestatemyproject@gmail.com';                 // SMTP username
						$mail->Password = '!@#$akram';                           // SMTP password
						$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
						$mail->Port = 465;                                    // TCP port to connect to
						$mail->SMTPOptions = array(
							'ssl' => array(
								'verify_peer' => false,
								'verify_peer_name' => false,
								'allow_self_signed' => true
							)
						);

						//Recipients
						$mail->setFrom('realestatemyproject@gmail.com', 'RealEstate');
						$mail->addAddress($user_email, $user_name);     // Add a recipient					
						$mail->addReplyTo('info@example.com', 'Information');
						$mail->addCC('cc@example.com');
						$mail->addBCC('bcc@example.com');

						//Attachments
						//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
						//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

						//Content
						$mail->isHTML(true);                                  // Set email format to HTML
						$mail->Subject = 'Inspection Time';
						$mail->Body    = ''.$user_name.', your requested '.$property_id.' no Properties  Inspection Schedule : '.$inspection_date.' at '.$inspection_time.'<br/>Please come on that time  ' ;
						$mail->AltBody = 'Activation';

						$mail->send();
						//echo 'Message has been sent';
						} catch (Exception $e) {
							echo 'Message could not be sent.';
							echo 'Mailer Error: ' . $mail->ErrorInfo;
						}
					}

				} 
                    


	}

	 elseif(isset($_POST['delete']))
		 {
					
			   $property_id = $_POST['property_id'];
			   $query = "UPDATE inspection_time_info SET `inspection_date`= NULL, `inspection_time`=NULL WHERE property_id='$property_id'";
			   $stmt = $conn->prepare($query);
			   $end = $stmt->execute();
			   if($end)
					{
					
					// $user_id = $_SESSION['user_id'];
					$property_id=$_GET['property_id'];

					$request_query = $conn->prepare("SELECT inspection_time_info.*,property_request.*,property_info.*,user_info.* FROM inspection_time_info,property_request,property_info,user_info WHERE inspection_time_info.property_id=property_request.property_id AND property_request.property_id=property_info.id AND property_request.sender_id=user_info.user_id AND inspection_time_info.property_id=$property_id");
					$request_query->execute();
					while ( $data_request_query = $request_query->fetch(PDO::FETCH_ASSOC)) {
					 
						$user_name= $data_request_query['user_name'];
                    $user_email=$data_request_query['user_email'];					
                    $inspection_date= date('d F Y', strtotime($data_request_query['inspection_date']));					
                    $inspection_time= date('g:i a', strtotime($data_request_query['inspection_time']));		
						
					$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
					try {
						//Server settings
						//$mail->SMTPDebug = 2;                                 // Enable verbose debug output
						$mail->isSMTP();                                      // Set mailer to use SMTP
						$mail->Host = 'ssl://smtp.gmail.com';                       // Specify main and backup SMTP servers
						$mail->SMTPAuth = true;                               // Enable SMTP authentication
						$mail->Username = 'realestatemyproject@gmail.com';                 // SMTP username
						$mail->Password = '!@#$akram';                           // SMTP password
						$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
						$mail->Port = 465;                                    // TCP port to connect to
						$mail->SMTPOptions = array(
							'ssl' => array(
								'verify_peer' => false,
								'verify_peer_name' => false,
								'allow_self_signed' => true
							)
						);

						//Recipients
						$mail->setFrom('realestatemyproject@gmail.com', 'RealEstate');
						$mail->addAddress($user_email, $user_name);     // Add a recipient					
						$mail->addReplyTo('info@example.com', 'Information');
						$mail->addCC('cc@example.com');
						$mail->addBCC('bcc@example.com');

						//Attachments
						//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
						//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

						//Content
						$mail->isHTML(true);                                  // Set email format to HTML
						$mail->Subject = 'Inspection Time';
						$mail->Body    = ''.$user_name.', your requested  for '.$property_id.' no properties  inspection schedule Cancled for unwanted reason. Next schedule will be informed you by email. Thank you  ' ;
						$mail->AltBody = 'Activation';

						$mail->send();
						//echo 'Message has been sent';
						} catch (Exception $e) {
							echo 'Message could not be sent.';
							echo 'Mailer Error: ' . $mail->ErrorInfo;
						}
					}

				}

		}

				// $sql = $conn->prepare("SELECT * FROM `inspection_time_info` WHERE property_id='$property_id'");// middle/last/first
				// $sql->execute();
				// $data = $sql->fetchAll();
		 
		 		$sql = $conn->prepare("SELECT * FROM `inspection_time_info` WHERE property_id='$property_id'");
				$sql->execute();
				$value=$sql->fetch(PDO::FETCH_ASSOC);
?>	
		
		<!-- Start Design of Manage Admin Pannel -->
	
	<div class="panel panel-default">
		<div class="panel-heading bg-info"><p style="font-size:20px;color:#000;">My property List</p></div>
		<?php if(!empty($value['property_id'])){?>
		<div class="panel-body">
			<div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                        	<th>Property ID</th>
                            <th>Inspection Date</th>
                            <th>Inspection time</th>
                            <th>Status</th>                                      
                            <th>Action</th>
                        </tr>
                    </thead>
					
                    <tbody>					
							<form method="post">
                                <tr class="odd gradeX">
                                	<td> <h4> <?php echo  $value['property_id']; ?> </h4></td>
                                    <td> <h4> <?php echo  $value['inspection_date']; ?> </h4></td>
                                    <td> <h4> <?php echo  $value['inspection_time']; ?> </h4></td>
                                    <td> <h4> <?php if ($value['inspection_time']==NULL) echo "Not Fixed"; else echo "Fixed";?> </h4></td>

									<td class="center">
									    <?php if($value['inspection_time']==NULL) {?>
										<a class="btn btn-xs btn-success" href="" data-toggle="modal" data-target="#myModal">
											<span class="glyphicon glyphicon-ok"></span>
										</a>
         								<input type="hidden" name="property_id" value="<?php echo $value['property_id']; ?>">
         								<?php } else{?>
												<!-- <button class="btn btn-danger" type="submit" name="edit">
													<span class="glyphicon glyphicon-edit"></span>
												</button>  -->        
												
												<button class="btn btn-danger" type="submit" name="delete">
													<!-- <span class="glyphicon glyphicon-delete"></span> -->
													<span class="glyphicon glyphicon-trash"></span>
												</button>
         										<input type="hidden" name="property_id" value="<?php echo $value['property_id']; ?>">

         								<?php}?>
									</td>							
                                </tr>
							</form>
						<?php
						}
						?>
						
                    </tbody>
                </table>
            </div>
		</div>
	</div>

	<?php } else{?>


	<div class="container">
	<form method="post">
	<input type="hidden" name="property_id1" value="<?php echo $value['property_id']; ?>">
	<button class="btn btn-success btn-block" type="submit" name="add_inspection">Click here for first time to start inspection for this Property</button>
	</form>
	</div>

	<?php }?>
	  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
        	<form method="post">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title">Input Selling Price</h4> -->
        </div>
        <div class="modal-body">
          <label>Inspectation Time</label><br>
          <input type="Date" name="inspection_date" required=""><br>
        </div>
        <div class="modal-body">
          <label>Inspectation Time</label><br>
          <input type="time" name="inspection_time" required=""><br>
        </div>
        <div class="modal-footer">
          <button class="btn btn-success" type="submit" name="date_fix">OK</button>
         <input type="hidden" name="property_id" value="<?php echo $value['property_id']; ?>">
         </form>
        </div>
      </div>
    </div>
  </div>
</div>
	