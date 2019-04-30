 <?php 
 include('connect.php');
 if ($_SERVER["REQUEST_METHOD"] == "POST") {

$name=$_POST['name'];
$address=$_POST['address'];
$email=$_POST['email'];
$password=$_POST['password'];

$sql="INSERT INTO `registration`(`name`, `address`, `email`, `password`, `position`) 
			
			VALUES('$name','$address','$email','$password','0')";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
    header('location:registration1.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}




 ?>