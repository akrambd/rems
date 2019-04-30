<?php require("db_connect/connection.php"); 

    $id = $_GET['id'];
    $property = $conn->prepare("SELECT * FROM `property_info` WHERE `id`='$id' ");
    $property->execute();
    $data_property=$property->fetch(PDO::FETCH_ASSOC);

    $user = $conn->prepare("SELECT * FROM property_info,user_info WHERE user_info.user_id=property_info.user_id AND `id`='$id'");
    $user->execute();
    $data_user=$user->fetch(PDO::FETCH_ASSOC);

    $inspection=$conn->prepare("SELECT * FROM property_info,inspection_time_info WHERE inspection_time_info.property_id=property_info.id AND `property_id`='$id'");
    $inspection->execute();
    $data_inspection=$inspection->fetch(PDO::FETCH_ASSOC);

?>

<head>
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/script.js"></script>

<script src = "https://maps.googleapis.com/maps/api/js"></script>
      
      <script>
         function loadMap() {
      
            var mapOptions = {
               center:new google.maps.LatLng(<?php echo $data_property['latitude'] ;?>, <?php echo $data_property['longitude'] ;?>),
               zoom:10
            }
        
            var map = new google.maps.Map(document.getElementById("sample"),mapOptions);
            
            var marker = new google.maps.Marker({
               position: new google.maps.LatLng(<?php echo $data_property['latitude'] ;?>, <?php echo $data_property['longitude'] ;?>),
               map: map,
            });
         }
      </script>

</head>

<body style="background-color: #6b70821f" onload = "loadMap()">

<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 hidden-xs">

</div>

</div>






<div class="col-lg-12 col-sm-8 ">

<?php if ($data_property['property_type']=='apartment') {?>
  <h2><?php echo $data_property['bedroom'];?> room and <?php echo $data_property['kitchen'];?> kitchen apartment</h2>
<?php }?>

<?php if ($data_property['property_type']=='building') {?>
  <h2><?php echo $data_property['bedroom'];?> room and <?php echo $data_property['kitchen'];?> kitchen Building</h2>
<?php }?>


<div class="row">
  <div class="col-lg-8">
  <div class="property-images">
    <!-- Slider Starts -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators hidden-xs">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
        <li data-target="#myCarousel" data-slide-to="3" class=""></li>
      </ol>
      <div class="carousel-inner">
        <!-- Item 1 -->
        <div class="item active">
          <img src="user/<?php echo  $data_property['img_1']; ?>" class="properties" alt="properties" />
        </div>
        <!-- #Item 1 -->

        <!-- Item 2 -->
        <div class="item">
          <img src="user/<?php echo  $data_property['img_2']; ?>" class="properties" alt="properties" />
         
        </div>
        <!-- #Item 2 -->

        <!-- Item 3 -->
         <div class="item">
          <img src="user/<?php echo  $data_property['img_3']; ?>" class="properties" alt="properties" />
        </div>
        <!-- #Item 3 -->

        <!-- Item 4 -->
        <div class="item ">
          <img src="user/<?php echo  $data_property['img_4']; ?>" class="properties" alt="properties" />
          
        </div>
        <!-- # Item 4 -->
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
<!-- #Slider Ends -->

  </div>
  



  <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span> Properties Detail</h4>
  <p><?php echo $data_property['description'];?></p>
  </div>
  <!-- Map -->
  <div><h4><span class="glyphicon glyphicon-map-marker"></span> Location</h4>
  <div class="well" id = "sample" style = "height:400px;"></div>
  </div>
</div>

  <div class="col-lg-4">
  <div class="col-lg-12  col-sm-6">
<div class="property-info">
<p class="price"><i class="fa fa-money fa-lg"></i>&nbsp;<?php if ($data_property['active_status_property']=='2') {echo $data_property['selling_price'];} else { echo $data_property['price'];}?> Taka</p>
  <h5><span class="glyphicon glyphicon-map-marker">&nbsp;<?php echo $data_property['address'];?></span></h6>
  

  <div class="profile">
    <h6><i class="fa fa-user fa-lg"></i> Seller Information</h6>
    <div class="media">
    <div class="media-left">
      <img src="<?php echo $data_user['user_img'];?>" class="media-object" style="width:50px; height:60px; ">
    </div>
    <div class="media-body">
      <p><?php echo $data_user['user_name'];?><br><?php echo $data_user['user_mobile'];?></p>
    </div>
  </div>

  </div>


  <div class="profile">
  <h6><i class="fa fa-crosshairs fa-lg"></i> Sell by</h6>
  <p><?php echo $data_property['sell_by'];?></p>
  </div>

  <div class="profile">
  <h6><i class="fa fa-calendar fa-lg"></i> Posted on</h6>
  <p><?php echo date('d F Y', strtotime($data_inspection['property_added_date']))?></p>
  </div>

  <div class="profile">
  <?php if ($data_property['active_status_property']=='2'){?>
  <h6><i class="fa fa-money fa-lg"></i> Display price</h6>
  <p><?php echo $data_property['price'];?></p>
  </div>
  <?php }?>
  </div>

  <?php if ($data_property['active_status_property']==1) {?>
   <div class="profile">
  <h6><i class="fa fa-calendar fa-lg"></i> Inspaction Date and Time</h6>
  <?php if ($data_inspection['inspection_date']==NULL) {?>
    <p style="color: red">Not Fix yet</p>
  <?php } else {?>
  <p><?php echo date('d F Y', strtotime($data_inspection['inspection_date'])) ."<br>". date('g:i a', strtotime($data_inspection['inspection_time']));?></p>
  <?php }
}?>
  </div>
  


  

  <?php if ($data_property['property_type']!='land') {?>
  <h6><span class="glyphicon glyphicon-home"></span> Availabilty</h6>      
        <h6>
        <i class="fa fa-bed fa-lg" style="color: green;" data-toggle="tooltip" data-placement="bottom" title="Bed Room"></i>&nbsp;<?php echo $data_property['bedroom'];?>&nbsp;
        <i class="fa fa-bath fa-lg" style="color:green" data-toggle="tooltip" data-placement="bottom" title="Bath Room"></i>&nbsp;</i><?php echo $data_property['bathroom'];?>&nbsp;
        <i class="fa fa-cutlery fa-lg" style="color: green;" data-toggle="tooltip" data-placement="bottom" title="Kitchen"></i> &nbsp;<?php echo $data_property['kitchen'];?>&nbsp;
        <i class="fa fa-car fa-lg" style="color: green;" data-toggle="tooltip" data-placement="bottom" title="Parking"></i> &nbsp;<?php echo $data_property['parking'];?>&nbsp;
        <?php } else?>&nbsp;
        </h6>

<!-- Request Option -->









<!-- <div class="col-lg-12 col-sm-6 "> -->
  <?php if(isset($sms)){echo $sms;} ?>
<div class="enquiry">
  <form role="form" >
              <?php 
     if (!empty($_SESSION['user_id'])) {

          
      if ($data_user['user_id']!= $_SESSION['user_id'] && $data_property['active_status_property']==1) {

      $sender_id=$_SESSION['user_id'];
      $property_id=$data_property['id'];

// ###############################################################
        $check = $conn->prepare("SELECT count(*) as total FROM property_request WHERE property_id='$property_id' AND sender_id='$sender_id'");
          $check->execute();
          $check_property_sender = $check->fetch(PDO::FETCH_ASSOC);
// ################################################################

          if ($check_property_sender['total']<=0) {?>
      <a class="btn btn-primary" href="index.php?page=property-request&user_id=<?php echo $_SESSION['user_id']; ?>&property_id=<?php echo $data_property['id']; ?>">Send Request</a>

      <?php
      }else{
        echo '<div class="alert alert-danger"><strong>Alert!</strong> You already send request .....</div>';
      }
    }
       elseif ($data_user['user_id']!= $_SESSION['user_id'] && $data_property['active_status_property']==2) {
        echo '<div class="alert alert-danger"><strong>Alert!</strong> Already sold .....</div>';
      }
     }

      elseif($data_property['active_status_property']==2){echo '<div class="alert alert-danger"><strong>Alert!</strong> Already sold .....</div>';}
      elseif (!isset($_SESSION['admin_id']) && !isset($_SESSION['agent_id']))
           {echo '<div class="alert alert-warning alert-dismissable"><strong>Alert!</strong> You must have login first .....</div>';}
 
?>

  </form>
 </div>         
</div>
  </div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>