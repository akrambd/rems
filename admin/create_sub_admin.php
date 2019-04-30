<?php
error_reporting(0);

if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass1 = $_POST['pass1']; 
    $pass2 = $_POST['pass2'];
    $image_url='There is no image';
    $active_status1 =1;
    $active_status2 =1;
    $active_status3 =1;
	
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
            $loacation = '../subAdmin/subAdminImg/';
            $img_name = rand();
            $image_url = $loacation.$img_name.'.'.$file_ext;

            move_uploaded_file($file_tmp, $image_url);

        } else {
            print_r($errors);
        }
    }

    // Image Upload end .......................
    

    if (!empty($name) && !empty($email) && !empty($phone) && !empty($pass1)) {
				$data = array($name,$email,$phone,$pass1,$image_url,$active_status1,$active_status2,$active_status3);
				$sql = "INSERT INTO sub_admin_info(s_admin_name,s_email,s_phone,s_password,s_img_url,s_active_status1,s_active_status2,s_active_status3)values(?,?,?,?,?,?,?.?)";
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
	}
?>	

<!--  Contents Starts -->

   <div id="page-inner">
       <div class="row">
           <div class="col-md-12">
            <h2>Add Sub-Admin Information</h2>   
               
              
           </div>
       </div>
        <!-- /. ROW  -->
        <hr />
<script type="text/javascript" src="../js/validation.js"></script>
<!-- <script src="../js/jquery-1.12.0.min.js"></script> -->
<script src="../js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
<script type="text/javascript">

  $(document).ready(function(){
    $("#form").validate({
      rules:{
        name:"required",
        phone:"required",
        pass1:"required",
        email:{
          required:true,
        }
        },
      messages:{
        name:"Please Enter name",
        email:"Please Enter Valid Email",
        phone:"Please Enter Contact number",
        pass1:"Please Enter Password",
      }

    });
    
  });
</script>
<style type="text/css">
        .error{color: red;}
</style>  


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
                                     
                            <form method="post" enctype="multipart/form-data" id="form" name="form" onsubmit="return validate_form()"">
                                                    
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" >
                                </div>

                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
                                </div>

                                <div class="form-group">
                                <label for="phone">Contact No:</label>
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Contact No" >
                                </div>                                        
                                										
                                <div class="form-group">
                                   <label for="pass1">Password:</label>
                                   <input type="password" name="pass1" class="form-control" id="pass1" placeholder="Enter Password">
                                </div>

                                <div class="form-group">
                                   <label for="pass2">Confirm Password:</label>
                                   <input type="password" name="pass2" class="form-control" id="pass2" placeholder="Retype Password" onkeyup="pass_validator(); return false;">
                                   <span id="confirmMessage" class="confirmMessage"></span>
                                 </div>

                                <div class="form-group">
                                    <label for="image">Image:</label>
                                    <input type="file" name="image" class="form-control" required="" >
                                </div>

                                <div><p>Please Submit</p></div>

                                 <input type="submit" name="btn" class="btn btn-success btn-block" value="Submit" onclick="return pass_validator();">
             
                            </form>
										 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


  <!-- For form validation -->
