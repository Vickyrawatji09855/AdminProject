<?php
   require_once "config.php";
  
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      if (isset($_FILES['image'])) {
          $file = $_FILES['image'];
          // File details
          $fileName = $file['name'];
          $fileTmpName = $file['tmp_name'];
          $_SESSION['fname']=$fileName;
          $fileSize = $file['size'];
          $fileError = $file['error'];
          // Process the file (e.g., move it to a specific directory)
            if ($fileError === 0) {
              $destination = 'images/' . $fileName;
              move_uploaded_file($fileTmpName, $destination);
            }
  }
// inserting thee data in db
   
        $title=$_POST['title'];
        $description=$_POST['description'];
        $status=$_POST['status'];
        
        $sql="INSERT INTO `category` ( `title`, `description`, `status`, `time`, `dest`) VALUES ('$title', ' $description', '$status', current_timestamp(), '$destination') ";
        $result=mysqli_query($conn,$sql);

        if($result){
      
               header('Location:http://localhost/AdminProject/indexcategory.php');
        }else{
            echo "data is not aBLE TO INSERT";
        }
}
include('layout/header.php');
include('layout/sidebar.php');
?>




<div>
<section>
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
            <h1>Create Category</h1>
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
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="createcategory.php"  method="POST" enctype="multipart/form-data">
                <div class="card-body">

                <div class="form-group" style="margin-bottom: 5px;">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter Title" name="title">
                  </div>

                  <div class="form-group" style="margin-bottom: 5px;">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" placeholder="Enter description" name="description">
                  </div>

                  <div class="form-group" style="margin-bottom: 5px;" >
                    <label for="image">Upload Image:</label>
                    <input type="file" name="image" id="image" accept="image/*">
                  </div>

                  <div class="form-group" style="margin-bottom: 5px;">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" id="status" placeholder="Enter Status" name="status">
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
    </div>

  <?php
      include('layout/footer.php');

  ?>