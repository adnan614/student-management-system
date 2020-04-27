<?php 

include("db.php");
session_start();
if(isset($_SESSION['user_login'])){
   header('location: index.php');
 }

if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $username_check = mysqli_query ($link,"select * FROM users WHERE username = '$username'");
  if(mysqli_num_rows($username_check)> 0){
    $row = mysqli_fetch_assoc($username_check);
    if($row['password'] == md5($password)){
      if($row['status'] == 'active'){
        $_SESSION['user_login'] = $username;
        header('location: index.php');
      }else{
        $status_inactive = "your status is inactive";
      }
    } else{
      $wrong_password = "This password is wrong";
    }

  }else{
    $username_not_found = "This username not found";
  }
}


?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" type="text/css" href="../css/animate.css">
    <link   href="../css/bootstrap.min.css"  rel="stylesheet" >

    <title></title>
  </head>
  <body style="background: #f5f5f5">
    <div class="col-lg-12 text-center">
      <br>
      <br>
       <h1 style="font-family: Lucida Console" class="animated shake">Student Management System</h1>
    </div>
    <div class="container"> 
     <hr>
      <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
          <form action="login.php" method="POST" class="animated shake">
          <h2 class="text-center">Admin Login Form</h2>
          
               <div>

                <input type="text" placeholder="username" name="username" required="" class="form-control" value="<?php if(isset($username)){echo $username ;}?>"/>
                 
               </div>
               <br>
               <div>

                <input type="password" placeholder="password" name="password" required="" class="form-control"  value="<?php if(isset($password)){echo $password ;}?>"/>
                 
               </div>
            <br>
            <div>

               <input type="submit" name="login" value="Login" class="btn btn-info pull-right">
            </div>
            <div>
                  <a href="../">Back</a>
            </div>
          </form>         
        </div>
        
      </div>
      <br>
      <?php if(isset($username_not_found)){echo '<div class="alert alert-danger col-sm-4 col-sm-offset-4">'. $username_not_found.'</div>';}?>
      <?php if(isset($wrong_password)){echo '<div class="alert alert-danger col-sm-4 col-sm-offset-4">'. $wrong_password.'</div>';}?>
      <?php if(isset($status_inactive)){echo '<div class="alert alert-danger col-sm-4 col-sm-offset-4">'. $status_inactive.'</div>';}?>
      
  </div>
 
    
  </body>
</html>