<?php
    $sql = $conn->prepare("SELECT * FROM `property_info` WHERE 1 AND active_status_property='2'");
    $sql->execute();
    $value = $sql->fetchAll();



if(isset($_POST['btn']))
  {
    $area = $_POST['area'];
    $sql1 = $conn->prepare("SELECT * FROM `property_info` WHERE`area`LIKE '%$area%' AND active_status_property='2'");
    $sql1->execute();
    $value1 = $sql1->fetchAll();

  }



?>
    
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $(".scroll").click(function(event){   
      event.preventDefault();
      $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
    });
  });
</script>
<!-- start-smoth-scrolling -->



<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 ">

  <div class="search-form">
    <h4><span class="glyphicon glyphicon-search"></span> Search of Properties</h4>
    <form action="index.php?page=sold_property" method="POST" class="form form-group">
            <input type="text" class="form-control" name="area" placeholder="Search by Name/Address">
            <!-- <button class="btn btn-primary">Find Now</button> -->
            <button type="submit" class="btn btn-primary" name="btn">SEARCH</button>
    </form>
  </div>
</div>

<div class="col-lg-9 col-sm-8">
<div class="sortby clearfix">
<!-- <div class="pull-left result">Showing: 12 of 100 </div> -->
  <div class="pull-right">
  <select class="form-control">
  <option>Sort by</option>
  <option>Price: Low to High</option>
  <option>Price: High to Low</option>
</select></div>

</div>
        <div class="row">

      <?php

  if($sql->rowCount()>0)
  {
    foreach($value as $v)
    {
  ?>
     <!-- properties -->

      <div class="col-lg-4 col-sm-6">
        <div class="properties">
          <div class="image-holder"><img src="user/<?php echo  $v['img_1']; ?>" class="img-responsive" alt="properties">
            <div class="status sold" style="padding: 9px; font-size: 26px";><?php echo 'Sold';?></div>
            <!-- There is no condition for sold -->
          </div>
            <h4><a href="index.php?page=property-detail&id=<?php echo $v['id']; ?>"><?php echo $v['property_type']; ?></a></h4>
            <p class="price">Price:<?php echo $v['price']; ?> Taka</p>

            <?php if ($v['property_type']!='land') {?>
            

            <h6><i class="fa fa-bed fa-lg" style="color: green;" data-toggle="tooltip" data-placement="bottom" title="Bed Room"></i>&nbsp;<?php echo $v['bedroom'];?>&nbsp;
            <i class="fa fa-bath fa-lg" style="color:green" data-toggle="tooltip" data-placement="bottom" title="Bath Room"></i>&nbsp;</i><?php echo $v['bathroom'];?>&nbsp;
            <i class="fa fa-cutlery fa-lg" style="color: green;" data-toggle="tooltip" data-placement="bottom" title="Kitchen"></i> &nbsp;<?php echo $v['kitchen'];?>&nbsp;
            <i class="fa fa-car fa-lg" style="color: green;" data-toggle="tooltip" data-placement="bottom" title="Parking"></i> &nbsp;<?php echo $v['parking'];?>&nbsp;
            <?php } else?>&nbsp;
            </h6>
            <a class="btn btn-green snow" href="index.php?page=property-detail&id=<?php echo $v['id']; ?>">View Details</a>
        </div>
      </div>
      <!-- properties -->


                <?php
       }
  }
  else{
    ?>  
      <div class="col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
        <div class="alert alert-danger alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Sorry!</strong>  Property not found on this location ................
        </div>
      </div>
    <?php
  }
       ?>
</div>
</div>
</div>
</div>
</div>