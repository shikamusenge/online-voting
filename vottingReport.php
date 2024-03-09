<?php
require_once("connection.php");

require('./fpdf/fpdf.php');

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->SetFillColor(1,99,255); // input R ,G , B  
$pdf->Cell(30,10,"Online Votting",2,1);
$txt = "Date: ".date("d-m-Y h:m:s");
$pdf->Cell(70,10,$txt,2,1);
$txt="VOTTING RESUL ON POST OF ".$_GET['postName'];
$pdf->Cell(20,10,$txt,2,1);
$pdf->Cell(20,10,"No",1,0,"C",true);
$pdf->Cell(70,10,"First Name",1,0,"C",true);
$pdf->Cell(70,10,"Last Name",1,0,"C",true);
$pdf->Cell(30,10,"Total pts",1,1,"C",true);
$sql =mysqli_query($conn,"SELECT Firstname,LastName,sum(pts),plofile From candidate Left join votte ON votte.candidateId=candidate.Id WHERE candidate.postId='$_GET[post]' group by candidate.Id order by sum(pts) Desc");
$i=1;
$z=10;
while($row = mysqli_fetch_array($sql)){
    
    $txt= $i;
    $pdf->Cell(20,10,$txt,1,0);
    $txt =$row['Firstname'];
    $pdf->Cell(70,10,$txt,1,0);
    $txt =$row['LastName'];
    $pdf->Cell(70,10,$txt,1,0);
    $txt =$row['sum(pts)'];
    $pdf->Cell(30,10,$txt,1,1);
    $i++;
}
session_start();
$file= "online_Votting_Result_report".date("d-m-y hh:mm-:s").".pdf";
$pdf->Output($file,'I');
?>