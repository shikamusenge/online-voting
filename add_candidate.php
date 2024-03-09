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
      <a href="add_candidate.php" class="btn btn-primary my-5">ADD NEW CANDIDATE</a>

    </div>
    <div class="col-9">
        <div class="card m-3 p-5">
    <form action="app.php" enctype="multipart/form-data" method="post">
  <h3>ADD Candidate</h3>
  First name <sup class="text-danger">*</sup> <input type="text" class="form-control" required name="Fname">
  Last name<sup class="text-danger">*</sup> <input type="text" class="form-control" required name="Lname">
  Age <sup class="text-danger">*</sup> <input type="number" class="form-control" required name="Age">
  National Id <sup class="text-danger">*</sup> <input type="text" class="form-control" max="16" min="16" required name="Nid">
  Date of birth <sup class="text-danger">*</sup> <input type="date" class="form-control" required name="Date">
  Post <sup class="text-danger">*</sup> <Select name="Post" class="form-control" required>
    <option value=""></option>
    <?php
    include "connection.php";
    $sql =mysqli_query($conn,"SELECT * From post");
    while($row=mysqli_fetch_array($sql)){
        echo"<option value='{$row[postId]}'>{$row['postName']}</option>";
    }
    ?>
  </Select>
      Picture <sup class="text-danger">*</sup> 
      <input type="file" class="form-control" name="pc" type="jpg/png/jpeg" required>
      <input type="submit" value="Submit" class="btn btn-outline-primary px-3 my-3" name="Add-candidate">
      
</div>
</form>
    </div>
</div>
    </div>
</section>
    <?php
    include "footer.php";
    ?>
</body>
</html>