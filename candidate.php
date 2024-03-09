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

<section style="min-height:500px;overflow:scroll;">
    

<div class="m-3 row">
    <div class="col-lg-3">
      <a href="add_candidate.php" class="btn btn-primary my-5">ADD NEW Candidate</a>
<hr>
<ul>
    <?php
    include "connection.php";
$qr=mysqli_query($conn,"SELECT * From post");
while($res=mysqli_fetch_array($qr)){
echo"<li> <a href='candidate.php?post=$res[postId]'>$res[postName]</a></li>";
}
?>
</ul>
    </div>
    <div class="col-lg-7 col-sm-12 p-2">
    <ul class="pagination">
</ul>
        <table class="table table-striped my-5">
       <tr>
           <th>Pc</th>
           <th>First Name</th>
           <th>Lastname</th>
           <th>Age</th>
           <th>National Id</th>
           <th>Post</th>
           <th colspan="2"></th>
       </tr>    
     <?php
     include"connection.php";
     if(isset($_GET["post"])){
        $post=$_GET["post"];
     }
     else
     $post="";
     $sq =mysqli_query($conn,"SELECT * From candidate inner join post where post.postId=candidate.postId and candidate.postId like '%$post' order by candidate.postId");
     $num = mysqli_num_rows($sq);
     $pg=1;
     do{
         echo "<a class='btn btn-primary m-4' href='candidate.php?pg=$pg'>page $pg  </a>";
         $num-=5;
         $pg++;
        }while($num>0);
        if(!isset($_GET['pg'])){$pg=1;}else{$pg=$_GET['pg'];}
        $start=($pg-1)*5;
        $end = $pg*5;
        $sql =mysqli_query($conn,"SELECT * From candidate inner join post where post.postId=candidate.postId and candidate.postId like '%$post' order by candidate.postId Limit  $start,$end");
     while( $row=mysqli_fetch_array($sql)){
     ?>
<tr>
    <td>  <img src="plofilespc\<?=$row['plofile']?>" alt="image not found" width="70px" heigh="80px"> </td>
    <td><?=$row['Firstname']?></td>
    <td><?=$row['LastName']?></td>
    <td><?=$row['Age']?></td>
    <td> <a href="edite.php?cid=<?=$row['Id']?>"> <?=$row['NID']?></a></td> 
    <td><?=$row['postName']?></td>
    <td> <a href="edite.php?editecid=<?=$row['Id']?>&postName=<?=$row['postName']?>" class="btn btn-info text-light">Edit</a></td> 
    <td> <a href="app.php?deletcid=<?=$row['Id']?>&prof=<?=$row['plofile']?>" class="btn btn-danger" onclick="return confirm('are you sure you want to delete this candidate')"> Delete</a></td> 
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