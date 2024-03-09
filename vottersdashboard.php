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
    </div>
</section>
<?php
include "footer.php";
?>
</body>
</html>