<?php
require("../db_connect/connection.php");
session_start(); 
if($_SESSION['email']!=null)
{
		 $id = $_SESSION['agent_id'];
		 $sqlCounter = $conn->prepare("select * from tbl_counter_info where agent_id='$id'");
		 $sqlCounter->execute();
		 $valueCounter = $sqlCounter->fetchAll();
		 //echo "<pre>";print_r($valueCounter);exit;
		 
		 $sqlBus = $conn->prepare("select * from tbl_bus_info where agent_id='$id'");
		 $sqlBus->execute();
		 $valueBus = $sqlBus->fetchAll();
         //echo "<pre>";print_r($valueBus);exit;		 

         $sqlCity = $conn->prepare("select * from tbl_cities");
		 $sqlCity->execute();
		 $valueCity = $sqlCity->fetchAll();		 
		 
		 $sqlAgent= $conn->prepare("select * from tbl_agent_info where agent_id='$id'");
		 $sqlAgent->execute();
		 $valueAgent = $sqlAgent->fetch(PDO::FETCH_ASSOC);
		// echo "<pre>";print_r($valueAgent);exit;
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Agent Panel</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/css/AdminLTE.css">
  <link rel="stylesheet" href="assets/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
 <! <script src="assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
 <!<script src="assets/bower_components/fastclick/lib/fastclick.js"></script>
  <script src="assets/js/adminlte.min.js"></script>
 <!<script src="assets/js/demo.js"></script>  
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>

</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php?page=dashboard" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>AGENT</b> </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Agent Panel</b></span>
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

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../<?php echo $_SESSION['img_agent'];?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['name'];?> <i class="fa fa-angle-down"></i> </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../<?php echo $_SESSION['img_agent'];?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['name'];?> - Agent
                  <small><?php echo $_SESSION['company'];?></small>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="index.php?page=agent_profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../logout.php?type=agent" class="btn btn-default btn-flat">Sign out</a>
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
          <img src="../<?php echo $_SESSION['img_agent'];?>" class=" img-thumbnail" alt="User Image">
        </div>
        <div class="pull-left info" style="margin-left: 2%;">
          <h4 style="font-weight:bolder;"><?php echo $_SESSION['name'];?> </h4>
          <p> <?php echo $_SESSION['company'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
	  <br />

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
		<li ><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-bus"></i>
            <span> Bus Information</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?page=add_bus"><i class="fa fa-circle-o"></i> Add Bus</a></li>
            <li><a href="index.php?page=manage_bus"><i class="fa fa-circle-o"></i> Manage Bus</a></li>         
          </ul>
        </li>
        <li class="treeview">
		
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
		<li><a href="#"><i class="fa fa-map-marker text-yellow"></i> <span> Map </span></a></li>
		
		
        <li class="header">SETTINGS</li>
        <li><a href="index.php?page=update_agent_profile"><i class="fa fa-address-card-o text-green"></i> <span>Edit Profile  </span></a></li>
        <li><a href="../logout.php?type=agent"><i class="fa fa-sign-out text-red"></i> <span>Logout</span></a></li>
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
                        case "add_bus": {
                                include("add_bus.php");
                            }
                            break;
							
						case "update_agent_profile": {
                                include("update_agent_profile.php");
                            }
                            break;						
						
						case "agent_profile": {
                                include("agent_profile.php");
                            }
                            break;
							
						case "manage_bus": {
                                include("manage_bus.php");
                            }
                            break;
							
					    case "update_bus": {
                                include("update_bus.php");
                            }
                            break;

                        case "add_counter": {
                                include("add_counter.php");
                            }
                            break;
							
						case "manage_counter": {
                                include("manage_counter.php");
                            }
                            break;
							
					    case "update_counter": {
                                include("update_counter.php");
                            }
                            break;		   
					    case "add_counterman": {
                                include("add_counterman.php");
                            }
                            break;	    
							
						case "report": {
                                include("report.php");
                            }
                            break;				    
							
						case "manage_counterman": {
                                include("manage_counterman.php");
                            }
                            break;							
							
						case "update_counterman": {
                                include("update_counterman.php");
                            }
                            break;

                        case "add_trip": {
                                include("add_trip.php");
                            }
                            break;
							
						 case "manage_trip": {
                                include("manage_trip.php");
                            }
                            break;	
							
						case "update_trip": {
                                include("update_trip.php");
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

  <footer class="main-footer">
   <div style="text-align:center;">
    <strong >Copyright &copy; 2017 <a href="#">Softmax Learning & Development Center</a>.</strong> All rights
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
	 header('location:../error.php');
}
?>
