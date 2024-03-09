<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
              <a href="admindashboard.php" class="active col">Dashboard</a>
              </li>
              <li class="nav-item">
              <a href="candidate.php" class="col">Candidate</a>
              </li>
              <li class="nav-item">
              <a href="posts.php" class="col">Posts</a>
              </li>
              <li class="nav-item">
              <a href="Report.php" class="col">Report</a>
              </li>
              <li class="nav-item">
              <a href="logout.php" class="col">Logout</a>
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