       <?php 
         $active_user=$conn->prepare("SELECT count(`user_name`) FROM user_info WHERE active_status_user='1'");
         $active_user->execute();
         $data_active_user=$active_user->fetch(PDO::FETCH_ASSOC);


         $total_property=$conn->prepare("SELECT count(`property_type`) FROM property_info WHERE active_status_property='1'");
         $total_property->execute();
         $data_total_property=$total_property->fetch(PDO::FETCH_ASSOC);

        ?>
        <!-- /. NAV SIDE  -->
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Admin Dashboard</h2>   
                        <h5>Welcome <?php echo $_SESSION['s_admin_name'];?> , Love to see you back. </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
        <div class="box-body">
        <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $data_active_user['count(`user_name`)']?></h3>

                  <p>Active user</p>
                </div>
                <div class="icon">
                  <i class="ion-ios-people"></i>
                </div>
                <a href="index.php?page=" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $data_total_property['count(`property_type`)']?></h3>

                  <p>total Property</p>
                </div>
                <div class="icon">
                  <i class="ion-ios-home"></i>
                </div>
                <a href="index.php?page=" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
        </div>
        </div>



                
             