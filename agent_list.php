<?php
    $sql = $conn->prepare("SELECT * FROM `agent_info` WHERE active_status_agent='1'");
    $sql->execute();
    // $agent_value=$sql->fetch(PDO::FETCH_ASSOC);
    $value = $sql->fetchAll();

?>
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<div class="container">
<div class="spacer agents">

<div class="row">
  <?php if($sql->rowCount()>0){
    foreach ($value as $agent_value) {

  ?>
  <div class="col-lg-8  col-lg-offset-2 col-sm-12">
      <!-- agents -->
      <div class="row">
        <div class="col-lg-2 col-sm-2 "><a href="#"><img src="<?php echo $agent_value['agent_img']?>" class="img-responsive"  alt="agent image" ></a></div>
        <div class="col-lg-7 col-sm-7 "><h4 style="margin-bottom: 14px;"><?php echo $agent_value['agent_name']?></h4>
          <p  style="margin-bottom: 0;"><i class="fa fa-id-badge"></i>&nbsp;ID Number:&nbsp;<?php echo $agent_value['agent_id']?> </p>
          <p><i class="fa fa-building-o"></i>&nbsp;Company Name:&nbsp;<B style="color:blue;"><?php echo $agent_value['agent_company']?></B>  </p>
        </div>
        <div class="col-lg-3 col-sm-3 "><span class="glyphicon glyphicon-envelope"></span> <a href=""><?php echo $agent_value['agent_email']?></a><br>
        <span class="glyphicon glyphicon-earphone"></span><?php echo $agent_value['agent_mobile']?></div>
      </div>
      <!-- agents -->
  </div>
      <?php } 
    }else{
        ?>
        <div class="col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
        <div class="alert alert-danger alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Sorry!</strong>  Agent List is Empty ......
        </div>
      </div>
      <?php }?>
      
     
     
  <!-- </div> -->
</div>


</div>
</div>
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
<br><br><br><br><br><br><br><br><br><br><br><br><br>