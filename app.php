<?php
///////////////////////////// Login ////////////////////////////////////
if(isset($_POST['Log-in-btn'])){
    $conn=mysqli_connect("localhost","root","","onlinevotting");
$user = mysqli_real_escape_string($conn,$_POST['usn']);
$password = mysqli_real_escape_string($conn,$_POST['psw']);
$post = $_POST['post'];
$tble = $post==1? "user" : "votters";
$query = "SELECT * FROM $tble WHERE userName='$user'";

$sql = mysqli_query($conn,$query);
$result =mysqli_fetch_array($sql);
if(mysqli_num_rows($sql)>0){
    if(password_verify($password,$result['password'])){
    session_start();
    if($post==1){
        $_SESSION['Current_User_Id'] =$result['Id'];
        $_SESSION['type'] =1;
        header("location:admindashboard.php");    
    }
    else{  
        $_SESSION['Current_User_Id'] =$result['Id'];
        $_SESSION['type'] =0;
      header("location:vottersdashboard.php");     
    }
    }
    else
    echo"<script>alert('username and pasword is not matching');location.href='login.php';</script>";
}
else {
    echo"<script>alert('user not found');location.href='login.php';</script>";
}
}

//######################################################
//#                                                    #
//#              Add candidate                         #
//#                                                    #
//######################################################


if(isset($_POST['Add-candidate'])){
    include "authentication.php";
    include "connection.php";
    $Fname = mysqli_real_escape_string($conn,$_POST['Fname']);
    $Lname = mysqli_real_escape_string($conn,$_POST['Fname']);
    $Age = mysqli_real_escape_string($conn,$_POST['Age']);
    $Post = mysqli_real_escape_string($conn,$_POST['Post']);
    $Nid = mysqli_real_escape_string($conn,$_POST['Nid']);
    $Date = mysqli_real_escape_string($conn,$_POST['Date']);
    $target_dir = "plofilespc/";
    $target_file = $target_dir.basename($_FILES["pc"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$fileName =  basename($_FILES["pc"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if (move_uploaded_file($_FILES["pc"]["tmp_name"], $target_file)) {
            $stmt = "INSERT INTO candidate Values(null,'$Fname','$Lname','$Age','$Post','$fileName','$Date','$Nid','1')";
         if(mysqli_query($conn,$stmt)){
            echo"<script>alert('Candidate added !!');location.href='candidate.php';</script>";  
        }
        else
        echo"failled";
    } 
    else
    echo"failled to upload";
} 


/////////////////////////  Delete candidate //////////
if(isset($_GET['deletcid'])){
    include "connection.php";
    $stmt="DELETE FROM candidate where id ='$_GET[deletcid]'";
    if(mysqli_query($conn,$stmt)){
        $file="plofilespc/".$_GET['prof'];
        unlink($file);
        echo"<script>alert('Candidate Deleted !!');location.href='candidate.php';</script>";  
    }
   }
   ////////////////////////////// update candidate /////////////////////////////
   if(isset($_POST['Edite-candidate'])){
       include "authentication.php";
       include "connection.php";
       $Fname = mysqli_real_escape_string($conn,$_POST['Fname']);
       $Lname = mysqli_real_escape_string($conn,$_POST['Fname']);
       $Age = mysqli_real_escape_string($conn,$_POST['Age']);
       $Post = mysqli_real_escape_string($conn,$_POST['Post']);
       $Nid = mysqli_real_escape_string($conn,$_POST['Nid']);
       $Date = mysqli_real_escape_string($conn,$_POST['Date']);
      
               $stmt = "UPDATE candidate SET FirstName='$Fname',LastName='$Lname',Age='$Age',postId='$Post',DateOfBirth='$Date',NID='$Nid' WHERE Id ='$_REQUEST[candidateId]'";
            if(mysqli_query($conn,$stmt)){
               echo"<script>alert('Candidate Updated!!');location.href='candidate.php';</script>";  
           }
           else
           echo"failled";
   } 
   ////////////////////////////// Add post /////////////////////////////
   if(isset($_POST['Add-post'])){
    include "authentication.php";
    include "connection.php";
    $post = mysqli_real_escape_string($conn,$_POST['Post']);
    $des = mysqli_real_escape_string($conn,$_POST['Description']);
    
   
            $stmt = "INSERT into post values(null,'$post','$des')";
         if(mysqli_query($conn,$stmt)){
            echo"<script>alert('post added !!');location.href='posts.php';</script>";  
        }
        else
        echo"failled";
} 
   ////////////////////////////// Update post /////////////////////////////
   if(isset($_POST['Update-post'])){
    include "authentication.php";
    include "connection.php";
    $post = mysqli_real_escape_string($conn,$_POST['Post']);
    $des = mysqli_real_escape_string($conn,$_POST['Description']);
    $id=mysqli_real_escape_string($conn,$_POST['id']);
   
            $stmt = "UPDATE post SET postName='$post',Description='$des' where postId='$id'";
         if(mysqli_query($conn,$stmt)){
            echo"<script>alert('post Updated !!');location.href='posts.php';</script>";  
        }
        else
        echo"failled";
} 
   ////////////////////////////// Votting /////////////////////////////
   if(isset($_GET['votecid'])){
    include "authentication.php";
    include "connection.php";

        $stmt = "INSERT into votte values(null,'$_GET[votecid]','$_GET[votterId]','$_GET[postId]','1')";
         if(mysqli_query($conn,$stmt)){
            echo"<script>alert('thank you for votting!!'); location.href='vottersdashboard.php'</script>";  
        }
        else
        echo"failled";
} 


?>