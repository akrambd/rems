<?php require("../db_connect/connection.php"); 

    $id = $_GET['id'];
    $sql = $conn->prepare("SELECT * FROM `user_info` WHERE`user_id`='$id' ");
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

        <div class="col-lg-12" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $_SESSION['user_name'];?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-2" align="center"> <img alt="User Pic" src="../<?php echo $_SESSION['user_img'];?>" class="img-circle img-responsive" style="width: 160px;height: 160px;"> </div>



                 <!-- `user_info`(`user_id`, `user_name`, `user_address`, `user_email`, `user_mobile`, `user_password`, `user_img`, `user_nid`, `active_status`) -->

                <div class="col-sm-10 col-md-2 col-lg-10">
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Address</td>
                        <td>Programming</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td>06/23/2013</td>
                      </tr>
                      <tr>
                        <td>Mobile</td>
                        <td>01/24/1988</td>
                      </tr>
                   
                      <tr>
                        <td>Password</td>
                        <td>Female</td>
                      </tr>
                        <tr>
                        <td>Home Address</td>
                        <td>Kathmandu,Nepal</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><a href="mailto:info@support.com">info@support.com</a></td>
                      </tr>
                        <td>Phone Number</td>
                        <td>123-4567-890(Landline)<br><br>555-4567-890(Mobile)
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
              </div>
                  <div class="col-sm-1 col-md-6 col-lg-10" align="center"> <img alt="User NID" src="../<?php echo $_SESSION['user_nid'];?>" class="img-responsive"> </div>
                </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="index.php?page=profile_update" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a  href="../user/" data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
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
