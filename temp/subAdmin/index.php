<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require("../db_connect/connection.php");
require_once "../phpmailer/PHPMailerAutoload.php";

session_start();
if($_SESSION['s_email']!=null)
{
	
	     $id = $_SESSION['s_admin_id'];
		 $sql= $conn->prepare("SELECT * FROM sub_admin_info WHERE s_admin_id='$id'");
		 $sql->execute();
		 $data = $sql->fetch(PDO::FETCH_ASSOC);




         $sqlSubAdmin= $conn->prepare("SELECT * FROM sub_admin_info WHERE s_admin_id='$id'");
         $sqlSubAdmin->execute();
         $valueSubAdmin = $sqlSubAdmin->fetch(PDO::FETCH_ASSOC);



	
?>


<!DOCTYPE html>
<html >
<head>
     <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/custom.css" rel="stylesheet" />
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

  <!-- <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
 -->  <link rel="stylesheet" href="../assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../assets/css/AdminLTE.css">
  <!-- <link rel="stylesheet" href="assets/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
  
  <script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../assets/js/adminlte.min.js"></script>
   
   
   <script src="../assets/js/jquery-1.10.2.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.metisMenu.js"></script>
    <script src="../assets/js/custom.js"></script>
	
	
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
              <!--   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> -->
                <a class="navbar-brand" href="index.php">Main admin</a> 
            </div>


            
            
            <div style="color: white; padding: 15px 50px 5px 50px;float: right;font-size: 16px;">
                    
                    <i class="fa fa-user "></i>&nbsp;<?php echo $_SESSION['s_admin_name'];?>  
                    <a href="../logout.php?type=admin" class="btn btn-danger square-btn-adjust">Logout</a> </div>
            <div style="padding: 15px 50px 5px 50px;float: right;font-size: 16px;"><a href="../index.php" class="btn btn-success square-btn-adjust">Home</a></div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src=" <?php echo $_SESSION['s_img_url'];?> " height="150" width="150" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a  href="index.php?page=dashboard"><i class="fa fa-dashboard fa-2x"></i> Dashboard</a>
                    </li>
                    
                    <li>
                        <a href="#"><i class="fa fa-cog fa-2x"></i>Setting<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="index.php?page=view-admin">View Profile</a>
                            </li>
                            <li>
                                <a href="index.php?page=admin_profile_update">Edit Profile</a>
                            </li>                           
                        </ul>
                    </li>


					<li>
                        <a href="#"><i class="fa fa-user fa-2x"></i>Manage Sub-admin<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="index.php?page=create_sub_admin">Create Admin</a>
                            </li>
                            <li>
                                <a href="index.php?page=manage_sub_admin">Manage Admin</a>
                            </li>                           
                        </ul>
                     </li>  
					  
                    <li>
                        <a href="#"><i class="fa fa-bell fa-2x"></i>Manage User<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="index.php?page=request_user">Request</a>
                            </li>
                            <li>
                                <a href="index.php?page=active_user">Active</a>
                            </li>
                            <li>
                                <a href="index.php?page=block_user">Block</a>
                            </li>
                        </ul>
                    </li> 
					<li>
                        <a   href="../logout.php?type=admin"><i class="fa fa-sign-out fa-2x"></i> Logout</a>
                    </li>	
                      	
                  
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
		
		       <?php 
				  switch (@$_GET['page']) {

                            case "create_sub_admin": {
                                include("create_sub_admin.php");
                            }
                            break;


                            case "admin_profile_update": {
                                include("subAdmin_profile_update.php");
                            }
                            break;
							
							 case "manage_admin": {
                                include("manage_admin.php");
                            }
                            break;			 
							
							case "request_user": {
                                include("request_user.php");
                            }
                            break;

                            case "active_user": {
                                include("active_user.php");
                            }
                            break;
							
							case "block_user": {
                                include("block_user.php");
                            }
                            break;

                            
							
                         default: {
                                include("dashboard.php");
                            }
                    }
				
				?>	

       </div>
         <!-- /. PAGE WRAPPER  -->
   
</body>
</html>

</html>

<?php  
}
else
{
	 header('location:../login/index.php');
}
?>





