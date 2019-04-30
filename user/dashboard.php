<?php 
         $user_id = $_SESSION['user_id'];
         $total_my_property=$conn->prepare("SELECT COUNT(`property_type`) FROM property_info WHERE user_id='$user_id' ");
         $total_my_property->execute();
         $data_total_my_property=$total_my_property->fetch(PDO::FETCH_ASSOC);
// <!-- ################################################################ -->

         $total_available_property=$conn->prepare("SELECT COUNT(`property_type`) FROM property_info WHERE user_id='$user_id' AND active_status_property='1' ");
         $total_available_property->execute();
         $data_total_available_property=$total_available_property->fetch(PDO::FETCH_ASSOC);

// <!-- ################################################################ -->

         $total_sold_property=$conn->prepare("SELECT COUNT(`property_type`) FROM property_info WHERE user_id='$user_id' AND active_status_property='2' ");
         $total_sold_property->execute();
         $data_total_sold_property=$total_sold_property->fetch(PDO::FETCH_ASSOC);

// <!-- ################################################################ -->

         $total_bought_property=$conn->prepare("SELECT COUNT(`property_id`) FROM property_request WHERE sender_id='$user_id' AND active_status_request='accept' ");
         $total_bought_property->execute();
         $data_total_bought_property=$total_bought_property->fetch(PDO::FETCH_ASSOC);

    ?>

    <section class="content-header">
      <h1> Dashboard</h1>
      <h5>Welcome <?php echo $_SESSION['user_name'];?> , Love to see you back. </h5>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        
        <div class="box-body">
        
        <div class="row">
<!-- ################################################################ -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $data_total_my_property ['COUNT(`property_type`)']; ?></h3>

                  <p>My property</p>
                </div>
                <div class="icon">
                  <i class="ion-ios-home"></i>
                </div>
                <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
<!-- ################################################################ -->
            <div class="col-lg-3 col-xs-6">
          <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $data_total_available_property ['COUNT(`property_type`)']; ?></h3>

                  <p>Available for sell</p>
                </div>
                <div class="icon">
                  <i class="ion-ios-cart-outline"></i>
                </div>
                <a href="index.php?page=property_list" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
<!-- ################################################################ -->
            <div class="col-lg-3 col-xs-6">
          <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $data_total_sold_property ['COUNT(`property_type`)']; ?></h3>

                  <p>Already sold</p>
                </div>
                <div class="icon">
                  <i class="ion-ios-cart"></i>
                </div>
                <a href="index.php?page=sold_property_list" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
<!-- ################################################################ -->
            <div class="col-lg-3 col-xs-6">
          <!-- small box -->
              <div class="small-box bg-purple">
                <div class="inner">
                  <h3><?php echo $data_total_bought_property ['COUNT(`property_id`)']; ?></h3>

                  <p>Bought Property</p>
                </div>
                <div class="icon">
                  <i class="ion-ios-cart"></i>
                </div>
                <a href="index.php?page=bought_property_list" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

  </div>
</div>
          
