<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require("../db_connect/connection.php");
require_once "../phpmailer/PHPMailerAutoload.php";

session_start(); 
if($_SESSION['user_email']!=null)
{
		 $id = $_SESSION['user_id'];
     $sql= $conn->prepare("select * from user_info where user_id='$id'");
     $sql->execute();
     $data = $sql->fetch(PDO::FETCH_ASSOC);


     //for user table
     $sqlUser= $conn->prepare("select * from user_info where user_id='$id'");
     $sqlUser->execute();
     $valueUser = $sqlUser->fetch(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User Panel</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../assets/css/AdminLTE.css">
  <link rel="stylesheet" href="../assets/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../assets/js/adminlte.min.js"></script> 
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>

</head>
  
<!-- <?php
     //  $id = $_SESSION['user_id'];
     // $sql= $conn->prepare("select * from user_info where user_id='$id'");
     // $sql->execute();
     // $data = $sql->fetch(PDO::FETCH_ASSOC);

  ?> -->


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php?page=dashboard" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Use</b> </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>User Panel</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li><a href="../index.php">Home</a></li>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../<?php echo $_SESSION['user_img'];?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['user_name'];?> <i class="fa fa-angle-down"></i> </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../<?php echo $_SESSION['user_img'];?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['user_name'];?>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="index.php?page=profile_view&id=<?php echo $_SESSION['user_id']; ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../logout.php?type=user" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
         
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar" >
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image" style="margin-top: 7%;">
          <img src="../<?php echo $_SESSION['user_img'];?>" class=" img-thumbnail" alt="User Image">
        </div>
        <div class="pull-left info" style="margin-left: 2%;">
          <h4 style="font-weight:bolder;"><?php echo $_SESSION['user_name'];?> </h4>
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
      </div>
	  <br />

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
		<li ><a href="index.php?page=dashboard"><i class="fa fa-dashboard text-green"></i> Dashboard</a></li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-building text-green"></i>
            <span>Property Manage</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?page=add_property"><i class="fa fa-circle-o text-green"></i> Add new property</a></li>
            <li><a href="index.php?page=property_list"><i class="fa fa-circle-o text-green"></i> Property List </a></li> 
            <li><a href="index.php?page=manage_property_request"><i class="fa fa-circle-o text-green"></i> Pending Total Request </a></li>            
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-list text-red"></i>
            <span>Bought & Sold List</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?page=sold_property_list"><i class="fa fa-circle-o text-green"></i> Sold List </a></li>
            <li><a href="index.php?page=bought_property_list"><i class="fa fa-circle-o text-green"></i> Bought List </a></li>             
          </ul>
        </li>
<!--         <li class="treeview">
		
          <a href="#">
            <i class="fa fa-university"></i>
            <span> Counter Information</span>
            <span class="pull-right-container">
     
              <i class="fa fa-angle-left pull-right"></i>
         
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?page=add_counter"><i class="fa fa-circle-o"></i> Add Counter</a></li>
            <li><a href="index.php?page=manage_counter"><i class="fa fa-circle-o"></i> Manage Counter</a></li>         
          </ul>
        </li>

		<li class="treeview">
		
          <a href="#">
            <i class="fa fa-calendar"></i>
            <span> Trip Information</span>
            <span class="pull-right-container">
     
              <i class="fa fa-angle-left pull-right"></i>
         
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?page=add_trip"><i class="fa fa-circle-o"></i> Add Trip Info</a></li>
            <li><a href="index.php?page=manage_trip"><i class="fa fa-circle-o"></i> Manage Trip Info</a></li>         
          </ul>
        </li>
		
				
		<li class="treeview">
		
          <a href="#">
            <i class="fa fa-user-circle"></i>
            <span>Manage Counterman</span>
            <span class="pull-right-container">
     
              <i class="fa fa-angle-left pull-right"></i>
         
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?page=add_counterman"><i class="fa fa-circle-o"></i> Register New Counterman</a></li>
            <li><a href="index.php?page=manage_counterman"><i class="fa fa-circle-o"></i> Manage All Countermen</a></li>         
          </ul>
        </li>


		<li><a href="report.php"><i class="fa fa-bar-chart"></i> <span> View Report </span></a></li>
		<li><a href="#"><i class="fa fa-map-marker text-yellow"></i> <span> Map </span></a></li> -->
		
		
        <li class="header">SETTINGS</li>
        <li><a href="index.php?page=profile_update"><i class="fa fa-address-card-o text-green"></i> <span>Edit Profile</span></a></li>
        <li><a href="../logout.php?type=user"><i class="fa fa-sign-out text-red"></i> <span>Logout</span></a></li>
      </ul>
	  		
		<li class="treeview">
		
          <a href="#">
            <i class=""></i>
            <span></span>
            <span class="pull-right-container">
     
              <i class=""></i>
         
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../layout/top-nav.html"><i class=""></i> </a></li>
            <li><a href="../layout/boxed.html"><i class=""></i> </a></li>         
          </ul>
        </li>
		
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
<?php 
				  switch (@$_GET['page']) {
                        case "add_property": {
                                include("add_property.php");
                            }
                            break;
							
                        case "manage_property_request": {
                                include("manage_property_request.php");
                            }
                            break;
                        case "profile_update": {
                                include("profile_update.php");
                            }
                            break;

                        case "profile_view": {
                                include("profile_view.php");
                            }
                            break;

                        
                            case "property_list": {
                                include("property_list.php");
                            }
                            break;

                            case "sold_property_list": {
                                include("sold_property_list.php");
                            }
                            break;

                            case "bought_property_list": {
                                include("bought_property_list.php");
                            }
                            break;
                            
                            case "agent_assign": {
                                include("agent_assign.php");
                            }
                            break;

                            case "inspection_time": {
                                include("inspection_time.php");
                            }
                            break;

                            case "individual_property_request": {
                                include("individual_property_request.php");
                            }
                            break;

                            case "property_report": {
                                include("property_report.php");
                            }
                            break;

                            case "bought_property_report": {
                                include("bought_property_report.php");
                            }
                            break;


                            case "dashboard": {
                                include("dashboard.php");
                            }
                            break;

                       
                        default: {
                                include("dashboard.php");
								//echo "Dashboard";
                            }
                    }
					
				?>	
				
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer" style=" margin-left: 0px; position: fixed;right: 0;bottom: 0;left: 0;padding: 1rem;background-color: #efefef;
  text-align: center;">
   <div style="text-align:center;">
    <strong >Copyright &copy; 2018 <a href="http://www.softmaxbd.com/" target="_blank">Softmax Learning & Development Center</a>.</strong> All rights
    reserved.
	</div>
  </footer>


</div>
<!-- ./wrapper -->

</body>
</html>

<?php  
}
else
{
	 header('location:../login');
}
?>
