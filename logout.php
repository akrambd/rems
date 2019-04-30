
<?php
session_start();
switch($_GET['type'])
{
case 'user':
	unset($_SESSION['user_id']);
	unset($_SESSION['user_name']);
	unset($_SESSION['user_email']);
	unset($_SESSION['user_mobile']);
	unset($_SESSION['user_img']);
	
	header('location:index.php');
	break;

case 'admin':
	unset($_SESSION['admin_id']);
	unset($_SESSION['admin_name']  );
	unset($_SESSION['email']  );
	unset($_SESSION['img_url']);
	header('location:index.php');
	break;

case 'agent':
	unset($_SESSION['agent_id']);
	unset($_SESSION['agent_name']);
	unset($_SESSION['agent_email']);
	unset($_SESSION['agent_mobile']);
	unset($_SESSION['agent_img']);
	
	header('location:index.php');
	break;
}


  
 
 