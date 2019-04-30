<?php
require("../db_connect/connection.php");
session_start(); 	
require('../fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('../images/logo1.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Title
    $this->Cell(276,5,'Total Bought List',0,0,'C');
    // Line break
    $this->Ln();
	$this->SetFont('Arial','',12);
	$this->Cell(276,10,'Real Estate',0,0,'C');
	$this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
function headerTable(){
	$this -> SetX(40); 
	$this->SetFont('Times','B',16);
	$this->Cell(20,10,'Sl.',1,0,'C');
	$this->Cell(30,10,'Property Id',1,0,'C');
	$this->Cell(50,10,'Seller Name',1,0,'C');
	$this->Cell(55,10,'Property Type',1,0,'C');
	$this->Cell(65,10,'Buyer Name',1,0,'C');
	
    $this->Ln();
}

function viewTable($conn){

	$this->SetFont('Times','',14);
	$user_id = $_SESSION['user_id'];
	$sql = $conn->prepare("SELECT * FROM property_request,property_info,user_info,property_type_list
							WHERE property_request.sender_id=43
							AND property_request.active_status_request='accept'
							AND property_info.user_id=user_info.user_id
							AND property_request.property_id=property_info.id
							AND property_info.property_type=property_type_list.property_type_id");
    $sql->execute();
    $data = $sql->fetchAll();

    	// $seller_name=$data['user_name'];
    	// $seller_address=$data['user_address'];
    	// // $seller_img=base64_encode($data['user_img']);


    	// $property_type=$data['property_type_name'];
    	// $address=$data['address'];
    	// $selling_price=$data['selling_price'];
    	// $posted_date=$data['property_added_date'];


    	$buyer_name=$_SESSION['user_name'];
    	// $buyer_address=$_SESSION['user_address'];
    	// $buyer_img=$_SESSION['user_img'];







	$j=1;
	foreach($data as $value)
	{
	$this -> SetX(40);
	$this->Cell(20,10,$j,1,0,'L');
	$this->Cell(30,10,$value['id'],1,0,'L');
	$this->Cell(50,10,$value['user_name'],1,0,'L');
	$this->Cell(55,10,$value['property_type_name'],1,0,'L');
	$this->Cell(65,10,$buyer_name,1,0,'L');
    $this->Ln();
	$j++;
	} 
}

}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf-> headerTable();
$pdf-> viewTable($conn);
//$pdf->SetFont('Times','',12);
//for($i=1;$i<=40;$i++)
  //  $pdf->Cell(0,10,'Printing line number '.$i,0,1);
$pdf->Output();
?>