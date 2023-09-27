<?php
   require_once "config.php";

   if(isset($_GET['updateid'])){
   
    $id=$_GET['updateid'];
    $_SESSION['id']=$id;
    $sql="SELECT * from `category` where `category`.`id`=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
      $row=mysqli_fetch_assoc($result);
      $title=$row['title'];
      $description=$row['description'];
      $status=$row['status'];
      $file=$row['dest'];
      $_SESSION['fname']=$file;
    }
    include('layout/header.php');
    include('layout/sidebar.php');
  }
  
  if(isset($_POST['submit'])){
   $id=$_SESSION['id'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    $status=$_POST['status'];
    $file = $_FILES['image'];
    $fileName = $file['name'];
    $destination = 'images/' . $fileName;
    $sql="UPDATE `category` SET `title` = '$title', `description`='$description',  `dest`='$destination' ,`status`='$status' WHERE `category`.`id` = $id;";
    $result=mysqli_query($conn,$sql);
    if($result){
      header('Location:http://localhost/AdminProject/indexcategory.php');
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
              <form action="editcategory.php"  method="POST" enctype="multipart/form-data">
                <div class="card-body">

                <div class="form-group" style="margin-bottom: 5px;">
                    <label for="first">Enter Title</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter Title" name="title" value="<?php echo $title; ?> ">
                  </div>

                  <div class="form-group" style="margin-bottom: 5px;">
                    <label for="last"> Enter Description</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter Description" name="description" value="<?php echo $description; ?>">
                  </div>

                  <div class="form-group" style="margin-bottom: 5px;" >
                    <label for="image">Upload Image:</label>
                    <input type="file" name="image" id="image" accept="image/*">
                    <?php
                      // Assuming $previousImageName holds the previous image name
                      if(!empty($row['dest'])) {
                          echo '<p>Previous Image: ' .$file. '</p>';
                      }
                      ?>
                  </div>

                  <div class="form-group" style="margin-bottom: 5px;">
                    <label for="email"> Enter Status</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter status" name="status" value="<?php echo $status; ?>">
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