
<?php 
include("db.php");
session_start();
if(isset($_POST['registration'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  $c_password=$_POST['c_password'];

  $photo = explode ('.',$_FILES['photo']['name']);
  $photo =end($photo);
  $photo_name = $username.'.'.$photo;

  $input_error = array();
  $password = md5($password);

  $query= "insert into users(name, email, username, password, photo, status) VALUES ('$name','$email','$username','$password','$photo_name','inactive')";

  $result = mysqli_query($link,$query);


  if($result){
   $_SESSION['data_insert_success'] = "Data Insert Success!";
   move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photo_name);
   header('location: registration.php');
  }else{
  $_SESSION['data_insert_error'] = "Data Insert Error!";
  }

  if(empty($name)){
  $input_error['name'] = "the name field is required.";

  }
  if(empty($email)){
  $input_error['email'] = "the email field is required.";
  
  }
  if(empty($username)){
  $input_error['username'] = "the username field is required.";
  
  }
  if(empty($password)){
  $input_error['password'] = "the password field is required.";
  
  }
  if(empty($c_password)){
  $input_error['c_password'] = "the Confirm Password field is required.";
  
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
   <link   href="../css/bootstrap.min.css"  rel="stylesheet">
   
    <link rel="stylesheet" type="text/css" href="style/style.css">

    <title>User registration form</title>
  </head>
  <body>
    
   <div class="container">
 <div class="col-sm-12 col-sm-offset-3">
  <br>
  <br>
    <h1>User Registration Form</h1>
    <br>
    <br>
    <?php if(isset($_SESSION['data_insert_success'])){ echo  '<div class="alert alert-success">'.$_SESSION['data_insert_success'].'</div>';}?>
    <?php if(isset($_SESSION['data_insert_error'])){ echo  '<div class="alert alert-success">'.$_SESSION['data_insert_error'].'</div>';}?>
       
    <div class="row">
      <div class="col-md-12">
        <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
            <div class="form-group">
              <label for="name" class="control-label col-sm-1">Name</label>
              <div class="col-sm-4">
              <input  class="form-control" id="name" type="text" name="name" placeholder="Enter Your Name" value="<?php if(isset($name)){echo $name;} ?>">
              </div>
              <label class="error"><?php if(isset($input_error['name'])){echo $input_error['name'];} ?></label>
            </div>
             <div class="form-group">
              <label for="email" class="control-label col-sm-1">Email</label>
              <div class="col-sm-4">
              <input  class="form-control" id="email" type="text" name="email" placeholder="Enter Your email" value="<?php if(isset($email)){echo $email;} ?>">
              </div>
              <label class="error"><?php if(isset($input_error['email'])){echo $input_error['email'];} ?></label>                 
            </div>
             <div class="form-group">
              <label for="username" class="control-label col-sm-1">username</label>
              <div class="col-sm-4">
              <input  class="form-control" id="username" type="text" name="username" placeholder="Enter Your username" value="<?php if(isset($username)){echo $username;} ?>">
              </div>
              <label class="error"><?php if(isset($input_error['username'])){echo $input_error['username'];} ?></label>                 
            </div>
             <div class="form-group">
              <label for="password" class="control-label col-sm-1">Password</label>
              <div class="col-sm-4">
              <input  class="form-control" id="password" type="password" name="password" placeholder="Enter Your password" value="<?php if(isset($password)){echo $password;} ?>">
              </div>
              <label class="error"><?php if(isset($input_error['password'])){echo $input_error['password'];} ?></label>                 
            </div>
             <div class="form-group">
              <label for="c_password" class="control-label col-sm-1">Confirm Password</label>
              <div class="col-sm-4">
              <input  class="form-control" id="c_password" type="password" name="c_password" placeholder="Enter Your Confirm Password" value="<?php if(isset($c_password)){echo $c_password;} ?>">
              </div>
              <label class="error"><?php if(isset($input_error['c_password'])){echo $input_error['c_password'];} ?></label>                 
            </div>
             <div class="form-group">
              <label for="photo" class="control-label col-sm-1">Photo</label>
              <div class="col-sm-4">
              <input  class="form-control" id="photo" type="file" name="photo">
              </div>
            </div>
            <div class="col-sm-4">
              <input type="submit" name="registration" value="Registration" class="btn btn-primary">
              
            </div>
        </form>
        
      </div>
      
    </div>
    <br>
    <p>If you have an account? then please <a href="login.php">Login</a></p>
    <hr>
    <footer>
      <p>Copyright &copy; 2018 - <?php echo date('Y') ?> All Rights Reserved</p>
    </footer>
     <div>
   </div>
   
  </body>
</html>
