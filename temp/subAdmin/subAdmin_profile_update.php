<?php
error_reporting(0);

if (isset($_POST['btn'])) {
    $s_admin_name = $_POST['name'];
    $s_email = $_POST['email'];
    $s_phone = $_POST['phone'];
    $s_password = $_POST['password'];
    $s_img_url=$valueSubAdmin['s_img_url'];
	
	// Image Upload Start...........................
  //   if (isset($_FILES['image'])) {
  //       $errors = array();
  // //  unlink($data['img_url']);
  //       $file_name = $_FILES['image']['name'];
  //       $file_size = $_FILES['image']['size'];
  //       $file_tmp =  $_FILES['image']['tmp_name'];
  //       $file_type = $_FILES['image']['type'];
  //   $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
    
  //       $extensions = array("jpeg", "jpg", "png");

  //       if (in_array($file_ext, $extensions) === false) {
  //           $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
  //       }

  //       if ($file_size > 2097152) {
  //           $errors[] = 'File size must be excately 2 MB';
  //       }

  //       if (empty($errors) == true) {
  //           $loacation = '../subAdmin/subAdminImg/';
  //           $img_name = rand();
  //           $s_img_url = $loacation.$img_name.'.'.$file_ext;

  //           move_uploaded_file($file_tmp, $s_img_url);
  //       } else {
  //           print_r($errors);
  //       }
  //   }

    // Image Upload end .......................
    
    // Image Upload Start...........................
    if (isset($_FILES['image'])) {
        $errors = array();
  //  unlink($data['img_url']);
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp =  $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
    $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
    
        $extensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            $image = $s_img_url;
            move_uploaded_file($file_tmp, $image);
        } else {
            print_r($errors);
        }
  
    }



    if (!empty($s_admin_name) && !empty($s_email) && !empty($s_phone) && !empty($s_password) && !empty($s_img_url) ) {
				

        $sql="UPDATE sub_admin_info SET s_admin_name='$s_admin_name',s_email='$s_email',s_phone='$s_phone',s_password='$s_password',s_img_url='$s_img_url' WHERE s_admin_id='$id'";

				$stmt = $conn->prepare($sql);
				$end = $stmt->execute();
				if ($end) {
				   $sms = '<div class="alert alert-success alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Profile has been successfully updated!</strong> </div>';
				   //header('location:index.php');
				} else {
					$sms = '<div class="alert alert-danger alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Profile Update unsuccessful</strong> Indicates a unsuccessful or negative action.</div>';
				}
    } else {
		$sms = '<div class="alert alert-warning alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Unsuccess!</strong> Sorry you must fillup all the field .....</div>';
    }
}
?>	

                      <!-- Page content Stats -->

      <section class="content-header">
      <h1>Update Profile Information</h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Profile Information Form</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
		<?php if(isset($sms)){echo $sms;} ?>
        <div class="box-body">
		<div class="col-md-8 col-md-offset-2">
		     <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update Your Profile Information </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data">
			
                <div class="box-body">
				
				  <div class="form-group">
					<label for="">Name:</label>
					<input type="text" class="form-control" name="name" value="<?php echo $valueSubAdmin['s_admin_name']; ?>"/>
				  </div>  
				  
				  <div class="form-group">
					<label for="">Email:</label>
					<input type="text" class="form-control" name="email" value="<?php echo $valueSubAdmin['s_email']; ?>" />
				  </div>
				  
				   <div class="form-group">
					<label for="">Phone:</label>
					<input type="text" class="form-control" name="phone" value="<?php echo $valueSubAdmin['s_phone']; ?>" />
				  </div> 
				  
				  <div class="form-group">
					<label for="">Password:</label>
					<input type="password" class="form-control" name="password" value="<?php echo $valueSubAdmin['s_password']; ?>"  />
				  </div>	  
				 <div class="form-group">
                    <label for="">Choose a Picture</label>
          <img src="<?php echo $valueSubAdmin['s_img_url']; ?>" height="80" width="80">
                    <input type="file" name="image"  id="">
                 </div>
										
                
							     
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="btn" class="btn btn-primary">Submit</button>
                <!-- <input type="hidden" name="admin_id" id="admin_id"> -->
              </div>
            </form>
          </div>
          
        </div>
        </div>


 
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
