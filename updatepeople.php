<?php
include('config.php');
if(isset($_GET['updateid'])){
  include('layout/header.php');
  include('layout/sidebar.php');
  $id=$_GET['updateid'];
  $_SESSION['id']=$id;
  $sql="SELECT * from `people` where `people`.`id`=$id";
  $result=mysqli_query($conn,$sql);
  if($result){
    $row=mysqli_fetch_assoc($result);
    $first=$row['first'];
    $last=$row['last'];
    $email=$row['email'];
    // $fname=$_SESSION['fname'];
  }
}

if(isset($_POST['submit'])){
 $id=$_SESSION['id'];
  $first=$_POST['first'];
  $last=$_POST['last'];
  $email=$_POST['email'];
  $file = $_FILES['image'];
  $fileName = $file['name'];
  $destination = 'images/' . $fileName;
  $sql="UPDATE `people` SET `first` = '$first', `last`='$last', `email`='$email', `dest`='$destination' WHERE `people`.`id` = $id;";
  $result=mysqli_query($conn,$sql);
  if($result){
    header('Location:http://localhost/AdminProject/table.php');
  }
}

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
          <!-- Content Wrapper. Contains page content -->
  <section class="content-header" style="display: flex;
   justify-content: center;
  align-items: center">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Here</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
       
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Update</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="updatepeople.php"  method="POST" enctype="multipart/form-data">
                <div class="card-body">

                <div class="form-group" style="margin-bottom: 5px;">
                    <label for="first">Enter First Name</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter First Name" name="first" value="<?php echo $first; ?> ">
                  </div>

                  <div class="form-group" style="margin-bottom: 5px;">
                    <label for="last"> Enter Last Name</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter Last Name" name="last" value="<?php echo $last; ?>">
                  </div>

                  <div class="form-group" style="margin-bottom: 5px;">
                    <label for="email"> Enter email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $email; ?>">
                  </div>


                 
                  <div class="form-group" style="margin-bottom: 5px;" >
                    <label for="image">Upload Image:</label>
                    <input type="file" name="image" id="image" accept="image/*">
                    <?php
                      // Assuming $previousImageName holds the previous image name
                      if (!empty($fname)) {
                          echo '<p>Previous Image: ' . $fname . '</p>';
                      }
                      ?>
                  </div>
                
                  
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" name="submit" value="submit">
                </div>
              </form>
            </div>
            <!-- /.card -->

        

            
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php
  include('layout/footer.php');
 ?>