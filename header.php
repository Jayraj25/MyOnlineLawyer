<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>
    <?php echo $title; ?>
  </title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"><!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</head>

<body>

  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">My Online Lawyer</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          
          
          <?php
          session_start();
          if (!isset($_SESSION['is_logged_in'])) {
            $_SESSION['is_logged_in'] = false;
          }
          if ($_SESSION['is_logged_in']) {
              if($_SESSION['user_type']!=="Client"){
                header("location:/project/admin/blank.php");
              }
              else{
                echo "<li class='nav-item '>
            <a class='nav-link' href='logout.php'><span class='fa fa fa-reply'></span> Logout</a>
          </li>";
              }
          } else {
            echo "
            <a class='nav-link' href='signup.php' id='navbarDropdownBlog' aria-haspopup='true'>
              Signup
            </a>
            <li class='nav-item '>
            <a class='nav-link' href='login.php'><span class='fa fa fa-reply'></span> Login</a>
          </li>
          ";
          }
          ?>

        </ul>
      </div>
    </div>
  </nav> 
  <header>