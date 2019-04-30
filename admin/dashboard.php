       <?php 
         $active_user=$conn->prepare("SELECT count(`user_id`) FROM user_info WHERE active_status_user='1'");
         $active_user->execute();
         $data_active_user=$active_user->fetch(PDO::FETCH_ASSOC);

         $active_agent=$conn->prepare("SELECT count(`agent_id`) FROM agent_info WHERE active_status_agent='1'");
         $active_agent->execute();
         $data_active_agent=$active_agent->fetch(PDO::FETCH_ASSOC);


         $total_property=$conn->prepare("SELECT count(`property_type`) FROM property_info WHERE 1");
         $total_property->execute();
         $data_total_property=$total_property->fetch(PDO::FETCH_ASSOC);

         $total_available_property=$conn->prepare("SELECT count(`property_type`) FROM property_info WHERE active_status_property='1'");
         $total_available_property->execute();
         $data_total_available_property=$total_available_property->fetch(PDO::FETCH_ASSOC);

         $total_sold_property=$conn->prepare("SELECT count(`property_type`) FROM property_info WHERE active_status_property='2'");
         $total_sold_property->execute();
         $data_total_sold_property=$total_sold_property->fetch(PDO::FETCH_ASSOC);

        ?>
        <!-- /. NAV SIDE  -->
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Admin Dashboard</h2>   
                        <h5>Welcome <?php echo $_SESSION['admin_name'];?> , Love to see you back. </h5>
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
                  <h3><?php echo $data_active_user['count(`user_id`)']?></h3>

                  <p>Active User</p>
                </div>
                <div class="icon">
                  <i class="ion-ios-people"></i>
                </div>
                <a href="index.php?page=active_user" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $data_active_agent['count(`agent_id`)']?></h3>

                  <p>Active Agent</p>
                </div>
                <div class="icon">
                  <i class="ion-ios-people"></i>
                </div>
                <a href="index.php?page=active_agent" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
              <div class="small-box bg-blue">
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

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $data_total_available_property['count(`property_type`)']?></h3>

                  <p>Available Property</p>
                </div>
                <div class="icon">
                  <i class="ion-ios-home"></i>
                </div>
                <a href="index.php?page=" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $data_total_sold_property['count(`property_type`)']?></h3>

                  <p>Sold Property</p>
                </div>
                <div class="icon">
                  <i class="ion-ios-home"></i>
                </div>
                <a href="index.php?page=" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
        </div>


        </div>
        </div>



                
             