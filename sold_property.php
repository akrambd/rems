<?php
    $sql = $conn->prepare("SELECT * FROM property_info,property_type_list WHERE property_info.property_type=property_type_list.property_type_id AND active_status_property='2'");
    $sql->execute();
    $value = $sql->fetchAll();



if(isset($_POST['btn']))
  {
    $area = $_POST['area'];
    $sql = $conn->prepare("SELECT * FROM property_info, property_type_list WHERE property_info.property_type=property_type_list.property_type_id AND area LIKE '%$area%' AND active_status_property='2'");
    $sql->execute();
    $value = $sql->fetchAll();

  }

?>
    <!-- using for sorting -->
<link rel="stylesheet" type="text/css" href="css/sortingbox.css">
    <!-- using for sorting -->
<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 ">

  <div class="search-form">
    <h4><span class="glyphicon glyphicon-search"></span> Search of Properties</h4>
    <form action="index.php?page=sold_property" method="POST" class="form form-group">
            <input type="text" class="form-control" name="area" placeholder="Search by Address" required="" >
            <!-- <button class="btn btn-primary">Find Now</button> -->
            <button type="submit" class="btn btn-primary" name="btn">SEARCH</button>
    </form>
  </div>

</div>

<!-- <script src="js/jquery-1.12.0.min.js"></script> -->
<!-- <script src="js/bootstrap.min.js"></script> -->
<div class="col-lg-9 col-sm-8">
<div class="sortby clearfix">
<!-- <div class="pull-left result">Showing: 12 of 100 </div> -->
    <div class="pull-right">
      <select class="form-control b-select">
      <option>Sort by</option>
      <option data-sort="price:asc">Price: Low to High</option>
      <option data-sort="price:desc">Price: High to Low</option>
      </select>
    </div>

</div>

<div class="boxes row">




      <?php

  if($sql->rowCount()>0)
  {
    foreach($value as $v)
    {
  ?>
      <div class="col-lg-4 col-sm-6" data-price="<?php echo $v['price']; ?>">
      <div class="properties">
        <div class="image-holder"><img src="user/<?php echo  $v['img_1']; ?>" class="img-responsive" alt="properties">
        <?php if ($v['active_status_property']==2){?>
          <div class="status sold" style="padding: 9px; font-size: 26px";><?php echo 'Sold'; ?></div>
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
        <a class="btn btn-green snow" href="index.php?page=property-detail&id=<?php echo $v['id']; ?>">View Details</a>


      </div>
      </div>


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

<script type="text/javascript">
  
  (function($) {
  "use strict";

  $.fn.numericFlexboxSorting = function(options) {
    const settings = $.extend({
      elToSort: ".boxes div"
    }, options);

    const $select = this;
    const ascOrder = (a, b) => a - b;
    const descOrder = (a, b) => b - a;

    $select.on("change", () => {
      const selectedOption = $select.find("option:selected").attr("data-sort");
      sortColumns(settings.elToSort, selectedOption);
    });

    function sortColumns(el, opt) {
      const attr = "data-" + opt.split(":")[0];
      const sortMethod = (opt.includes("asc")) ? ascOrder : descOrder;
      const sign = (opt.includes("asc")) ? "" : "-";

      const sortArray = $(el).map((i, el) => $(el).attr(attr)).sort(sortMethod);

      for (let i = 0; i < sortArray.length; i++) {
        $(el).filter(`[${attr}="${sortArray[i]}"]`).css("order", sign + sortArray[i]);
      }
    }

    return $select;
  };
})
(jQuery);

// call the plugin
$(".b-select").numericFlexboxSorting();
</script>