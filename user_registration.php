<?php
  error_reporting(0);



   if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass1 = $_POST['pass1']; 
    $pass2 = $_POST['pass2'];
    $image_url='There is no image';
    $nid_url='There is no image';
    $active_status_user = 0; 
    

    // if ($pass1 == $pass2 && !empty($pass2)){
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

    
        $extensions = array("jpeg", "jpg", "png");

        // if (in_array($file_ext, $extensions) === false) {
        //     $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        // }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            $loacation = 'user/user_img/profile/pro';
            $img_name = rand();
            $image_url = $loacation.$img_name.'.'.$file_ext;

            move_uploaded_file($file_tmp, $image_url);
            //echo "Success";
      //exit;
        } else {
            print_r($errors);
        }
    }

    // Image Upload end .....................

   

    if (isset($_FILES['nid'])) {
        //echo "<pre>";
        //print_r($_FILES); exit;
        $errors = array();
        $file_name1 = $_FILES['nid']['name'];
        $file_size1 = $_FILES['nid']['size'];
        $file_tmp1 =  $_FILES['nid']['tmp_name'];
        $file_type1 = $_FILES['nid']['type'];
        $file_ext1 = strtolower(end(explode('.', $_FILES['nid']['name'])));
    
        $extensions1 = array("jpeg", "jpg", "png");

        if (in_array($file_ext1, $extensions1) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            $loacation1 = 'user/user_img/nid/nid';
            $nid_name1 = rand();
            $nid_url = $loacation1.$nid_name1.'.'.$file_ext1;

            move_uploaded_file($file_tmp1, $nid_url);
            //echo "Success";
      //exit;
        } else {
            print_r($errors);
        }
    }

 

    if (!empty($name) && !empty($address) && !empty($email) && !empty($phone) && !empty($pass1)) {
        $data = array($name,$address,$email,$phone,$pass1,$image_url,$nid_url,$active_status_user);
        $sql = "insert into user_info(user_name,user_address,user_email,user_mobile,user_password,user_img,user_nid,active_status_user)
                values(?,?,?,?,?,?,?,?)";
                
        $stmt = $conn->prepare($sql);
        $end = $stmt->execute($data);
        if ($end) {
           $sms = '<div class="alert alert-success alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Indicates a successful or positive action.</div>';
        } else {
          $sms = '<div class="alert alert-danger alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Unsuccess!</strong> Indicates a unsuccessful or negative action.</div>';
        }
    } 

  }
  
  // else {
  // $sms = '<div class="alert alert-warning alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Unsuccess!</strong> Passwords do not match. Try again </div>';
  // }

?>  



<!-- end -->

<script type="text/javascript" src="js/validation.js"></script>
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
  <div class="container">
    <div class="col-md-6 " >
      <div class="ag-bt">
      </div>
      
              
        <?php if(isset ($sms)) {echo $sms;} ?>

       <form method="post" enctype="multipart/form-data" id="form" name="form" onsubmit="return validate_form()"">

       	
          <h3 style="margin-bottom: 14px " > User Registration Form </h3>
      	
          


         <div class="form-group">
                   <label for="name">Name:</label>
                   <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Name" >
                 </div>
         
         <div class="form-group">
                   <label for="address">Address:</label>
                   <input type="text" name="address" class="form-control" id="address" placeholder="Enter Your Address" >
                 </div>
         
         <div class="form-group">
                   <label for="email">Email:</label>
                   <input type="email" name="email" class="form-control" id="email" placeholder="Enter Your Email">
                 </div>
         
         <div class="form-group">
                   <label for="phone">Phone No:</label>
                   <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Your Contact No" >
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
                   <label for="image">Image:</label>
                   <input type="file" name="image" id="image" class="form-control" >
                 </div>
              
              <div class="form-group">
                   <label for="nid">NID image:</label>
                   <input type="file" name="nid" id="nid" class="form-control" >
                 </div>


         <input type="submit" name="btn" class="btn btn-success" value="Submit" onclick="return pass_validator();">
    
         
      </form>
      <br><br>

    </div>
  <!-- For form validation -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#form").validate({
      rules:{
        name:"required",
        address:"required",
        // phone:"required",
        // pass1:"required",

        image: {
          required: true,
          extension: "jpeg,jpg|png",

        },

        nid: {
          required: true,
          extension: "jpeg,jpg|png",
        },

        pass1:{
          required:true,
          minlength:4,
        },

        email:{
          required:true,
        },

        phone:{
          required:true,
          number:true,
          minlength:11,
          maxlength:11,
        }

       


        },
      messages:{
        name:"Please Enter Your name",
        email:"Please Enter Your Valid Email",
        // phone:"Please Enter Your Contact number",
        // pass1:"Please Enter Password",
      }

    });
    
  });
</script>
    </br>
    </br>
    </br>
    <div class="col-md-6 agent-right">          
      <h3>Contact Us</h3>
      <h4><a href="">akram.cse007@gmail.com</a></h4>
<h4>+8801749307467</h4>
    </div>
      <div class="clearfix"></div>
  </div>

<!-- phone: {
        required: true,
        number: true,
    } -->

      <!-- 
    $( "#myinput" ).rules( "add", {
  required: true,
  minlength: 2,
  messages: {
    required: "Required input",
    minlength: jQuery.validator.format("Please, at least {0} characters are necessary")
  }
});


     -->