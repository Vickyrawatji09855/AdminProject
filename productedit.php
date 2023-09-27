<?php
require_once "config.php";
if(isset($_GET['updateid'])){
   
    $id=$_GET['updateid'];
    $_SESSION['id']=$id;

            $sql="SELECT category.title as ctit,subcategory.categoryid as sidd, subcategory.id as subid,  subcategory.title as stit, product.*
            FROM category
            JOIN subcategory ON category.id = subcategory.categoryid
            JOIN product ON subcategory.id = product.subcategoryid where product.id='$id' ";
              $result=mysqli_query($conn,$sql);
              if($result){
                $row=mysqli_fetch_assoc($result);
                //for inserting in associate array key value
                $ctit=$row['ctit'];
                $stit=$row['stit'];

                $title=$row['title'];
                // echo $row['title'];
                
                $id=$row['id'];
                // $arr[$id]="$title";
                // $_SESSION['question1']=$arr;
                $description=$row['description'];
                $meta=$row['meta'];
                $price=$row['price'];
                $discount=$row['discount'];
                $total=$row['total'];
                $addon=$row['addon'];
                $newaddon = explode(",", $addon);
                $imagepath='img/'.$row['dest'];
                $destination=$row['dest'];
                $status= $row['status'];
                $ctitle=$row['ctit'];
                $stit=$row['stit'];
                
                // $cid=$row['cid'];
                $sidd=$row['sidd'];
                $subid=$row['subid'];
            }
          

        include('layout/header.php');
        include('layout/sidebar.php');
  }
  if(isset($_POST['submit'])){

    if(isset($_FILES['image'])){
      $file=$_FILES['image'];
      if (is_uploaded_file($file['tmp_name'])) {
  
        // Get the file details
        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fullpath='img/'.$fileName;
        // Check if the file is too large
        if ($fileSize > 1000000) {
          die('File is too large');
        }
        
       if(file_exists($fullpath)){
          unlink($fullpath);
          move_uploaded_file($file['tmp_name'], 'img/' . $fileName);
          // echo 'File delete then  uploaded successfully';
  
       }
       else{
        move_uploaded_file($file['tmp_name'], 'img/' . $fileName);
        // echo 'File uploaded successfully';
       }
        // Success!
      } 
    }

     $subcategoryid=$_POST['subcategoryid'];
     $title=$_POST['title'];
     $description=$_POST['description'];
     $cid=$_POST['categoryid'];
     
     $id=$_SESSION['id'];
     $destination = $fileName;
     $meta=$_POST['meta'];
     $price=$_POST['price'];
     $discount=$_POST['discount'];
     $total=$_POST['total'];
    //  $addon=$_POST['addon'];
    if (isset($_POST['addon'])) {
      $addon= implode(',',$_POST['addon']);
      }
       echo var_dump($addon);
     $status=$_POST['status'];
     
       $sql="UPDATE `product` SET `categoryid`='$cid', `subcategoryid`='$subcategoryid', `title` = '$title', `description`='$description',
       `meta`='$meta', `price`='$price', `discount`='$discount',`total`='$total', `addon`='$addon', `status`='$status',  `dest`='$destination'   WHERE `product`.`id` = $id;";
       $result=mysqli_query($conn,$sql);
       if($result){
        $_SESSION['pedit']="val";
         header('Location:http://localhost/AdminProject/productindex.php');
       }
  
  }
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
            <h1>Create Product</h1>
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
              <form action="productedit.php"  method="POST" enctype="multipart/form-data">
                <div class="card-body">

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <button class="btn btn-outline-secondary" type="button">Category</button>
                  </div>
                  <select class="custom-select" id="catid" name="categoryid">

                  <!-- <option selected></option> -->
                  <?php
                      $sql="SELECT * FROM `category`";
                      $result=mysqli_query($conn,$sql);
                      while($row=mysqli_fetch_assoc($result)){
                        ?>
                        <option value="<?php echo $row['id'] ?>"<?php if($row['id']==$sidd){echo 'selected'; } ?> > <?php echo $row['title'] ?></option>
                        <?php
                      }
                    ?>
                  </select>
                </div>  
                <div class="input-group mb-3" id="subcatdiv">
                  <div class="input-group-prepend">
                    <button class="btn btn-outline-secondary" type="button">SubCategory</button>
                  </div>
                  <select class="custom-select" id="subcategoryid" name="subcategoryid">
                  <?php
                      $sql="SELECT * FROM `subcategory`";
                      $result=mysqli_query($conn,$sql);
                      while($row=mysqli_fetch_assoc($result)){
                        ?>
                        <option value="<?php echo $row['id'] ?>"<?php if($row['id']==$subid){echo 'selected'; } ?> > <?php echo $row['title'] ?></option>
                        <?php
                      }
                    ?>
                  <!-- <option selected>Choose Category Title </option>
                       <option value="" disabled></option>  -->
                  </select>
                </div>  
   
                <div class="form-group" style="margin-bottom: 5px;">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter Title" name="title" value="<?php echo $title; ?>">
                  </div>

                  <div class="form-group" style="margin-bottom: 5px;">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" placeholder="Enter description" name="description" value="<?php echo $description; ?>">
                  </div>

                  <div class="form-group" style="margin-bottom: 5px;" >
                    <label for="image">Upload Image:</label>
                    <input type="file" name="image" id="ima" accept="image/*" onchange="readURL(this);"><br>
                    <img src="<?php echo $imagepath; ?>" id="img" alt="" height="150px" width="150px" >
                  
                  </div>

                  <div class="form-group" style="margin-bottom: 5px;">
                    <label for="description">Meta Description</label>
                    <input type="text" class="form-control" id="description" placeholder="Enter description" name="meta" value="<?php echo $meta; ?>">
                  </div>

                  <div class="form-group" style="margin-bottom: 5px;">
                    <label for="description">Base Price</label>
                    <input type="text" class="form-control" id="price" placeholder="Enter description" name="price" value="<?php echo $price; ?>">
                  </div>

                  <div class="form-group" style="margin-bottom: 5px;">
                    <label for="description">Discount</label>
                    <input type="text" class="form-control" id="discount" placeholder="Enter description" name="discount" value="<?php echo $discount; ?>">
                  </div>

                  <div class="form-group" style="margin-bottom: 5px;">
                    <label for="description">Total Price</label>
                    <input type="text" class="form-control" id="total" placeholder="Enter description" name="total" value=" <?php echo $total; ?>">
                  </div>

                  <div class="form-group" style="margin-bottom: 5px;">
                  <label for="">Addon:</label>
                    <input type="checkbox" id="vehicle1" name="addon[]" value="paratha" <?php if(in_array('paratha',$newaddon)) echo "checked"; ?> >
                    <label for="vehicle1"> Paratha</label>
                    <input type="checkbox" id="vehicle2" name="addon[]" value="coke" <?php if(in_array("coke",$newaddon)) echo "checked"; ?>  >
                    <label for="vehicle2"> Coke</label>
                    <input type="checkbox" id="vehicle3" name="addon[]" value="lassi"  <?php if(in_array("lassi",$newaddon)) echo "checked"; ?> >
                    <label for="vehicle3"> lassi</label>
                    <input type="checkbox" id="vehicle3" name="addon[]" value="beer" <?php if(in_array("beer",$newaddon)) echo "checked"; ?>>
                    <label for="vehicle3"> beer</label>
                    <input type="checkbox" id="vehicle3" name="addon[]" value="juice"   <?php if(in_array("juice",$newaddon)) echo "checked"; ?> >
                    <label for="vehicle3"> juice</label><br>
                  </div>

                  <div class="form-group" style="margin-bottom: 5px;">
                  <label for="">Status:</label>
               
                    <input type="radio" id="css" name="status" value="Active" <?php if($status=="Active") echo "checked"; ?>>
                    <label for="css">Active</label>
                    <input type="radio" id="javascript" name="status" value="InActive" <?php if($status=="InActive") echo "checked"; ?>>
                    <label for="javascript">InActive</label>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" ></script>
<script>
        $(document).ready(function(){
            $("#catid").change(function(){
                    var catid= $(this).val();
                    $.ajax({
                        url: "dynamicajax.php",
                        type:"POST",
                        data: {catid:catid},
                        success: function(data){
                            $("#subcatdiv").replaceWith(data);
                        },
                    });
            });
            $("#price,#discount").keyup(function(){
                var main= $('#price').val();
                var disc= $('#discount').val();
                var dec=(disc/100).toFixed(2);
                var mult=main * dec;
                var discount=main-mult;
                $('#total').val(discount);
            })
        })
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
  function readURL(input){
    if(input.files && input.files[0]){
      var reader= new FileReader();
      reader.onload=function(e){
        $('#img').attr('src',e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>