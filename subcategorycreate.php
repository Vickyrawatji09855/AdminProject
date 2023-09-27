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
      $categoryid=$_POST['categoryid'];
      $title=$_POST['title'];
      $description=$_POST['description'];

      $sql="INSERT INTO `subcategory` ( `categoryid`, `title`, `description`,  `dest`) VALUES ('$categoryid', '$title', ' $description' ,  '$destination') ";
      $result=mysqli_query($conn,$sql);

      if($result){
    
            // echo "inserted";
             header('Location:http://localhost/AdminProject/subcatindex.php');
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
            <h1>Create SuCategory</h1>
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
              <form action="subcategorycreate.php"  method="POST" enctype="multipart/form-data">
                <div class="card-body">

                <!-- <div class="form-group" style="margin-bottom: 5px;">
                    <label for="title">Category ID</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter Category ID" name="categoryid">
                  </div> -->

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <button class="btn btn-outline-secondary" type="button">Category</button>
                  </div>
                  <select class="custom-select" id="inputGroupSelect03" name="categoryid">
                  <option selected>Choose Category Title...</option>
                    <?php
                      $sql="SELECT * FROM `category` ";
                      $result=mysqli_query($conn,$sql);
                      while($row=mysqli_fetch_assoc($result)){
                       echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
                       $_SESSION['tere']=$row['title'];
                      }
                     
                    ?>
                  </select>
                </div>  
                

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

<script>
  var tit = '<?php echo isset($_SESSION['tere']) ? $_SESSION['tere'] : "its not set yet"; ?>';
  console.log(tit);
</script>