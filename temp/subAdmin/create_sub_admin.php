<?php

if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $pass1 = $_POST['pass1']; 
    $pass2 = $_POST['pass2'];
    $image_url='There is no image';
    $active_status1 =1;
    $active_status2 =1;
	
	if ($password == $repassword && !empty($repassword)){
	// Image Upload Start...........................
    if (isset($_FILES['image'])) {
        //echo "<pre>";
        //print_r($_FILES); exit;
        $errors = array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp =  $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
		$file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
		
		//$img = explode('.',$file_name);
		//echo "<pre>";
        //print_r($img); 
		//exit;
        $extensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            $loacation = 'adminImg/';
            $img_name = rand();
            $image_url = $loacation.$img_name.'.'.$file_ext;

            move_uploaded_file($file_tmp, $image_url);

        } else {
            print_r($errors);
        }
    }

    // Image Upload end .......................
    

    if (!empty($name) && !empty($email) && !empty($phone) && !empty($password)) {
				$data = array($name,$email,$phone,$password,$image_url,$status);
				$sql = "insert into tbl_sub_admin_info(sadmin_name,sadmin_email,sadmin_phone,password,s_img_url,s_active_status)values(?,?,?,?,?,?)";
				$stmt = $conn->prepare($sql);
				$end = $stmt->execute($data);
				if ($end) {
				   $sms = '<div class="alert alert-success alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Data has been successfully saved!</strong> </div>';
				} else {
					$sms = '<div class="alert alert-danger alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Data submission unsuccessful</strong> Indicates a unsuccessful or negative action.</div>';
				}
    } else {
		$sms = '<div class="alert alert-warning alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Unsuccess!</strong> Sorry you must fillup all the field .....</div>';
    }
	} else{
 	$sms = '<div class="alert alert-warning alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Unsuccess!</strong> Passwords do not match. Try again </div>';
	}
}
?>	

<!---  Contents Starts ------>

   <div id="page-inner">
       <div class="row">
           <div class="col-md-12">
            <h2>Add Sub-Admin Information</h2>   
               
              
           </div>
       </div>
        <!-- /. ROW  -->
        <hr />
<script type="text/javascript" src="../js/validation.js"></script>
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
         <?php if(isset($sms)){ echo $sms; } ?> 
		 
			 <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style="text-align:center; font-weight: bolder; font-size: 18px;">
                            Sub-Admin Create Form 
                        </div>						
						
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                     
                                    <form role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Name:</label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter Name"/>                                             
                                        </div> 
										
										<div class="form-group">
                                            <label>Email:</label>
                                            <input type="email" class="form-control" name="email" placeholder="Enter Email"/>                                             
                                        </div>	
										
										<div class="form-group">
                                            <label>Phone Number:</label>
                                            <input type="text" class="form-control" name="phone" placeholder="Phone Number"/>                                             
                                        </div>		
										
                                        <div class="form-group">
                                           <label for="pass1">Password:</label>
                                           <input type="password" name="pass1" class="form-control" id="pass1" placeholder="Enter Your Password">
                                         </div>
                                 
                                        <div class="form-group">
                                           <label for="pass2">Confirm Password:</label>
                                           <input type="password" name="pass2" class="form-control" id="pass2" placeholder="Retype Your Password" onkeyup="pass_validator(); return false;">
                                           <span id="confirmMessage" class="confirmMessage"></span>
                                         </div>

                                        <div class="form-group">
                                            <label>Choose a Picture</label>
                                            <input type="file" name="image"/>
                                        </div>
										
										<div><p>Please Submit Your Informaion</p></div>
										
										 <button type="submit" name="btn" class="btn btn-primary">Submit</button>
										 
										 </form>
										 
								</div>
						    </div>
					   </div>
				     </div>
				</div>
               
               </div>
             <!-- /. PAGE INNER  -->
  </div>

