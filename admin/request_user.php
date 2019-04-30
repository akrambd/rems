<?php

		 
		 $sqlUser = $conn->prepare("SELECT * FROM user_info where `active_status_user`='0' ORDER BY `user_id` DESC");
		 $sqlUser->execute();
		 $dataUser = $sqlUser->fetchAll();



		if(isset($_POST['approve']))
		 {

			   $id = $_POST['user_id'];			
			   $query = "UPDATE `user_info` SET `active_status_user`='1' where user_id='$id'";
			   $stmt = $conn->prepare($query);
			   $end = $stmt->execute();			   
				if($end)
					{
						
					$sql = $conn->prepare("SELECT * FROM user_info WHERE user_id='$id' ");
					$sql->execute();
					$data = $sql->fetch(PDO::FETCH_ASSOC);
					$user_id= $data['user_id'];	
                    $user_name= $data['user_name'];					
                    $user_address= $data['user_address'];					
                    $user_email= $data['user_email'];

                    $mail = new PHPMailer(true);                              // Passing `true` enables 
					try {

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
						$mail->Subject = 'User Account Activation';
						$mail->Body    = 'Congratulations! '.$user_name.', your account is approved.<br/>Now you can access by using your email and password<br/>For login your account click<a href="http://localhost/rems/login/index.php">here</a>';
						$mail->AltBody = 'Activation';

						$mail->send();
						//echo 'Message has been sent';
						} catch (Exception $e) {
							echo 'Message could not be sent.';
							echo 'Mailer Error: ' . $mail->ErrorInfo;
						}					

					
		$sms = '<div class="alert alert-success alert-success"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <h2 style="text-align: center; font-weight: bolder;">Request successfully approved!</h2></strong> </div>';
		}else{
		 $sms = '<div class="alert alert-success alert-success"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <h2 style="text-align: center; font-weight: bolder;">Request not approved!</h2></strong> </div>';
			}
		} 
		 
		elseif(isset($_POST['delete']))
		{
					
		$id = $_POST['user_id'];                
		$sql = $conn->prepare("SELECT * FROM user_info WHERE user_id='$id' ");
		$sql->execute();
		$data = $sql->fetch(PDO::FETCH_ASSOC);
  			$_SESSION['user_name']= $data['user_name'];					
  			$_SESSION['user_address']= $data['user_address'];					
            $_SESSION['user_email']= $data['user_email'];
			   

			   $user_name= $_SESSION['user_name'];
			   $user_email= $_SESSION['user_email'];
	
			   $query = "DELETE FROM `user_info` where user_id='$id'";
			   $stmt = $conn->prepare($query);
			   $end = $stmt->execute();
			if($end && $data)
			{
						

					
		$sms = '<div class="alert alert-success alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <h2 style="text-align: center; font-weight: bolder;">Account deleted!</h2></strong> </div>';
		}else{
		$sms = '<div class="alert alert-success alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <h2 style="text-align: center; font-weight: bolder;">Account not deleted!</h2></strong> </div>';
		}
		}  

 		 
		 // For auto reload page or show data without reload page
		 $sqlUser = $conn->prepare("SELECT * FROM user_info where `active_status_user`='0' ORDER BY `user_id` DESC");
		 $sqlUser->execute();
		 $dataUser = $sqlUser->fetchAll();
		 
		 
?>


		<script>
		  function confirmation() {
		  return confirm('Are you sure you want to do this?');
			}
		</script>
		
<!-- content starts -->		
		
<div id="page-inner">
     <div class="row">
         <div class="col-md-12">
          <h2>Manage User Information</h2>		  
                      
         </div>
     </div>
	  
      <!-- /. ROW  -->
      <hr />
	 <?php if(isset($sms)){echo $sms;} ?>
			 <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
             <div class="panel panel-default">
             <div class="panel-heading" style="text-align:center; font-weight: bolder; font-size: 18px;">Pending User list  </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
										  <th>Sl.</th>
										  <th>Name</th>                                          
										  <th>Address</th>                                          
										  <th>Email</th>
										  <th>Contact No</th>
										  <th>Image</th>
										  <th>NID</th>                                                    
										  <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$i=1;
									foreach($dataUser as $value)
									{
									?>
									
									<form method="post">
                                        <tr>
                                            	<td> <h4><?php echo $i; ?></h5></td>                                           
												<td> <h5><?php echo $value['user_name']; ?></h5></td>                                           
												<td><h5><?php echo $value['user_address']; ?></h5></td>                                           
												<td><h5><?php echo $value['user_email']; ?></h5></td>                                           
											  	<td><h5><?php echo  $value['user_mobile']; ?></h5></td>                                                                                    
											  	<td><h5><img src="../<?php echo  $value['user_img']; ?>" height="80" width="80"> </h5></td>
											  	<td><h5><img src="../<?php echo  $value['user_nid']; ?>" height="80" width="80"> </h5></td>                                                                                     
       

											  <td class="center">
											  <?php 
											  
								  
											    if($value['active_status_user'] == 0) { ?> 
											  
                                                <button class="btn btn-danger" type="submit" name="delete"  onclick="confirmation()">
													<span class="glyphicon glyphicon-trash"></span>
												</button>         
												
												<button class="btn btn-success" type="submit" name="approve"  onclick="return confirmation()">
													<span class="glyphicon glyphicon-ok"></span>
												</button>

												<a class="btn btn-success" href="index.php?page=user_profile_view&user_id=<?php echo $value['user_id'];?> ">
													<span class="glyphicon glyphicon-eye-open"></span>
												</a>	

                                                <input type="hidden" name="user_id" value="<?php echo $value['user_id']; ?>">
												
												
												
											  <?php }?>
											  
											 </td>
                                        </tr>
										
									</form>
									<?php
									$i++;
									}
									?>
									                                           
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
              </div>
				 
				 
				 
               
    </div>
             
 </div>
