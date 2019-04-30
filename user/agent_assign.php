<?php
	$property_id = $_GET['property_id'];
	$sql = $conn->prepare("SELECT * FROM agent_assign,agent_info WHERE agent_info.agent_id=agent_assign.agent_id AND property_id='$property_id'");
	$sql->execute();
	$data = $sql->fetchAll();


	if (isset($_POST['add'])) {

 			$property_id = $_GET['property_id'];
 			$agent_id=$_POST['agent_id'];

 			if (!empty($agent_id)) {

 					$check = $conn->prepare("SELECT count(*) as total FROM agent_assign WHERE property_id='$property_id' AND agent_id='$agent_id'");
					$check->execute();
					$check_property_agent = $check->fetch(PDO::FETCH_ASSOC);

					$check = $conn->prepare("SELECT count(*) as total1 FROM agent_info WHERE 
						agent_id='$agent_id'");

					$check->execute();
					$check_agent = $check->fetch(PDO::FETCH_ASSOC);

					if ($check_property_agent['total']>=1) {

						function phpAlert($msg) {
	    				echo '<script type="text/javascript">alert("' . $msg . '")</script>';
						}
						phpAlert("Already this Agent is assigned for this property");			
						}

					elseif ($check_agent['total1']<=0) {

						function phpAlert($msg) {
	    				echo '<script type="text/javascript">alert("' . $msg . '")</script>';
						}
						phpAlert("Invalid Agent ID");			
						}

			else {
						$data1 = array($property_id,$agent_id);
			 			$assign_query="INSERT INTO agent_assign (property_id,agent_id) values(?,?)";
			 			$stmt1 = $conn->prepare($assign_query);
						$end1 = $stmt1->execute($data1);
					}
					


        	
		}
	}
	 elseif(isset($_POST['delete']))
		 {
					
			   $assign_id = $_POST['assign_id'];	
			   $query = "DELETE FROM `agent_assign` WHERE assign_id='$assign_id'";
			   $stmt = $conn->prepare($query);
			   $end = $stmt->execute();

		}

		//  For Auto Reload
		$sql = $conn->prepare("SELECT * FROM agent_assign,agent_info WHERE agent_info.agent_id=agent_assign.agent_id AND property_id='$property_id'");
		$sql->execute();
		$data = $sql->fetchAll();

?>	
		
		<!-- Start Design of Manage Admin Pannel -->
		<div class="container">
		<h3 style="text-align: center;"><b>Assign Agent for this property</b></h3>
	</div>
	
	<div class="panel panel-default">

			<span class="col-md-3">
			<div class="panel-body">

			<div class="input-bar">
			        <div class="input-bar-item width100">
			          <form method="post" id="form">
			             <div class="form-group">
			                <input type="text" class="form-control width100" name="agent_id" id="agent_id" placeholder="Input here new agent id">
			            </div>
			          
			        </div>
			        <div class="input-bar-item">
			          <button type="submit" class="btn btn-info" name="add" >Add</button>
			          <input type="hidden" name="property_id" value="<?php echo $value['property_id']; ?>">
			        </div>
			   </form>
			</div>
		<h4>For agent list click <a href="../index.php?page=agent_list" target="_blank">here</a></h4>
		</div>
		</span>

		<span class="col-md-9">
		<div class="panel-body">
			<div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr class="info">
                        	<th>Serial</th>
                            <th>Agent Name</th>
                            <th>ID No</th>
                            <th>Mobile No</th>                                      
                            <th>Action</th>
                        </tr>
                    </thead>
					
                    <tbody>	
                    		<?php
                    			$i=1;
							    foreach($data as $value)
							    {
							  ?>

							<form method="post">
                                <tr class="odd gradeX">
                                	<td> <h4> <?php echo  $i; ?>  </h4></td>
                                    <td> <h4> <?php echo  $value['agent_name']; ?> </h4></td>
                                    <td> <h4> <?php echo  $value['agent_id']; ?> </h4></td>
                                    <td> <h4> <?php echo  $value['agent_mobile']; ?> </h4></td>

									<td class="center">
												<button class="btn btn-danger" type="submit" name="delete">
													<span class="glyphicon glyphicon-trash"></span>
												</button>
         										<input type="hidden" name="assign_id" value="<?php echo $value['assign_id']; ?>">
									</td>							
                                </tr>
							</form>
						<?php
						$i++;
							}
						?>
						
                    </tbody>
                </table>
            </div>
		</div>
	</span>
</div>
	<style type="text/css">
		.error{color: red;}
	</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#form").validate({
      rules:{

	        agent_id: {
	          required: true,
	          number:true,

	        }

        },
      messages:{
        agent_id:"Please Enter Agent ID",
      }

    });
    
  });
</script>