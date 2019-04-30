<?php
require("../db_connect/connection.php");
session_start();
		if(isset($_POST['btn']))
		{
			$login_type = $_POST['login_type'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			
			if($login_type == 'admin')


			{
				 $sql = $conn->prepare("SELECT * FROM admin_info WHERE email='$email'");
				 $sql->execute();
				 $value = $sql->fetch(PDO::FETCH_ASSOC);
				 //echo "<pre>";print_r($value);exit;
				if($value['password']==$password)
				{
					$_SESSION['admin_id'] = $value['admin_id'];
					$_SESSION['admin_name'] = $value['admin_name'];
					$_SESSION['email'] = $value['email'];
					$_SESSION['phone'] = $value['phone'];
					$_SESSION['password'] = $value['password'];
		            $_SESSION['img_url'] = $value['img_url'];
		                        
		            header('location:../admin/');
				}
				else
				{
					$sms = '<div class="alert alert-danger alert-dismissable message_timer"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Sorry! You have entered a wrong password.</strong> </div>';
				}
				
			} 
	
		elseif($login_type == 'user')
			{
				
				 $sql = $conn->prepare("SELECT * FROM user_info WHERE user_email='$email'");
				 $sql->execute();
				 $value = $sql->fetch(PDO::FETCH_ASSOC);
				 //echo "<pre>";print_r($value);exit;
				if($value['user_password']==$password && $value['active_status_user']==1)
				{
					$_SESSION['user_id'] = $value['user_id'];
					$_SESSION['user_name']     = $value['user_name'];
					$_SESSION['user_email']    = $value['user_email'];
					$_SESSION['user_address']     = $value['user_address'];
		            $_SESSION['user_mobile']  = $value['user_mobile'];
		            $_SESSION['user_img']  = $value['user_img'];
		            $_SESSION['user_nid']  = $value['user_nid'];
		                        
		            header('location:../user/');
				}
				
				elseif($value['user_password']==$password && $value['active_status_user']==0)
				{
					$sms = '<div class="alert alert-danger alert-dismissable message_timer"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Sorry! Your account has not been approved yet.</strong> </div>';
				}	
				
				elseif($value['user_password']==$password && $value['active_status_user']==2)
				{
					$sms = '<div class="alert alert-danger alert-dismissable message_timer"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Sorry! Your account has been temporarily blocked.</strong> </div>';
				}
				else
				{
					$sms = '<div class="alert alert-danger alert-dismissable message_timer"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Sorry! You have entered a wrong password.</strong> </div>';
				}
				
			}
	
	 	
	
		elseif($login_type == 'agent')
	
			{
				
				 $sql = $conn->prepare("SELECT * FROM agent_info WHERE agent_email='$email' or agent_id='$email' ");
				 $sql->execute();
				 $value = $sql->fetch(PDO::FETCH_ASSOC);
				 //echo "<pre>";print_r($value);exit;
				if($value['agent_password']==$password && $value['active_status_agent']==1)

				{
					$_SESSION['agent_id'] = $value['agent_id'];
					$_SESSION['agent_name']     = $value['agent_name'];
					$_SESSION['agent_email']    = $value['agent_email'];
		            $_SESSION['agent_mobile']  = $value['agent_mobile'];
		            $_SESSION['agent_img']  = $value['agent_img'];
		            $_SESSION['agent_nid']  = $value['agent_nid'];
		                        
		            header('location:../agent/');
				}
				elseif($value['agent_password']==$password && $value['active_status_agent']==0)
				{
					$sms = '<div class="alert alert-danger alert-dismissable message_timer"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Sorry! Your account has been blocked.</strong> </div>';
				}
				
				else
				{
					$sms = '<div class="alert alert-danger alert-dismissable message_timer"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Sorry! You have entered a wrong password.</strong> </div>';
				}
				
			} 
			
			else
			 {
					$sms = '<div class="alert alert-danger alert-dismissable message_timer"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Please! Select a Login Type</strong> </div>';
			 }
			 
			
		}
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Real Estate Management System</title>

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
		
		 <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
		<script src="assets/js/div_hide_timer.js"></script>

    </head>

    <body>

    	

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Real Estate Management System</strong></h1>
                        </div>						
                    </div>
					<div class="col-sm-6 col-sm-offset-3 "><h3 style="color:yellow; text-align: center;" ><?php if(isset($sms)) {echo $sms;} ?> </h3>	</div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Login to our site</h3>
                            		<p>Enter your username and password to log on:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Username</label>
			                        	<input type="text" name="email" placeholder="Email..." class="form-username form-control" id="form-username">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="password"  placeholder="Password..." class="form-password form-control" id="form-password">
			                        </div>
									
									<div style="margin-bottom: 25px">
									<select name="login_type" class="selectpicker form-password form-control">
                                   									
                                     <option>--------Select Login Type------</option>
                                     <option value="admin">Admin</option>
                                     <option value="user">User</option>
                                     <option value="agent">Agent</option>
                                    </select>
             
                                     </div>
			                        <button type="submit" name="btn" class="btn">Sign in!</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login" style="background: rgba(0, 0, 0, 0.4);">
                        	<h3 style="color: #ffffff;">If you are not registered yet, create an account <a style="color:#00ffa1" href="" class="" data-toggle="modal" data-target="#myModal">here!</a></h3>

                        </div>
                    </div>
                </div>
            </div>
            
        </div>

    </body>


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
        	
	          <a href="../index.php?page=user_registration" type="submit" class="btn btn-info btn-block">User</a>
	          <a href="../index.php?page=agent_registration" type="submit" class="btn btn-info btn-block">Agent</a>
			
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
</html>

