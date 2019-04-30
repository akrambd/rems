<?php

		 
		 $sqlSAdmin = $conn->prepare("SELECT * FROM sub_admin_info where `s_active_status1`='1' ORDER BY `s_admin_id` ASC");
		 $sqlSAdmin->execute();
		 $dataSAdmin = $sqlSAdmin->fetchAll();



		 
		 if(isset($_POST['block']))
		 {
			   $id = $_POST['s_admin_id'];			
			   $query = "UPDATE `sub_admin_info` SET `s_active_status1`='2' where s_admin_id='$id'";
				$stmt = $conn->prepare($query);
				$end = $stmt->execute();
				if($end)
					{
					$sql = $conn->prepare("SELECT * FROM sub_admin_info WHERE s_admin_id='$id' ");
					$sql->execute();
					$data = $sql->fetch(PDO::FETCH_ASSOC);
                    $user_name= $data['s_admin_name'];										
                    $user_email= $data['s_email'];					
						

					
		$sms = '<div class="alert alert-danger alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <h2 style="text-align: center; font-weight: bolder;">Account blocked!</h2></strong> </div>';
		}else{
		
		$sms = '<div class="alert alert-danger alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <h2 style="text-align: center; font-weight: bolder;">Account not blocked!</h2></strong> </div>';
		}
	}

	elseif(isset($_POST['delete']))
		{
					
		$id = $_POST['s_admin_id'];                
		$sql = $conn->prepare("SELECT * FROM sub_admin_info WHERE s_admin_id='$id' ");
		$sql->execute();
		$data = $sql->fetch(PDO::FETCH_ASSOC);
  			$_SESSION['s_admin_name']= $data['s_admin_name'];										
            $_SESSION['s_email']= $data['s_email'];
			   

			   $s_admin_name= $_SESSION['s_admin_name'];
			   $s_email= $_SESSION['s_email'];
	
			   $query = "DELETE FROM `sub_admin_info` where s_admin_id='$id'";
			   $stmt = $conn->prepare($query);
			   $end = $stmt->execute();
			if($end && $data)
			{
						

					
		$sms = '<div class="alert alert-success alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <h2 style="text-align: center; font-weight: bolder;">Account deleted!</h2></strong> </div>';
		}else{
		$sms = '<div class="alert alert-success alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <h2 style="text-align: center; font-weight: bolder;">Account not deleted!</h2></strong> </div>';
		}
		}   
		 
		 // For auto reload page or show data without reload page
		 $sqlSAdmin = $conn->prepare("SELECT * FROM sub_admin_info where `s_active_status1`='1' ORDER BY `s_admin_id` ASC");
		 $sqlSAdmin->execute();
		 $dataSAdmin = $sqlSAdmin->fetchAll();
		 
		 
?>


		<script>
		  function confirmation() {
		  return confirm('Are you sure you want to do this?');
			}
		</script>
		
<!-- content starts -->		
		
<div id="page-inner">
     <div class="row">
         <div class="col-md-12">
          <h2>Manage Sub-Admin</h2>		  
                      
         </div>
     </div>
	  
      <!-- /. ROW  -->
      <hr />
	 <?php if(isset($sms)){echo $sms;} ?>
			 <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
             <div class="panel panel-default">
             <div class="panel-heading" style="text-align:center; font-weight: bolder; font-size: 18px;">Active Sub-Admin list  </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
										  <th>Sl.</th>
										  <th>Name</th>                                          
										  <th>Email</th>
										  <th>Contact No</th>
										  <th>Image</th>                                                    
										  <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$i=1;
									foreach($dataSAdmin as $value)
									{
									?>
									
									<form method="post">
                                        <tr>
                                            	<td> <h4><?php echo $i; ?></h5></td>                                           
												<td> <h5><?php echo $value['s_admin_name']; ?></h5></td>
                                           
												<td><h5><?php echo $value['s_email']; ?></h5></td>                                           
											  	<td><h5><?php echo  $value['s_phone']; ?></h5></td>                                                                                    
											  	<td><h5><img src="<?php echo  $value['s_img_url']; ?>" height="80" width="80"> </h5></td>                                                                                  
       

											 <td class="center">
											  <?php 
											  
											  if($value['s_active_status1'] == 1) { ?>
											  
												<button class="btn btn-danger" type="submit" name="delete"  onclick="return confirmation()">
													<span class="glyphicon glyphicon-trash"></span>
												</button>         
												
												<button class="btn btn-warning" type="submit" name="block"  onclick="return confirmation()">
													<span class="glyphicon glyphicon-off"></span>  
												</button>
												
												<input type="hidden" name="s_admin_id" value="<?php echo $value['s_admin_id']; ?>">	
												
						
											  <?php }?>
											  
											 </td>
                                        </tr>
										
									</form>
									<?php
									$i++;
									}
									?>
									                                           
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
              </div>
				 
				 
				 
               
    </div>
             
 </div>
