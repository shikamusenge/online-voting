<?php
require_once"authentication.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>       
     <div class="text-center">
            <h1 class='bg-primary'>Online Votting System</h1>
        </div>
        
        <div class="bg-dark text-light text-center d-flex"> 
        <h1 style="color:white;">Votting Pannel</h1> <a href="logout.php" class="col">Logout</a>
        </div>
        <h2>Choose post</h2>
        <div class="d-flex" style="justify-content:space-between; font:size 80;">
        <h2>
        <?php
    include "connection.php";
$qr=mysqli_query($conn,"SELECT * From post");
while($res=mysqli_fetch_array($qr)){
echo" <a href='vote.php?post=$res[postId]' class='btn btn-outline-primary btn-lg'>$res[postName]</a> </li>";
}
?></h2></div>
        <hr>
        <section style="min-height:500px">
        <div class="m-3">
<?php
$id=$_SESSION['Current_User_Id'];
$check = mysqli_query($conn,"SELECT * FROM votte where postId='$_GET[post]' and votterId='$id'");
if(mysqli_num_rows($check)>0){
    echo " You have aleady vote on this position";
}
else
{
    $sql =mysqli_query($conn,"SELECT * From candidate inner join post where post.postId=candidate.postId and candidate.postId='$_GET[post]' order by candidate.postId");
    echo"<div class='row'>";
    while( $row=mysqli_fetch_array($sql)){
    ?>
<div class="card p-4 m-2 col-sm-12 col-lg-5 col-md-6">
   <div class="img-responsive"><img src="plofilespc\<?=$row['plofile']?>" alt="image not found" width="300px" heigh="380px"> </div>
   <div>
  <h4><b><?=$row['Firstname']?> <?=$row['LastName']?></b></h4>  
  <a href="app.php?votecid=<?=$row['Id']?>&postId=<?=$_GET['post']?>&votterId=<?=$id?>" class="btn btn-success py-3 px-6" onclick="return confirm('are you sure you want to vote this candidate')" width="100px"> VOTE <?=$row['LastName']?> </a></td> 
</div></div>
<?php } 

}
?>

    </div>
</section>
    <?php
    include "footer.php";
    ?>
</body>
</html>