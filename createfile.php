<?php
require_once("connection.php");
if(isset($_GET['Id']))
$sql = mysqli_query($conn,"SELECT * FROM `acount` INNER JOIN users WHERE users.id = acount.useId and users.id='$_GET[Id]'") or die;
else
$sql = mysqli_query($conn,"SELECT * FROM `acount` INNER JOIN users WHERE users.id = acount.useId") or die;


require('./fpdf/fpdf.php');

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->SetFillColor(1,99,255); // input R ,G , B  
$pdf->Cell(20,10,"Student List",2,1);
$pdf->Cell(20,10,"No",1,0,"C",true);
$pdf->Cell(80,10,"First Name",1,0,"C",true);
$pdf->Cell(80,10,"Last Name",1,1,"C",true);

$i=1;
$z=10;
while($row = mysqli_fetch_array($sql)){
    
    $txt= $i;
    $pdf->Cell(20,10,$txt,1,0);
    $txt =$row['firstName'];
    $pdf->Cell(80,10,$txt,1,0);
    $txt =$row['lastName'];
    $pdf->Cell(80,10,$txt,1,1);
    $i++;
}
session_start();
$file= $_SESSION['names'].".pdf";
$pdf->Output($file,'D');
$pdf->Output($file,'I');

?>