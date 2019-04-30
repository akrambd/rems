<?php 
     if (!empty($_SESSION)) {
      if ($v['user_id']!= $_SESSION['user_id'] && $v['active_status_property']==1) {?>
      
      <a class="btn btn-primary" href="index.php?page=property-request&user_id=<?php echo $v['user_id']; ?>&property_id=<?php echo $v['id']; ?>">Send Request</a>
      <!-- <input type="hidden" name="property_id" value="<?php echo $value['id']; ?>" -->

      <?php
      
       }
       elseif ($v['active_status_property']==2) {
        echo '<div class="alert alert-danger"><strong>Alert!</strong> Already sold .....</div>';
      }
     }

      else{
        echo '<div class="alert alert-warning alert-dismissable"><strong>Alert!</strong> You must have login first .....</div>';
 
}?>



      <?php 
      if (!empty($_SESSION['user_id'])) 
        {?>
      
        <a class="btn btn-primary" href="index.php?page=property-request&user_id=<?php echo $v['user_id'];?>&property_id=<?php echo $v['id']; ?>">Send Request</a>
        <?php
      }else{
        echo '<div class="alert alert-warning alert-dismissable"><strong>Alert!</strong> You must have login first .....</div>';
      }?>