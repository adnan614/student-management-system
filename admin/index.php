<?php
session_start();
require_once './db.php';
 
 if(!isset($_SESSION['user_login'])){
   header('location: login.php');
 }


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link   href="../css/bootstrap.min.css"  rel="stylesheet">
    <link   href="../css/font-awesome.min.css"  rel="stylesheet">
    <link   href="../css/dataTables.bootstrap.min.css"  rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/style.css">

    <script type="text/javascript" src="../js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
   
    <title>student management system</title>
  </head>
  <body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      
      <a class="navbar-brand" href="index.php">SMS</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
        </li>
      </ul>
      <?php
        $session_user =  $_SESSION['user_login'];

        $user_data = mysqli_query($link,"select * from  users WHERE username = '$session_user'");
        $user_row = mysqli_fetch_assoc($user_data);
        

        ?>
     
      <ul class="nav navbar-nav navbar-right">
        <li><a href=""><i class="fa fa-user"></i>Welcome:  <?= ucwords($user_row['name']); ?></a></li>
        <li><a href="registration.php"><i class="fa fa-user-plus"></i> Add user</a></li>
        <li><a href="index.php?page=user-profile.php"><i class="fa fa-user"></i> Profile</a></li>
        <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
       
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid">
  <div class="row">  
    <div class="col-sm-3">
      <div class="list-group">
        <a href="index.php?page=dashboard.php" class="list-group-item active">
         <i class="fa fa-dashboard"></i> Dashboard
        </a>
          <a href="index.php?page=add-student.php" class="list-group-item"> <i class="fa fa-user-plus"></i> Add Student</a>
          <a href="index.php?page=all-students.php" class="list-group-item"> <i class="fa fa-users"></i> All Students</a>
          <a href="index.php?page=all-users.php" class="list-group-item"> <i class="fa fa-users"></i> All Users</a>
          
        </div>
    </div>
    <div class="col-sm-9">
      <div class="content">
        <?php
        if(isset($_GET['page'])){
           $page = $_GET['page'];
         }else{
          $page = "dashboard.php";
         }
          if(file_exists($page)){
             require_once $page;
          }else{
            require_once '404.php';
          }

        ?>

      </div>
    </div>
  </div>
</div>
<footer class="footer-area">
  <p> Copyright &COPY; 2020 Student Management System. All Rights Are Reserved</p>
</footer>
  </body>
</html>