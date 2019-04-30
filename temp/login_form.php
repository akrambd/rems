<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>another login panel</title>
  
  
  
      <link rel="stylesheet" href="css/login.css">
      <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
      <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />


  
</head>

<body style="background: url(https://subtlepatterns.com/patterns/tweed.png);">

<div class="navbar">
  <?php
    include('navbar.php');
  ?>
</div>
 <form method="POST" action="login.php" style="margin-top: 20%;">
  <div class="loginpanel">
  <div class="txt">
    <input id="email" name="email" type="text" placeholder="Enter your Email here..." />
    <label for="email" class="entypo-user" ></label>
  </div>
  <div class="txt">
    <input id="password" name="password" type="password" placeholder="Password..." />
    <label for="password" class="entypo-lock" ></label>
  </div>
  <div class="buttons">
    <input type="submit" value="Login"  name="login-form" />
  </form>
    <span>
      <a href="registration_form.php" class="entypo-user-add register">Register</a>
    </span>
  </div>
</div>  

</body>

</html>
