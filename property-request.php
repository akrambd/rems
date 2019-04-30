<?php
	
	// session_start();
		
  
		if (isset($_POST['btn'])) {
			$property_id = $_GET['property_id'];
		    $subject = $_POST['subject'];
		    $message = $_POST['message'];
		  	$active_status_request = 'pending';

		  if(isset($_SESSION['user_id']))
		  	{
		    	if (!empty($subject) && !empty($message)) {
		          $data = array($property_id,$_SESSION['user_id'],$subject, $message,$active_status_request);
		          $sql = "insert into property_request(property_id,sender_id,subject,message,active_status_request)values(?,?,?,?,?)";
		          $stmt = $conn->prepare($sql);
		          $end = $stmt->execute($data);



		            $sms = '<div class="alert alert-success alert-dismissable" style="text-align:center; font-size:25px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong> Request submitted!</strong> </div>';
		                } else { 
		            $sms = '<div class="alert alert-danger alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Unsuccess!</strong> Indicates a unsuccessful or negative action.</div>';
		    		}
		    } 

		    elseif(isset($_SESSION['admin_id'])){

		    		$sms = '<div class="alert alert-warning alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Unsuccess!</strong> You are admin. Please create user id first .....</div>';

		    }


		    else {
		      $sms = '<div class="alert alert-warning alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Unsuccess!</strong> You must have login first .....</div>';
		    }
		  }


		?>




<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<div class="rows">
	<div class="col-lg-4 col-sm-4"></div>
<div class="col-lg-4 col-sm-4 ">
  <?php if(isset($sms)){echo $sms;} ?>

		  <form role="form" method="post">
		  				<label>Subject:</label>
		              	<input type="text" class="form-control" name="subject" id="subject" placeholder=" subject" required="" />
		                <label>Message:</label>
		                <textarea rows="4" class="form-control" name="message" id="message" placeholder="Message"></textarea>
		      <center><button type="submit" class="btn btn-success btn-block" name="btn" style="    margin-top: 28px;">Send</button></center>
		   </form>
 </div>
 <div class="col-lg-4 col-sm-4"></div>
 </div>
 </div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>




 