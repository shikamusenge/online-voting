<!DOCTYPE html>
<?php
ob_start();
session_start();
$ln=$ln=$age=$date=$nid="";
if(isset($_POST['next'])){
    include_once "connection.php";
    $fn=mysqli_real_escape_string($conn,$_POST['fn']);
    $ln=mysqli_real_escape_string($conn,$_POST['ln']);
    $age=mysqli_real_escape_string($conn,$_POST['age']);
    $date=mysqli_real_escape_string($conn,$_POST['dt']);
    $nid=mysqli_real_escape_string($conn,$_POST['nid']);
    $sql = mysqli_query($conn,"SELECT * FROM votters WHERE NID='$nid'");
    if(strlen($nid)!=16){
        $_SESSION['errorMSG']='National Identity is not Valid';
        header("location:signup.php");
    }
    else if(mysqli_num_rows($sql)!=0){
        $_SESSION['errorMSG']='National Identity card is used';
        header("location:signup.php");
    }
    else{
        unset($_SESSION['votternfo']);
        $_SESSION['votternfo']= array("Fname"=>$fn,"Lname"=>$ln,"age"=>$age,"date"=>$date,"nid"=>$nid);
    }
}
elseif(isset($_POST['submit'])){
    include_once "connection.php";
    $psw1=mysqli_real_escape_string($conn,$_POST['psw1']);
    $psw2=mysqli_real_escape_string($conn,$_POST['psw2']);
    $user=mysqli_real_escape_string($conn,$_POST['usn']);
if($psw1 != $psw2){
    $_SESSION['errorMSG']='PASSWORD NOT MATCHING';
    header("location:signup.php");
}
elseif(preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[\d])(?=.*[$%-+=.;&#@!^]).{8,}+$/",$psw2)||strlen($psw2)<8){
    $_SESSION['errorMSG']='Password Should contain atleast 8 characters uppercase letter lowecase and specialcharacter';
    header("location:signup.php");
}
else
{
    $psw = password_hash($psw2,PASSWORD_DEFAULT);
    $Fn=$_SESSION['votternfo']['Fname'];
    $Ln=$_SESSION['votternfo']['Lname'];
    $age=$_SESSION['votternfo']['age'];
    $Dt=$_SESSION['votternfo']['date'];
    $Nid=$_SESSION['votternfo']['nid'];
    $sql = mysqli_query($conn,"SELECT * FROM votters WHERE userName='$user'");
    $row =mysqli_fetch_array($sql);
if(mysqli_num_rows($sql)!=0){
    $_SESSION['errorMSG']="Username <b> {$user}</b> is taken by <b>".$row['firstname']."".$row['lastName']."</b>";
    header("location:signup.php");
}
    
    else{
    $stmt= "INSERT INTO votters Values(null,'$Nid','$Fn','$Ln','$age','$Dt','$user','$psw')";
    if(mysqli_query($conn,$stmt)){
        echo"<script>alert('ACCOUNT CREATED SUCCESS FULLY'); location.href='login.php';</script>";
   unset($_SESSION['votternfo']);
   unset($_SESSION['errorMSG']);
        //    header("location:login.php");  
    }}
   
} 
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Billing system</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>       
     <div class="text-center">
            <h1 class='bg-primary'>Online Votting System</h1>
        </div>
    <div class="m-3">

<?php
include "header.php";
?>
<section style="min-height:500px">
    

<div class="m-3 row">
    <div class="col-lg-4 col-sm-12">
      Online Votting System
    </div>
    <div class="col-lg-7 col-sm-12">
    <?php if(!isset($_POST['next'])){?>
        <h1> <u> <b> votter Registrationform</b></u> </h1>
     <form method="post">
     <div class="alert-danger"><?php 
     if(isset($_SESSION['errorMSG']))
     echo$_SESSION['errorMSG'];
     
     ?></div>
        <h2>Personal Identification 1 of 2</h2>
    Firstname: <input type="text" class="form-control" name="fn" 
    value="<?php if(isset($_SESSION['votternfo']['Fname'])) {echo $_SESSION['votternfo']['Fname'];}?>">
    Lastname: <input type="text" class="form-control" name="ln">
    Age: <input type="number" class="form-control" name="age">
    Date of Birth: <input type="date" class="form-control" name="dt">
    National Id: <input type="text" class="form-control" name="nid">
    <input type="submit" value="Next" name="next" class="btn btn-primary">
     </form>
     <?php } 
     else
     {?>
          <form method="post">
        <h2>Votters Cridentials 2 of 2</h2>
    Email: <input type="Email" class="form-control" name="usn">
    New Password: <input type="password" class="form-control" name="psw1">
    Confirm: <input type="password" class="form-control" name="psw2">
    <input type="submit" value="back" name="back" class="btn btn-primary">
    <input type="submit" value="Submit" name="submit" class="btn btn-primary">

     </form>
        <?php
     }
     
     ?>
    </div>
</div>
    </div>
</section>
    <?php
    include "footer.php";
    ob_end_flush();
    ?>
</body>
</html>