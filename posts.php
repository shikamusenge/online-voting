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
include "header1.php";
?>
<section style="min-height:500px">
    

<div class="m-3 row">
    <div class="col-3">
      <a href="addpost.php" class="btn btn-primary my-5">ADD NEW POST</a>
<hr>
</ul>
    </div>
    <div class="col-7">
    <ul class="pagination">
</ul>
        <table class="table table-striped my-5">
       <tr>
           <th>No</th>
           <th>Name</th>
           <th>Description</th>
           <th colspan="2"></th>
       </tr>    
     <?php
     include"connection.php";
    
        $sql =mysqli_query($conn,"SELECT * From post");
        $no=1;
     while( $row=mysqli_fetch_array($sql)){
        $Id=$row['postId'];
        echo"<tr><td>$no</td>";
        $no++;
     ?>
    <td><?=$row['postName']?></td>
    <td><?=$row['Description']?></td>
    <td> <a href="editepost.php?editepostId=<?=$row['postId']?>&postName=<?=$row['postName']?>&Des=<?=$row['Description']?>" class="btn btn-info">EDIT</a></td> 
</tr>
<?php } ?>
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