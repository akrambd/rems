<?php require("db_connect/connection.php"); 

    $id = $_GET['id'];
    $sql = $conn->prepare("SELECT * FROM `house_info` WHERE`id`='$id' ");
    $sql->execute();
    $value = $sql->fetchAll();
    $sql1 = $conn->prepare("SELECT * FROM house_info,owner_info WHERE owner_info.owner_id=house_info.owner_id AND id='$id'");
    $sql1->execute();
    $value1 = $sql1->fetchAll();
    foreach($value as $v)
    foreach($value1 as $v)
?>


<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="assets/style.css"/>
  <!-- <link href="css/navbar.css" rel="stylesheet" type="text/css" media="all" /> -->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.js"></script>
  <script src="assets/script.js"></script>



<!-- Owl stylesheet -->
<link rel="stylesheet" href="assets/owl-carousel/owl.carousel.css">
<link rel="stylesheet" href="assets/owl-carousel/owl.theme.css">
<script src="assets/owl-carousel/owl.carousel.js"></script>
<!-- Owl stylesheet -->


<body>
          <!--Top-Bar-->
      
        <div class="top-bar">
        <div class="container">
          <div class="header-nav">
            <nav class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <h1><a class="navbar-brand" href="index.php">Real Estate</a></h1>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                <nav class="linkEffects linkHoverEffect_12">
                  <ul>

                    <li><a class="active" href="index.php"><span>Home</span></a></li> 
                    <li><a class="scroll" href=""><span>About</span></a></li> 
                    <li><a class="scroll" href=""><span>Sell</span></a></li> 
                    <li><a class="scroll" href=""><span>Rent</span></a></li> 
                    <li><a class="scroll" href=""><span>Contact</span></a></li>
                    <li><a href="registration.php"><span>Registration</span></a></li>
                    <li><a href="login/index.php"><span>Login</span></a></li>  
                  

                  </ul>
                </nav>  
              </div>
            </nav>
          </div>
        </div>
      </div>

<!-- banner -->

<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 hidden-xs">

<!-- <div class="hot-properties hidden-xs">
<h4>Hot Properties</h4>
<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/banner1.jpg" class="img-responsive img-circle" alt="properties"/></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p> </div>
              </div>
<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/banner2.jpg" class="img-responsive img-circle" alt="properties"/></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p> </div>
              </div>

<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/banner3.jpg" class="img-responsive img-circle" alt="properties"/></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p> </div>
              </div>

<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/banner4.jpg" class="img-responsive img-circle" alt="properties"/></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p> </div>
              </div>

</div> -->



<!-- <div class="advertisement">
  <h4>Advertisements</h4>
  <img src="images/advertisements.jpg" class="img-responsive" alt="advertisement">
 -->
</div>

</div>






<div class="col-lg-9 col-sm-8 ">

<h2><?php echo $v['bedroom'];?> room and <?php echo $v['kitchen'];?> kitchen apartment</h2>
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
          <img src="owner/<?php echo  $v['img_1']; ?>" class="properties" alt="properties" />
        </div>
        <!-- #Item 1 -->

        <!-- Item 2 -->
        <div class="item">
          <img src="owner/<?php echo  $v['img_2']; ?>" class="properties" alt="properties" />
         
        </div>
        <!-- #Item 2 -->

        <!-- Item 3 -->
         <div class="item">
          <img src="owner/<?php echo  $v['img_3']; ?>" class="properties" alt="properties" />
        </div>
        <!-- #Item 3 -->

        <!-- Item 4 -->
        <div class="item ">
          <img src="owner/<?php echo  $v['img_4']; ?>" class="properties" alt="properties" />
          
        </div>
        <!-- # Item 4 -->
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
<!-- #Slider Ends -->

  </div>
  



  <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span> Properties Detail</h4>
  <p><?php echo $v['description'];?></p>
  <!-- <p></p> -->

  </div>
  <div><h4><span class="glyphicon glyphicon-map-marker"></span> Location</h4>
<div class="well"><?php echo $v['location'];?></div>
  </div>

  <!-- <div><h4><span class="glyphicon glyphicon-map-marker"></span> Location</h4>
<div class="well"><iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Pulchowk,+Patan,+Central+Region,+Nepal&amp;aq=0&amp;oq=pulch&amp;sll=37.0625,-95.677068&amp;sspn=39.371738,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Pulchowk,+Patan+Dhoka,+Patan,+Bagmati,+Central+Region,+Nepal&amp;ll=27.678236,85.316853&amp;spn=0.001347,0.002642&amp;t=m&amp;z=14&amp;output=embed"></iframe></div>
  </div> -->

  </div>
  <div class="col-lg-4">
  <div class="col-lg-12  col-sm-6">
<div class="property-info">
<p class="price"> <?php echo $v['price']; ?> Taka</p>
  <p class="area"><span class="glyphicon glyphicon-map-marker"></span> <?php echo $v['address'];?></p>
  
  <div class="profile">
  <span class="glyphicon glyphicon-user"></span> Agent Details
  <p><?php echo $v['owner_name'];?><br><?php echo $v['owner_mobile'];?></p>
  </div>
</div>

    <h6><span class="glyphicon glyphicon-home"></span> Availabilty</h6>
    <div class="listing-detail">
    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room"><?php echo $v['bedroom'];?></span> 
    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room"><?php echo $v['bathroom'];?></span> 
    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking"><?php echo $v['kitchen'];?></span> 
    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen"><?php echo $v['parking'];?></span> </div>

</div>
<div class="col-lg-12 col-sm-6 ">
<div class="enquiry">
  <h6><span class="glyphicon glyphicon-envelope"></span> Post Enquiry</h6>
  <form role="form">
                <input type="text" class="form-control" placeholder="Full Name"/>
                <input type="text" class="form-control" placeholder="you@yourdomain.com"/>
                <input type="text" class="form-control" placeholder="your number"/>
                <textarea rows="6" class="form-control" placeholder="Whats on your mind?"></textarea>
      <button type="submit" class="btn btn-primary" name="Submit">Send Message</button>
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
