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
    include "header.php";
    ?>

<section style="min-height:600px">
    

<div class="m-3 row">
    <div class="col-lg-4 col-sm-12">
      Online Votting System
    </div>
    <div class="col-lg-7 col-sm-12 p-2">
     <form action="app.php" method="post" class="card m-6 p-3">
     <div class="form-group p-3 m-2">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email" name="usn">
  </div>
  <div class="form-group p-3 m-2">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="psw">
  </div>
  <div class="form-group p-3 m-2">
    <label for="post">Login us:</label>
    <Select name="post" class="form-control" id="post">
      <option value="0">Votter</option>
      <option value="1">Admin</option>

    </Select>
  </div>
  <input type="submit" class="btn btn-primary" value="Login" name="Log-in-btn">
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