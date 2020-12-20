<?php
require('fpdf17/fpdf.php');
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

$query = $conn->query("select * from bill");
$bill = mysqli_fetch_array($query);

$dat=$_POST['appdate'];
$pname=$_POST['patientname'];
$dname=$_POST['doctor'];
$hfees=$_POST['hfees'];
$lfees=$_POST['lfees'];
$dfees=$_POST['docfees'];
$dsep=$_POST['Doctorspecialization'];


$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

$pdf->Cell(130	,5,'Medicare Hospital bill',0,0);
$pdf->Cell(59	,5,'Details',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130	,5,'[Near HMPS mall ]',0,0);
$pdf->Cell(59	,5,'',0,1);//end of line

$pdf->Cell(130	,5,'[Panjim, Goa,467867]',0,0);
$pdf->Cell(25	,5,'Date',0,0);
$pdf->Cell(34	,5,$dat,0,1);//end of line

$pdf->Cell(130	,5,'Phone [+12345678]',0,0);
$pdf->Cell(25	,5,'BillNO #',0,0);
$pdf->Cell(34	,5,$bill['id'],0,1);//end of line


$pdf->Cell(130	,5,'Fax [+12345678]',0,0);
//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//billing address
$pdf->Cell(100	,5,'Bill to',0,1);//end of line
$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$pname,0,1);

$pdf->Cell(30	,5,'Doctor Name:',0,0);

$pdf->Cell(57	,5,$dname,0,1);

$pdf->Cell(30	,5,'Specialisation:',0,0);
$pdf->Cell(57	,5,$dsep,0,1);
$pdf->Cell(10	,5,'',0,1);
$pdf->Cell(10	,5,'',0,1);
//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(150	,5,'Description',1,0);
$pdf->Cell(34	,5,'Amount',1,1);//end of line

$pdf->Cell(150	,5,'Doctor Consultancy fee',1,0);
$pdf->Cell(34	,5,$dfees,1,1);
$pdf->Cell(150	,5,'Hospital fee',1,0);
$pdf->Cell(34	,5,$hfees,1,1);
$pdf->Cell(150	,5,'lab fee',1,0);
$pdf->Cell(34	,5,$lfees,1,1);

$pdf->SetFont('Arial','',12);
$pdf->Cell(125	,5,'',0,0);
$pdf->Cell(25	,5,'Total',0,0);
$pdf->Cell(4	,5,'$',1,0);
$pdf->Cell(30	,5,number_format($dfees+$hfees+$lfees),1,1,'R');//end of line


$pdf->Output();
?>
