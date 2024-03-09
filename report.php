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
<section style="overflow: auto;">
    

<div class="m-3 row">
    <div class="col-lg-3">
      <a href="add_candidate.php" class="btn btn-primary my-5">ADD NEW Candidate</a>
<hr>
<h5>Print Votting Report Here</h5>
<ul>
    <?php
    include "connection.php";
$qr=mysqli_query($conn,"SELECT * From post");
while($res=mysqli_fetch_array($qr)){
echo"<li> <a class='btn btn-outline-primary py-3 px-5' href='vottingReport.php?post=$res[postId]&&postName=$res[postName]' target='_blank'>$res[postName]</a></li>";
}
?>
</ul>
    </div>
    <div class="col-lg-7 col-sm-12 p-2">
        <table class="table table-striped my-5">
       <tr>
           <th>Pc</th>
           <th>First Name</th>
           <th>Lastname</th>
           <th>Pts</th>
           <th colspan="2"></th>
       </tr>    
     <?php
     include "connection.php";
        $sql =mysqli_query($conn,"SELECT Firstname,LastName,sum(pts),plofile From candidate inner join votte where votte.candidateId=candidate.Id group by (votte.postId + candidate.Id) order by (pts+votte.postId) Desc");
     
        $nums = mysqli_num_rows($sql);
        $pg=1;
while($nums>0){
    echo"<a href='report.php?pg=$pg' class='btn btn-success m-3 '> Page $pg</a>";
    $nums-=3;
    $pg++;
}
$current= isset($_GET['pg'])? $_GET['pg'] : 1;

$start = ($current-1)*3;
$end = $current *3;
$sql2 =mysqli_query($conn,"SELECT Firstname,LastName,sum(pts),plofile From post inner join votte inner join candidate  where votte.candidateId=candidate.Id and candidate.postId =post.postId  group by (votte.postId + candidate.Id) order by (sum(pts)+votte.postId) Desc limit $start,$end");

     while( $row=mysqli_fetch_array($sql2)){
     ?>
<tr>
    <td>  <img src="plofilespc\<?=$row['plofile']?>" alt="image not found" width="70px" heigh="80px"> </td>
    <td><?=$row['Firstname']?></td>
    <td><?=$row['LastName']?></td>
    <td><?=$row['sum(pts)']?></td>
    </tr>
<?php }
 
?>
 </table>
 <?php
if($current==1){
    echo"<a href='report.php?pg=2' class='btn btn-primary'> Next</a>";
    echo"<button class='btn btn-dark mx-5'> Back</button>";
}
else if($current==($pg-1)){
    $back=$_GET['pg']-1;
    echo"<button class='btn btn-dark mx-5'> Next</button>";
    echo"<a href='report.php?pg=$back' class='btn btn-primary'> Back</a>";
}
else{  
    $next=$_GET['pg']+1;
    $back=$_GET['pg']-1;
    echo"<a href='report.php?pg=$next'  disabled class='btn btn-primary m-3'> Next</a>";
    echo"<a href='report.php?pg=$back' class='btn btn-primary'> Back</a>"; 
}
 ?>
    </div>
</div>
    </div>
</section>
    <?php
    include "footer.php";
    ?>
</body>
</html>