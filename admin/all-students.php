 <h1 class="text-primary"><i class="fa fa-users"></i> All Student <small> All Students </small> </h1>

        <ol class="breadcrumb">
          <li><a href="index.php?page=dashboard.php"><i class="fa fa-dashboard"> </i>Dashboard</a></li>
          <li class="active"><i class="fa fa-users"></i> All Students</li>
        </ol>


  <div class="table-responsive">
          <table id="data" class="table table-hover table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Roll</th>
                <th>Class</th>
                <th>City</th>
                <th>Contact</th>
                <th>Photo</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
               $db_sinfo = mysqli_query($link,"select * FROM student_info");
               while($row = mysqli_fetch_assoc($db_sinfo)){?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo ucwords($row['name']); ?></td>
                <td><?php echo $row['roll']; ?></td>
                <td><?php echo $row['class']; ?></td>
                <td><?php echo ucwords($row['city']); ?></td>
                <td><?php echo $row['pcontact']; ?></td>
                <td><img style="width: 100px" src="student_image/<?php echo $row['photo']; ?>" alt=""></td>
                <td>
                  <a href="index.php?page=update-student.php&id=<?php echo base64_encode($row['id']); ?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"> Edit </i></a>
                  &nbsp; &nbsp; &nbsp; &nbsp;
                  <a href="delete_student.php?id=<?php echo base64_encode($row['id']); ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"> Delete </i></a>
                </td>
              </tr>
              <?php
              }
            ?>
            </tbody>
           
          </table>
        </div>