<?php
require_once"authentication.php";
require_once"auth.php";
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
    <div class="m-3">

    <?php
    include "header1.php";
    ?>

<section style="min-height:500px">
    

<div class="m-3 row">
    <div class="col-lg-4 col-sm-12">
      Online Votting System
    </div>
    <div class="col-lg-7 col-sm-12 p-2">
     <?php
     include"connection.php";
     $r1=mysqli_fetch_array(mysqli_query($conn,"SELECT count(*) From candidate"));
     $r2=mysqli_fetch_array(mysqli_query($conn,"SELECT count(*) From votters"));
     $r3=mysqli_fetch_array(mysqli_query($conn,"SELECT count(*) From post"));
     ?>
 <table class="table table-striped my-5">
<tr>
    <th>Number of whole candidate</th>
    <th>Number of whole votters</th>
    <th>Number of available  post</th>
</tr>    
<tr>
    <td><?=$r1['count(*)']?></td>
    <td><?=$r2['count(*)']?></td>
    <td><?=$r3['count(*)']?></td>
</tr>
 </table>
    </div>
</div>
    </div>
</section>
<?php
    include "footer.php";
    ?>
</body>
</html>