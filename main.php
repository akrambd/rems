  
	<script src="assets/bootstrap/js/bootstrap.js"></script>
  <script src="assets/script.js"></script>



<!-- Owl stylesheet -->
<link rel="stylesheet" href="assets/owl-carousel/owl.carousel.css">
<link rel="stylesheet" href="assets/owl-carousel/owl.theme.css">
<script src="assets/owl-carousel/owl.carousel.js"></script>

<body>
<div class="slider">
			<div class="callbacks_container">
				<ul class="rslides" id="slider">
					<li>
						<div class="slider-img">
							<img src="images/banner7.jpg" class="img-responsive" alt="Real Plot">
						</div>
					</li>
					<li>
						<div class="slider-img">
							<img src="images/banner9.jpg" class="img-responsive" alt="Real Plot">
						</div>

					</li>
					<li>
						<div class="slider-img">
							<img src="images/banner8.jpg" class="img-responsive" alt="Real Plot">
						</div>

					</li>
					<li>
						<div class="slider-img">
							<img src="images/banner10.jpg" class="img-responsive" alt="Real Plot">
						</div>

					</li>

				</ul>
				
			</div>
			<div class="clearfix"></div>
		</div>
		<!--//Slider-->
	</div>
<!--//Header-->

<?php

	$area = $conn->prepare("SELECT DISTINCT area FROM property_info");
	$area->execute();
	$area_value = $area->fetchAll();

?>	



						            <!--Start Search Filter-->
            <div class="container">
                    <form action="index.php?page=search" method="POST" >
                        <div  class="form-group">
										<input list="browsers" name="area" class="form-control" placeholder="Plz Select/Type Your Area" style="width:76%;float:left;height:45px;margin-right:5px;">
									<div class="search-btn">
                                    <button type="submit" class="btn btn-outline-success btn-lg" name="btn">SEARCH</button>
                                  
                            </div>
                        </div>
                    </form>
				</div>
					<!--End Search Filter-->	

		<!-- banner -->


<div class="container">
  <div class="properties-listing spacer"> <a href="buysalerent.php" class="pull-right viewall">View All Listing</a>
    <center><h2>Featured Properties</h2></center>
    <div id="owl-example" class="owl-carousel">
          <?php


    $query = $conn->prepare("SELECT * FROM property_info,property_type_list WHERE property_info.property_type=property_type_list.property_type_id AND active_status_property!=0");
    $query->execute();
    $value = $query->fetchAll();


   if($query->rowCount()>0)
  {
    foreach($value as $v)
    {
  ?>



      
      <div class="properties">
        <div class="image-holder"><a href="index.php?page=property-detail&id=<?php echo $v['id']; ?>"><img src="user/<?php echo  $v['img_1']; ?>" class="img-responsive" alt="properties"></a>
          <?php if ($v['active_status_property']==2){?>
          <div class="status sold" style="padding: 9px; font-size: 26px";><?php echo 'Sold'; ?></div>
        <?php }
        
        $added_date=Date('d-m-y', strtotime($v['property_added_date']));
        $end_date  = date("d-m-y", strtotime($added_date.' +3 days'));

        $Today=date('d-m-y');
        
         if ($v['active_status_property']==1 && $Today<=$end_date){?>
          <div class="status new" style="padding: 9px; font-size: 26px";><?php echo 'New'; ?></div>
        <?php }?>


        </div>
        <h4><a href="index.php?page=property-detail&id=<?php echo $v['id']; ?>"><?php echo $v['property_type_name'];?></a></h4>
        <p class="price">Price:<?php if ($v['active_status_property']=='2') {echo $v['selling_price'];} else { echo $v['price']; } ?> Taka</p>
            

            <!-- For number of Bedroom, bathroom, kitchen,, parking -->
        <?php if ($v['property_type']!='land') {?>
        

        <h6><i class="fa fa-bed fa-lg" style="color: green;" data-toggle="tooltip" data-placement="bottom" title="Bed Room"></i>&nbsp;<?php echo $v['bedroom'];?>&nbsp;
        <i class="fa fa-bath fa-lg" style="color:green" data-toggle="tooltip" data-placement="bottom" title="Bath Room"></i>&nbsp;</i><?php echo $v['bathroom'];?>&nbsp;
        <i class="fa fa-cutlery fa-lg" style="color: green;" data-toggle="tooltip" data-placement="bottom" title="Kitchen"></i> &nbsp;<?php echo $v['kitchen'];?>&nbsp;
        <i class="fa fa-car fa-lg" style="color: green;" data-toggle="tooltip" data-placement="bottom" title="Parking"></i> &nbsp;<?php echo $v['parking'];?>&nbsp;
        <?php } else?>&nbsp;
        </h6>
        <a class="btn btn-green snow" href="index.php?page=property-detail&id=<?php echo $v['id']; ?>">View Details</a>

    </div>

  <?php
       }
  }
  else{
    ?>  

          <strong>Sorry!</strong> Empty list ................

    <?php
  }
       ?>

        
   
      </div> 
    </div>
  </div>
</body>
				<!-- appartment list End -->