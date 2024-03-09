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
    <div class="col-lg-3">
      <a href="add_candidate.php" class="btn btn-primary my-5">ADD NEW Candidate</a>

    </div>
    <div class="col-lg-7 col-sm-12 p-2">
        <div class="card m-3 p-5">
    <form action="app.php" enctype="multipart/form-data" method="post">
  <h3>EDITE Post</h3>
  <input type="hidden" name="id" value="<?=$_GET['editepostId']?>">
  Post <sup class="text-danger">*</sup> <input type="text" class="form-control" required name="Post" value="<?=$_GET['postName']?>">
  Description<sup class="text-danger">*</sup> <textarea class="form-control" required name="Description"><?=$_GET['Des']?></textarea>
      <input type="submit" value="Submit" class="btn btn-outline-primary px-3 my-3" name="Update-post">
      
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