<?php
error_reporting(0);

if (isset($_POST['btn'])) {
    $admin_name = $_POST['admin_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $image_url=$data['img_url'];
	
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
            $loacation = 'admin_img/';
            $img_name = rand();
            $image_url = $loacation.$img_name.'.'.$file_ext;

            move_uploaded_file($file_tmp, $image_url);
        } else {
            print_r($errors);
        }
    }

    // Image Upload end .......................
    

    if (!empty($admin_name) && !empty($email) && !empty($phone) && !empty($password) ) {
				// $sql = "update tbl_User_info set name='$name',company='$company',email='$email',phone_number='$contact',password='$password',img_User='$image_url' where User_id='$id'";

        $sql="UPDATE admin_info SET admin_name='$admin_name',email='$email',phone='$phone',password='$password',img_url='$image_url' WHERE admin_id='$id'";

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
					<input type="text" class="form-control" name="admin_name" value="<?php echo $data['admin_name']; ?>"/>
				  </div>  
				  
				  <div class="form-group">
					<label for="">Email:</label>
					<input type="text" class="form-control" name="email" value="<?php echo $data['email']; ?>" />
				  </div>
				  
				   <div class="form-group">
					<label for="">Phone:</label>
					<input type="text" class="form-control" name="phone" value="<?php echo $data['phone']; ?>" />
				  </div> 
				  
				  <div class="form-group">
					<label for="">Password:</label>
					<input type="password" class="form-control" name="password" value="<?php echo $data['password']; ?>"  />
				  </div>	  
				 <div class="form-group">
                    <label for="">Choose a Picture</label>
					<img src="<?php echo $data['img_url']; ?>" height="80" width="80">
                    <input type="file" name="image">
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
