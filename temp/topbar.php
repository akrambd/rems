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
								<h1><a class="navbar-brand" href="index.php">Real<span style="color:darkblue;">Estate</span></a></h1>
							</div>
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
								<nav class="linkEffects linkHoverEffect_12">
									<ul>

										<li><a class="active" href="index.php"><span>Home</span></a></li> 
										<li><a class="scroll" href=""><span>About</span></a></li> 
										<li><a class="scroll" href="index.php?page=search"><span>For Sell</span></a></li> 
										<li><a class="scroll" href="index.php?page=sold_property"><span>Sold</span></a></li>
										<li><a class="scroll" href=""><span>Contact</span></a></li>

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
											<li style="width: 40px; height: 40px;"><img src="admin/<?php echo $_SESSION['img_url'];?>" class="img-circle" alt="User Image" style="width: 30px; height: 30px";></li>
										<li><span><?php echo $_SESSION['admin_name']?></span></li>
										</a>

										
          								
        								
										<li><a href="logout.php?type=admin"><span>logout</span></a></li> 
										
										<?php
										}
										else 
										{?>
										<li><a href="index.php?page=registration"><span>Registration</span></a></li>
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