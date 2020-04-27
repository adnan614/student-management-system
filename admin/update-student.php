 <h1 class="text-primary"><i class="fa fa-pencil-square-o"></i> Upadate Student <small> Update Student </small> </h1>

        <ol class="breadcrumb">
        	<li><a href="index.php?page=dashboard.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        	<li><a href="index.php?page=all-students.php"><i class="fa fa-users"></i>All Students</a></li>
          <li class="active"><i class="fa fa-pencil-square-o"></i> Update Student</li>
        </ol>
     <?php
       $id = base64_decode($_GET['id']);

        $db_data = mysqli_query($link,"select * from student_info where id = '$id'");
        $db_row = mysqli_fetch_assoc($db_data);
        if(isset($_POST['update-student'])){
          	$name = $_POST['name'];
          	$roll = $_POST['roll'];
          	$class = $_POST['class'];
          	$city = $_POST['city'];
          	$pcontact = $_POST['pcontact'];
          	

              
            $query = "update student_info set name ='$name',roll='$roll',class='$class',city='$city',pcontact='$pcontact' where id ='$id'";   

           $result = mysqli_query($link,$query);
           if($result){
           	header('location: index.php?page=all-students.php');
           }
           
          }
     ?> 

<div class="row">
	<div class="col-sm-6">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="name">Student Name</label>
				<input type="text" name="name" placeholder="Student Name" id="name" class="form-control" required="" value="<?php  echo $db_row['name'] ?>">
			</div>
			<div class="form-group">
				<label for="roll">Roll</label>
				<input type="text" name="roll" placeholder="roll" id="roll" class="form-control" pattern="[0-9]{6}" required="" value="<?php  echo $db_row['roll'] ?>">
			</div>
			<div class="form-group">
				<label for="city">City</label>
				<input type="text" name="city" placeholder="city" id="city" class="form-control" required="" value="<?php  echo $db_row['city'] ?>">
			</div>
			<div class="form-group">
				<label for="pcontact">PContact</label>
				<input type="text" name="pcontact" placeholder="01***********" id="pcontact" class="form-control" required="" value="<?php  echo $db_row['pcontact'] ?>">
			</div>
			<div class="form-group">
				<label for="class">Class</label>
				<select id="class" class="form-control" name="class" required="">
					<option value="1st">Select</option>
					<option <?php echo $db_row['class']=='1st'?'selected=""':''; ?> value="1st">1st</option>
					<option <?php echo $db_row['class']=='2nd'?'selected=""':''; ?> value="2nd">2nd</option>
					<option <?php echo $db_row['class']=='3rd'?'selected=""':''; ?> value="3rd">3rd</option>
					<option <?php echo $db_row['class']=='4th'?'selected=""':''; ?> value="4th">4th</option>
					<option <?php echo $db_row['class']=='5th'?'selected=""':''; ?> value="5th">5th</option>
				</select>
			</div>
			
			<div class="form-group">
				<input type="submit" name="update-student" value="Update Student" class="btn btn-primary">
			</div>
		</form>
		
	</div>
</div>
