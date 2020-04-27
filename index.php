<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link   href="css/bootstrap.min.css"  rel="stylesheet">

    <title>student management System</title>
  </head>
  <body>
    <div class="container">
      <br />
      <a class="btn btn-primary pull-right" href="admin/login.php">Login</a>
      <br>
      <br>
      <h1 class="text-center">Welcome To Student Management System</h1>
      <br />
      <div class="row">
        
      <div class="col-sm-4 col-sm-offset-4">
      <form action="" method="POST">
        <table class="table table-bordered">
          <tr>
            <td colspan="2" class="text-center"><label>Student Information</label></td>
           
          </tr>
           <tr>
            <td><label for="choose">Choose Class</label></td>
            <td>
              <select class="form-control" id="choose" name="choose">
                <option value="">Select</option>
                <option value="1st">1st</option>
                <option value="2nd">2nd</option>
                <option value="3rd">3rd</option>
                <option value="4th">4th</option>
                <option value="5th">5th</option>
              </select>
            </td>
          </tr>
           <tr>
            <td><label for="roll">Roll</label></td>
            <td><input class="form-control" type="text" name="roll" pattern="[0-9]{6}" placeholder="roll"></td>
          </tr>
           <tr>
            <td class="text-center" colspan="2"><input type="submit" name="show_info" value="show info"></td>
            
          </tr>
        </table>
        
      </form>
      </div>
    
    </div>
    <br>
    <br>
    <?php
    require_once './admin/db.php';
    if(isset($_POST['show_info'])){

     $choose = $_POST['choose'];
     $roll = $_POST['roll'];
     $result = mysqli_query($link, "SELECT * FROM student_info WHERE class = '$choose' and roll = '$roll'");
     if(mysqli_num_rows($result) == 1){
      $row = mysqli_fetch_assoc($result);
      ?>
       <div class="row">
      <div class="col-sm-6 col-sm-offset-3">
        <table class="table table-bordered">
          <tr>
            <td rowspan="4">
              <img  style="width: 200px" class="img-thumbnail" src="admin/student_image/<?= $row['photo']; ?>" alt="" />
            </td>
            <td>Name</td>
            <td><?= ucwords($row['name']); ?></td>
          </tr>
          <tr>            
            <td>Roll</td>
            <td><?= $row['roll']; ?></td>
          </tr>
          <tr>           
            <td>Class</td>
            <td><?= $row['class']; ?></td>
          </tr>
          <tr>            
            <td>City</td>
            <td><?= ucwords($row['city']); ?></td>
          </tr>
         
        </table>
      </div>
    </div>
      <?php
     }else{
      ?>
     <script type="text/javascript">
       alert('Data Not Found');
     </script> 
     <?php }} ?>
   
  </div>     
  </body>
</html>