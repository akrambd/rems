<?php
if(isset($_POST['btn']))
  {
    $area = $_POST['area'];
    $sql = $conn->prepare("SELECT * FROM property_info,property_type_list WHERE property_info.property_type=property_type_list.property_type_id AND area LIKE '%$area%' AND active_status_property='1'");
    $sql->execute();
    $value = $sql->fetchAll();

  }
 
  // $area = $conn->prepare("select DISTINCT area from property_info");
  // $area->execute();
  // $area_value = $area->fetchAll();



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
    <form action="index.php?page=search" method="POST" class="form form-group">
            <input type="text" class="form-control" name="area" placeholder="Search by Name/Address">
            <!-- <button class="btn btn-primary">Find Now</button> -->
            <button type="submit" class="btn btn-primary" name="btn">SEARCH</button>
    </form>
  </div>


<!-- 
<div class="hot-properties hidden-xs">
<h4>Hot Properties</h4>
<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/1.jpg" class="img-responsive img-circle" alt="properties"></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p> </div>
              </div>
<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/1.jpg" class="img-responsive img-circle" alt="properties"></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p> </div>
              </div>

<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/1.jpg" class="img-responsive img-circle" alt="properties"></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p> </div>
              </div>

<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/1.jpg" class="img-responsive img-circle" alt="properties"></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p> </div>
              </div>

</div> -->


</div>

<div class="col-lg-9 col-sm-8">
<div class="sortby clearfix">
<!-- <div class="pull-left result">Showing: 12 of 100 </div> -->
  <div class="pull-right">
  <select class="form-control">
  <option disabled="">Sort by</option>
  <option>Price: Low to High</option>
  <option>Price: High to Low</option>
</select></div>

</div>
<div class="row">




      <?php


  // $id = $conn->prepare("SELECT * FROM house_info");
  // $id->execute();
  // $id_value = $id->fetchAll();


  if($sql->rowCount()>0)
  {
    foreach($value as $v)
    {
  ?>
     <!-- properties -->
      <div class="col-lg-4 col-sm-6">
      <div class="properties">
        <div class="image-holder"><a href="index.php?page=property-detail&id=<?php echo $v['id']; ?>"><img src="user/<?php echo  $v['img_1']; ?>" class="img-responsive" alt="properties"></a>
          <?php if ($v['active_status_property']==2){?>
          <div class="status sold" style="padding: 9px";><?php echo 'Sold'; ?></div>
        <?php }?>
        </div>
        <h4><a href="index.php?page=property-detail&id=<?php echo $v['id']; ?>"><?php echo $v['property_type_name']; ?></a></h4>
        <p class="price">Price:<?php echo $v['price']; ?> Taka</p>

        <div>
        <h6>
        <i class="fa fa-bed fa-lg" style="color: green;" data-toggle="tooltip" data-placement="bottom" title="Bed Room"></i>&nbsp;<?php echo $v['bedroom'];?>&nbsp;
        <i class="fa fa-bath fa-lg" style="color:green" data-toggle="tooltip" data-placement="bottom" title="Bath Room"></i>&nbsp;<?php echo $v['bathroom'];?>&nbsp;
        <i class="fa fa-cutlery fa-lg" style="color: green;" data-toggle="tooltip" data-placement="bottom" title="Kitchen"></i>&nbsp;<?php echo $v['kitchen'];?>&nbsp;
        <i class="fa fa-car fa-lg" style="color: green;" data-toggle="tooltip" data-placement="bottom" title="Parking"></i> &nbsp;<?php echo $v['parking'];?>&nbsp;
        </h6>
        </div>

        <a class="btn btn-primary" href="index.php?page=property-detail&id=<?php echo $v['id']; ?>">View Details</a>


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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>