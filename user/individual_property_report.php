<?php
require("../db_connect/connection.php");
session_start(); 	
require('../fpdf/fpdf.php');
// require('../fpdf/WriteHTML.php');//inside this fpdf are linked

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('../images/stamp1.jpg',5,6,200); // x,y, large/small
    $this->Ln(20);
	$this->Image('../images/logo4.png',156,270,30); // x,y, large/small
    $this->Ln(20);
}




function upper()
{		
		// $this->SetY(40);
  //   	$this->SetY(40);

	    $this->SetFont('Arial','BU',18);
	    $this->Cell(190,120,'AFFIDAVIT',0,0,'C'); //(x,y,'')
	    $this->Ln(20);
}


function paragraph($conn)
{
		// $this->SetFont('Times','',14);
		$user_id = $_SESSION['user_id'];
		$property_id=$_GET['property_id'];
		$sql = $conn->prepare("SELECT * FROM property_info,property_type_list,user_info 
								WHERE property_type_list.property_type_id=property_info.property_type 
								AND property_info.user_id=user_info.user_id
								AND property_info.id='$property_id' ");

		$sql->execute();
    	$data = $sql->fetch(PDO::FETCH_ASSOC);

    	$seller_name=$data['user_name'];
    	$seller_address=$data['user_address'];
    	$seller_img=base64_encode($data['user_img']);


    	$property_type=$data['property_type_name'];
    	$address=$data['address'];
    	$selling_price=$data['selling_price'];
    	$posted_date=$data['property_added_date'];


    	$buyer_name=$_SESSION['user_name'];
    	$buyer_address=$_SESSION['user_address'];
    	$buyer_img=$_SESSION['user_img'];


//  For Paragraph
    	$this->Ln(50);
		$this->SetFont('Arial','',12);
		$this->Write(7,'I acknowledge that, I am ');

		$this->SetFont('Arial','B',12);
		$this->Write(7,$seller_name);

		$this->SetFont('Arial','',12);
		$this->Write(7,'('.$seller_address.'). My property('.$property_type.') which was posted at '.date('d F Y', strtotime($posted_date)).' . I sold it to ');

		$this->SetFont('Arial','B',12);
		$this->Write(7,$buyer_name);

		$this->SetFont('Arial','',12);
		$this->Write(7,'('.$buyer_address.') by ');

		$this->SetFont('Arial','B',12);
		$this->Write(7,$selling_price);

		$this->SetFont('Arial','',12);
		$this->Write(7,' Taka. And now I have no assertion on this property.');

// ################################################################################
//for Property Details 
		$this->Ln(30);
		$this->SetX(10);
		$this->SetFont('Arial','U',13);
		$this->Write(5,'Property Details');
//for property id
		$this->Ln(8);
		$this->SetFont('Arial','B',12);
		$this->Write(5,'Property ID: ');
		$this->SetFont('Arial','',12);
		$this->Write(5,$property_id);

// for property address
		$this->Ln();
		$this->SetFont('Arial','B',12);
		$this->Write(5,'Property Address: ');
		$this->SetFont('Arial','',12);
		$this->Write(5,$address);

// for property type
		$this->Ln();
		$this->SetFont('Arial','B',12);
		$this->Write(5,'Property Type: ');
		$this->SetFont('Arial','',12);
		$this->Write(5,$property_type);

// ##############################################################################

//for Seller Details 
		$this->Ln(16);
		$this->SetX(10);
		$this->SetFont('Arial','U',13);
		$this->Write(5,'Seller');

		$this->Ln(8);
		$this->SetFont('Arial','',12);
		$this->Write(5,$seller_name);

		$this->Ln(5);
		$this->SetFont('Arial','',12);
		$this->Write(5,$seller_address);

// ##############################################################################

//for Buyer Details 
		$this->Ln(16);
		$this->SetX(10);
		$this->SetFont('Arial','U',13);
		$this->Write(5,'Buyer');

		$this->Ln(8);
		$this->SetFont('Arial','',12);
		$this->Write(5,$buyer_name);

		$this->Ln(5);
		$this->SetFont('Arial','',12);
		$this->Write(5,$buyer_address);

}

function Property(){

}



// Page footer
// function Footer()
// {
//     // Position at 1.5 cm from bottom
//     $this->SetY(-15);
//     // Arial italic 8
//     $this->SetFont('Arial','',8);
//     // Page number
//     $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
// }



}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0); // hete P for Portrait and L for Landscape
// $pdf-> headerTable();
// $pdf-> viewTable($conn);
$pdf-> upper();
$pdf-> paragraph($conn);
$pdf->Output();


?>





















<!-- Alternet working code -->

<!-- 
    	$this->Ln(50);
		$this->SetFont('Arial','',12);
		$this->Write(7,'I acknowledge that, I am ');

		$this->SetFont('Arial','B',12);
		$this->Write(7,$seller_name);

		$this->SetFont('Arial','',12);
		$this->Write(7,'('.$seller_address.'). My property('.$property_type.') which was posted at '.date('d F Y', strtotime($posted_date)).' . I sold it to ');

		$this->SetFont('Arial','B',12);
		$this->Write(7,$buyer_name);

		$this->SetFont('Arial','',12);
		$this->Write(7,'('.$buyer_address.') by ');

		$this->SetFont('Arial','B',12);
		$this->Write(7,$selling_price);

		$this->SetFont('Arial','',12);
		$this->Write(7,' Taka. And now I have no assertion on this property.');



 -->



 <!-- 
//###########################################################################
		$txt="I acknowledge that, I am "; 
		$txt1="$seller_name";
		$txt2="($seller_address). My property($property_type) which was posted at ";
		$txt4=". I sold it to ";
		$txt5=" $buyer_name";
		$txt6="($buyer_address) by ";
		$txt7="$selling_price";
		$txt8=" Taka and now I have no assertion on this property.";

		$this->Ln(50);
		$this->SetFont('Arial','',12);
		$this->Write(7,$txt);

		$this->SetFont('Arial','B',12);
		$this->Write(7,$txt1);

		$this->SetFont('Arial','',12);
		$this->Write(7,$txt2);

		$this->SetFont('Arial','',12);
		$this->Write(7,date('d F Y', strtotime($posted_date)));

		$this->SetFont('Arial','',12);
		$this->Write(7,$txt4);

		$this->SetFont('Arial','B',12);
		$this->Write(7,$txt5);

		$this->SetFont('Arial','',12);
		$this->Write(7,$txt6);

		$this->SetFont('Arial','B',12);
		$this->Write(7,$txt7);

		$this->SetFont('Arial','',12);
		$this->Write(7,$txt8);


// 1st pert paragraph end

//###########################################################################

  -->