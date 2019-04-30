<?php require("../db_connect/connection.php"); 

    $user_id1 = $_GET['user_id'];
    $sql = $conn->prepare("SELECT * FROM `user_info` WHERE`user_id`='$user_id1' ");
    $sql->execute();
    $value = $sql->fetchAll();
    foreach($value as $v)
?>

  
<!-- Page content Stats -->

    <section class="content-header">
      <h1>Profile Information</h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>

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
		<div class="container">
      <div class="row">

        <div class="col-lg-10" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $v['user_name'];?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-sm-4 col-md-4 col-lg-3" align="center"> <img alt="User Pic" src="../<?php echo $v['user_img'];?>" class="img-circle img-responsive" style="width: 160px;height: 160px;"> </div>


                <div class="col-sm-4 col-md-4 col-lg-4">
                  <table class="table">
                    <tbody class="col-lg-10">
                      <tr>
                        <td><b>Name</b></td>
                        <td><?php echo $v['user_name']; ?></td>
                      </tr>
                      <tr>
                        <td><b>Address</b></td>
                        <td><?php echo $v['user_address']; ?></td>
                      </tr>
                      <tr>
                        <td><b>Email</b></td>
                        <td><?php echo $v['user_email']; ?></td>
                      </tr>
                      <tr>
                        <td><b>Phone Number</b></td>
                        <td><?php echo $v['user_mobile']; ?></td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
              </div>
                  <div class="col-sm-8 col-md-8 col-lg-5" align=""> <img alt="User NID" src="../<?php echo $v['user_nid'];?>" class="img-responsive"> </div>
                </div>
            </div>
                 <div class="panel-footer">
                        <a class="btn btn-success" href="index.php?page=request_user" type="submit" name="approve">
                          Back
                        </a>
                        <!-- <input type="hidden" name="user_id" value="<?php echo $v['user_id']; ?>"> -->
                    </div>
            
          </div>
        </div>
      </div>
    </div>
        </div>


 
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

