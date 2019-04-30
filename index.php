<?php require("db_connect/connection.php");
session_start();



?>



<!DOCTYPE html>
<html lang="en">
<head>
<title>Real Estate</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!--light-box-files -->
<script src="js/modernizr.custom.js"></script>
<script src="js/jquery.chocolat.js"></script>
<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
<link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico">

<link rel="stylesheet" href="assets/style.css"/>

<script src="js/responsiveslides.min.js"></script>
		<script>
				$(function () {
					$("#slider").responsiveSlides({
						auto: true,
						pager: true,
						nav: true,
						speed: 1000,
						namespace: "callbacks",
						before: function () {
							$('.events').append("<li>before event fired.</li>");
						},
						after: function () {
							$('.events').append("<li>after event fired.</li>");
						}
					});
				});
		</script>
			
<!-- start-smoth-scrolling -->
</head>
<body>
<!-- 	<nav class="navbar navbar-inverse" style="border-radius:0px; margin-bottom: 0px;"> -->
	<div class="top-bar">
			<div class="container">
				<div class="center-block">
					<div class="header-nav">
						<nav class="navbar navbar-default" >
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header" title="Go to RealEstate home">
								<h1><a class="navbar-brand" href="index.php">Real<span style="color:blue;">Estate</span></a></h1>
							</div>
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<!-- <h1><a class="navbar-brand" href="index.php">Real<span style="color:#35c7b4;">Estate</span></a></h1>
							</div> -->
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
								<nav class="linkEffects linkHoverEffect_12">
									<ul>

										<li><a href="index.php"><span>Home</span></a></li> 
										<li><a href=""><span>About</span></a></li> 
										<li><a href="index.php?page=sell_property"><span>For Sell</span></a></li> 
										<li><a href="index.php?page=sold_property"><span>Sold</span></a></li>
										<li><a href="index.php?page=agent_list"><span>Agents</span></a></li>

										<?php 

										if (isset($_SESSION['user_id'])) {
										?>

										<a href="user/index.php?page=dashboard">
											<li style="width: 40px; height: 40px;"><img src="<?php echo $_SESSION['user_img'];?>" class="img-circle" alt="User Image" style="width: 30px; height: 30px";></li>
										<li><span><?php echo $_SESSION['user_name']?></span></li>
										</a>
          								
        								
										<li><a href="logout.php?type=user"><span>logout</span></a></li> 
										
										<?php
										}
										elseif (isset($_SESSION['admin_id'])) {
										?>

										<a href="admin/index.php?page=dashboard">
											<li style="width: 40px; height: 40px;"><img src="admin/<?php echo $_SESSION['img_url'];?>" class="img-circle" alt="Agent Image" style="width: 30px; height: 30px";></li>
										<li><span><?php echo $_SESSION['admin_name']?></span></li>
										</a>

										
          								
        								
										<li><a href="logout.php?type=admin"><span>logout</span></a></li> 
										
										<?php
										}
										elseif (isset($_SESSION['agent_id'])) {
										?>

										<a href="agent/index.php?page=dashboard">
											<li style="width: 40px; height: 40px;"><img src="<?php echo $_SESSION['agent_img'];?>" class="img-circle" alt="User Image" style="width: 30px; height: 30px";></li>
										<li><span><?php echo $_SESSION['agent_name']?></span></li>
										</a>

										
          								
        								
										<li><a href="logout.php?type=agent"><span>logout</span></a></li> 
										
										<?php
										}

										

										else 
										{?>
										<li><a href="" class="" data-toggle="modal" data-target="#myModal"><span>Sign Up</span></a></li>
										<li><a href="login/index.php"><span>Login</span></a></li>
										<?php
										}
										?>
									

									</ul>
								</nav>	
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>



 
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
      	<div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registration For</h4>
        </div>
        <div class="modal-body">
        	
	          <a href="index.php?page=user_registration" type="submit" class="btn btn-info btn-block">User</a>
	          <a href="index.php?page=agent_registration" type="submit" class="btn btn-info btn-block">Agent</a>
			
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
				
</body>


		
							<?php
								switch(@$_GET['page']) {
									case "user_registration":{
										include("user_registration.php");
									}
										break;

									case "agent_registration":{
										include("agent_registration.php");
									}
										break;

									case "search":{
										include("search.php");
									}
										break;

									case "property-detail":{
										include("property-detail.php");
									}
										break;
									
									case "property-request":{
										include("property-request.php");
									}
										break;

									case "sell_property":{
										include("sell_property.php");
									}
										break;

									case "sold_property":{
										include("sold_property.php");
									}
										break;

									case "agent_list":{
										include("agent_list.php");
									}
										break;

									default:{
										include("main.php");
									}
								}


							?>






<!--/contact -->
<!--footer-->
<div class="footer">
		<div class="footer-head-agile">
			<ul>
				<li class="contact-agile"><span class="fa-icon-w3"><i class="fa fa-phone" aria-hidden="true"></i></span>CALL NOW : +8801749307467</li>
				<li class="logo-w3ls"><h2><a  href="index.php">Real Estate</a></h2></li>
				<li class="mail"><span class="fa-icon-w3"><i class="fa fa-envelope" aria-hidden="true"></i></span>MAIL : <a href="mailto:akram.007@gmail.com">akram.007@gmail.com</a></li>
			</ul>
		</div>
			
			<div class="clearfix"> </div>
			<div class="copy">
		        <p>@2018 Softmax Development and Learning Center @ Developer Md. Akram Chowdhury(BCSE, IUBAT) </p>
		    </div>
		</div>
	</div>
</div>
<!--/footer -->

</body>
</html>