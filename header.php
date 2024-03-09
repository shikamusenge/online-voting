<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <title></title>
    <style>
      nav #navigation ul li a{
        color:white;
        padding: 2px;
        font-size:23px;
        border-radius:2px;
        border:solid 1px white;
        justify-self: unset;
        margin:5px;
         background-color:darkblue;
      }
  nav #navigation ul{
    display: flex;
    justify-content: space-between;
  }
      nav {
        justify-content: space-between;
        background-color:black;
        margin-left:-5px;
      }
    </style>
</head>
<body>

<div class="nvb">
<nav class="navbar navbar-expand-md navbar-dark">
          <div class="navbar-brand">
            @\/System
          </div>

          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
              <a href="index.php" class="active col"><i class="fa fa-home"></i>Home</a>
              </li>
              <li class="nav-item">
              <a href="Login.php" class="col">Login</a>
              </li>
              <li class="nav-item">
              <a href="Signup.php" class="col">Signup</a>
              </li>
              <li class="nav-item">
              <a href="about.php" class="col">About Us</a>
              </li>
            </ul>
          </div>  
          </div>  
    </nav>
    </div>  
    </div>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>