<?php
require("../db_connect/connection.php");
  error_reporting(0);

    
    
   if (isset($_POST['btn'])) {
    $property_type=$_POST['property_type'];
    $address = $_POST['address'];
    $area = $_POST['area'];
    $latitude=$_POST['latitude'];
    $longitude=$_POST['longitude'];
    $bedroom = $_POST['bedroom']; 
    $bathroom = $_POST['bathroom'];
    $kitchen = $_POST['kitchen'];
    $parking = $_POST['parking'];
    $sell_by = $_POST['sell_by']; 
    $price = $_POST['price'];
    $image_url='There is no image';
    $image_url1='There is no image';
    $image_url2='There is no image';
    $image_url3='There is no image';
    $description = $_POST['description'];
    // $date = date('m/d/Y h:i:s', time());
    $date = date("Y/m/d");
    $active_status_property = 1; 
    
  // Image Upload Start...........................
    if (isset($_FILES['image'])) {
        //echo "<pre>";
        //print_r($_FILES); exit;
        $errors = array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp =  $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

    
        $extensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            $loacation = 'user_img/property/property';
            $img_name = rand();
            $image_url = $loacation.$img_name.'.'.$file_ext;

            move_uploaded_file($file_tmp, $image_url);
        } else {
            print_r($errors);
        }
    }

    // Image Upload end .....................

//  2nd Image upload............

    if (isset($_FILES['image1'])) {
        //echo "<pre>";
        //print_r($_FILES); exit;
        $errors = array();
        $file_name1 = $_FILES['image1']['name'];
        $file_size1 = $_FILES['image1']['size'];
        $file_tmp1 =  $_FILES['image1']['tmp_name'];
        $file_type1 = $_FILES['image1']['type'];
        $file_ext1 = strtolower(end(explode('.', $_FILES['image1']['name'])));

    
        $extensions1 = array("jpeg", "jpg", "png");

        if (in_array($file_ext1, $extensions1) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }

        if ($file_size1 > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            $loacation1 = 'user_img/property/property';
            $img_name1 = rand();
            $image_url1 = $loacation1.$img_name1.'.'.$file_ext;

            move_uploaded_file($file_tmp1, $image_url1);
            //echo "Success";
      //exit;
        } else {
            print_r($errors);
        }
    }

        // 3 rd image upload

      if (isset($_FILES['image2'])) {
        //echo "<pre>";
        //print_r($_FILES); exit;
        $errors = array();
        $file_name2 = $_FILES['image2']['name'];
        $file_size2 = $_FILES['image2']['size'];
        $file_tmp2 =  $_FILES['image2']['tmp_name'];
        $file_type2 = $_FILES['image2']['type'];
        $file_ext2 = strtolower(end(explode('.', $_FILES['image2']['name'])));

    
        $extensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext2, $extensions2) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            $loacation2 = 'user_img/property/property';
            $img_name2 = rand();
            $image_url2 = $loacation2.$img_name2.'.'.$file_ext;

            move_uploaded_file($file_tmp2, $image_url2);
            //echo "Success";
      //exit;
        } else {
            print_r($errors);
        }
    }

      //4th image upload

      if (isset($_FILES['image3'])) {
        //echo "<pre>";
        //print_r($_FILES); exit;
        $errors = array();
        $file_name3 = $_FILES['image3']['name'];
        $file_size3 = $_FILES['image3']['size'];
        $file_tmp3 =  $_FILES['image3']['tmp_name'];
        $file_type3 = $_FILES['image3']['type'];
        $file_ext3 = strtolower(end(explode('.', $_FILES['image3']['name'])));

    
        $extensions3 = array("jpeg", "jpg", "png");

        if (in_array($file_ext3, $extensions3) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            $loacation3 = 'user_img/property/property';
            $img_name3 = rand();
            $image_url3 = $loacation3.$img_name3.'.'.$file_ext;

            move_uploaded_file($file_tmp3, $image_url3);
            //echo "Success";
      //exit;
        } else {
            print_r($errors);
        }
    }

 

    if (!empty($property_type) &&!empty($address) && !empty($area) && !empty($latitude)&& !empty($longitude) && !empty($sell_by) && !empty($price) && !empty($description)) {
        $data = array($_SESSION['user_id'],$property_type,$address,$area,$latitude,$longitude,$bedroom,$bathroom,$kitchen,$parking,$sell_by,$price,$image_url,$image_url1,$image_url2,$image_url3,$description,$date,$active_status_property);
        // ,
        $sql = "insert into property_info(user_id,property_type,address,area,latitude,longitude,bedroom,bathroom,kitchen,parking,sell_by,price,img_1,img_2,img_3,img_4,description,property_added_date,active_status_property) 
                values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $end = $stmt->execute($data);

        if ($end) {
           $sms = '<div class="alert alert-success alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Indicates a successful or positive action.</div>';
        } else {
          $sms = '<div class="alert alert-danger alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Unsuccess!</strong> Indicates a unsuccessful or negative action.</div>';
        }
    } 

    else {
    $sms = '<div class="alert alert-warning alert-dismissable"><a ref="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Unsuccess!</strong> Sorry you must fillup all the field .....</div>';
    }
  }
  
?>  


<!DOCTYPE html>
<html>
<head>
  <title>Add New Property</title>


  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
  <!-- <link href="css/navbar.css" rel="stylesheet" type="text/css" media="all" /> -->
  <link rel="stylesheet" type="text/css" href="css/style.css">

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet">


                      <script src="../js/jquery-2.1.1.min.js"></script>
                      <script src="../js/jquery-gmaps-latlon-picker.js"></script>
                      <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

</head>

    
<body>



</script>  
  <div class="container">
    <div class="col-md-6 " >
      <div class="ag-bt">
      </div>  
      
              
        <?php if(isset ($sms)) {echo $sms;} ?>
       <form method="post" enctype="multipart/form-data" id="form" name="form" style="margin-bottom: 50px;">

          <h3 style="margin-bottom: 14px " > Add New Property </h3>
                  

                  <div class="form-group">
                  <label for="property_type">Property type:</label>               
                  <select class="form-control" name="property_type" id="property_type" required="">
                  <option disabled selected>Select One</option>
                  <option value="1">Apartment</option>
                  <option value="2">Building</option>
                  <option value="3">Land</option>
                  </select>
                  </div>


                 <div class="form-group">
                   <label for="address">Address:</label>
                   <input type="text" name="address" id="address" class="form-control" id="address" placeholder="Enter Property Address" required="">
                 </div>


                 <div class="form-group">
                   <label for="area">Area:</label>
                   <input type="text" name="area" id="area" class="form-control" id="area" placeholder="Enter Property  Area" required="">
                 </div>
         
                 <div class="form-group">
                   <label for="latitude">Latitude: (For latitude and lonitude value of your places click <a href="https://www.latlong.net/" target="_blank">here</a>)</label>
                   <input type="text" name="latitude" id="latitude" class="form-control" id="latitude" placeholder="Enter places latitude value">
                 </div>

                 <div class="form-group">
                   <label for="longitude">Longitude:</label>
                   <input type="text" name="longitude" id="longitude" class="form-control" id="longitude" placeholder="Enter places longitude value">
                 </div>

                  <div class="form-group">
                    <label for="longitude">Bed-room:</label><br>
                    <label class="radio-inline">
                        <input type="radio" name="parking" id="parking" value="0">0
                    </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label class="radio-inline">
                        <input type="radio" name="bedroom" id="bedroom" value="1">1
                    </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label class="radio-inline">
                        <input type="radio" name="bedroom" id="bedroom" value="2">2
                    </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label class="radio-inline">
                        <input type="radio" name="bedroom" id="bedroom" value="3">3
                    </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label class="radio-inline">
                        <input type="radio" name="bedroom" id="bedroom" value="4">4
                    </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label class="radio-inline">
                        <input type="radio" name="bedroom" id="bedroom" value="5">5
                    </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  </div>

                 <div class="form-group">
                    <label for="longitude">Bath-room:</label><br>
                    <label class="radio-inline">
                        <input type="radio" name="parking" id="parking" value="0">0
                    </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label class="radio-inline">
                        <input type="radio" name="bathroom" id="bathroom" value="1">1
                    </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label class="radio-inline">
                        <input type="radio" name="bathroom" id="bathroom" value="2">2
                    </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label class="radio-inline">
                        <input type="radio" name="bathroom" id="bathroom" value="3">3
                    </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label class="radio-inline">
                        <input type="radio" name="bathroom" id="bathroom" value="4">4
                    </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label class="radio-inline">
                        <input type="radio" name="bathroom" id="bathroom" value="5">5
                    </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  </div>

                  <div class="form-group">
                    <label for="longitude">Kitchen:</label><br>
                    <label class="radio-inline">
                        <input type="radio" name="parking" id="parking" value="0">0
                    </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label class="radio-inline">
                        <input type="radio" name="kitchen" id="kitchen" value="1">1
                    </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label class="radio-inline">
                        <input type="radio" name="kitchen" id="kitchen" value="2">2
                    </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label class="radio-inline">
                        <input type="radio" name="kitchen" id="kitchen" value="3">3
                    </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label class="radio-inline">
                        <input type="radio" name="kitchen" id="kitchen" value="4">4
                    </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label class="radio-inline">
                        <input type="radio" name="kitchen" id="kitchen" value="5">5
                    </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  </div>

                  <div class="form-group">
                    <label for="longitude">Parking:</label><br>
                    <label class="radio-inline">
                        <input type="radio" name="parking" id="parking" value="0">0
                    </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label class="radio-inline">
                        <input type="radio" name="parking" id="parking" value="1">1
                    </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label class="radio-inline">
                        <input type="radio" name="parking" id="parking" value="2">2
                    </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label class="radio-inline">
                        <input type="radio" name="parking" id="parking" value="3">3
                    </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label class="radio-inline">
                        <input type="radio" name="parking" id="parking" value="4">4
                    </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label class="radio-inline">
                        <input type="radio" name="parking" id="parking" value="5">5
                    </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  </div>

                 <div class="form-group">
                  <label for="property_type">Sell By:</label>               
                  <select class="form-control" name="sell_by" required="">
                  <option disabled selected>Select One</option>
                  <option value="Private">Private Sell</option>
                  <option value="Auction">Auction</option>
                  </select>
                  </div>

                 <div class="form-group">
                   <label for="price">Price:</label>
                   <input type="text" name="price" id="price" class="form-control" id="price" placeholder="Enter Property Price" required="">
                 </div>


                <div class="form-group">
                   <label for="image">Image 1:</label>
                   <input type="file" name="image" class="form-control" required="">
                 </div>
                 <div class="form-group">
                   <label for="image">Image 2:</label>
                   <input type="file" name="image1" class="form-control" required="">
                 </div>

                 <div class="form-group">
                   <label for="image">Image 3:</label>
                   <input type="file" name="image2" class="form-control" required="">
                 </div>

                 <div class="form-group">
                   <label for="image">Image 4:</label>
                   <input type="file" name="image3" class="form-control" required="">
                 </div>
              
                  <div class="form-group">
                   <label for="description">Description:</label>
                   <textarea name="description" class="form-control" rows="5" id="description" placeholder="Enter Details about this property"></textarea>
                 </div>
                 
         <button type="submit" name="btn" class="btn btn-success">Submit</button>
    
         
      </form>
    </div>
    </br>
    </br>
    </br>
    <div class="col-md-6 agent-right">          
      <!-- <h3>Contact Us</h3>
      <p><a href="mailto:example@email.com">akram.cse007@gmail.com</a></p>
      <p>+8801749307467</p> -->
    </div>
      <div class="clearfix"></div>
  </div>

      <style type="text/css">
        .error{color: red;}
      </style>
  <!-- For form validation -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#form").validate({
      rules:{
        
        property_type:"required",
        address:"required",
        area:"required",

        latitude:{
          required:true,
          number:true,
        },

        longitude:{
          required:true,
          number:true,
        },

        price:{
          required:true,
          number:true,
        },

        },
      messages:{
        // name:"Please Enter Your name",
        // email:"Please Enter Your Valid Email",
        // phone:"Please Enter Your Contact number",
        // pass1:"Please Enter Password",
      }

    });
    
  });
</script>
    

  


</body>
</html>