<?php
require_once "config.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_FILES['dest'])) {
    $file = $_FILES['dest'];
  
    // Check if the file was uploaded
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
        echo 'File delete then  uploaded successfully';

     }
     else{
      move_uploaded_file($file['tmp_name'], 'img/' . $fileName);
      echo 'File uploaded successfully';
     }
      // Success!
    } else {
      // File was not uploaded
      echo 'File was not uploaded';
    }
  }

// inserting thee data in db
      $categoryid=$_POST['categoryid'];
      $subcategoryid=$_POST['subcategoryid'];
      $title=$_POST['title'];
      $description=$_POST['description'];
      $meta=$_POST['meta'];
      $price=$_POST['price'];
      $discount=$_POST['discount'];
      $total=$_POST['total'];

      if (isset($_POST['addon']) && is_array($_POST['addon'])) {
      $addon= implode(',',$_POST['addon']);
      }else{
        $addon=$_POST['addon'];
      }
      $status=$_POST['status'];
      $sql="INSERT INTO `product` ( `categoryid`,`subcategoryid`, `title`, `description`, `dest`, `meta`, `price`, `discount`, `total`, `addon`, `status`) VALUES ('$categoryid','$subcategoryid','$title', ' $description' ,  '$fileName', 
      '$meta', '$price', '$discount', '$total', '$addon', '$status') ";
      $result=mysqli_query($conn,$sql);
      if($result){
  
             header('Location:http://localhost/AdminProject/productindex.php');
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
              <form action="productcreate.php" id="formwa"  method="POST" enctype="multipart/form-data">
                <div class="card-body">

          

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <button class="btn btn-outline-secondary" type="button">Category</button>
                  </div>
                  <select class="custom-select" id="catid" name="categoryid">
                  <option selected>Choose Category Title </option>
                    <?php
                      $sql="SELECT * FROM `category` ";
                      $result=mysqli_query($conn,$sql);
                      while($row=mysqli_fetch_assoc($result)){
                       echo '<option id="category" value="'.$row['id'].'">'.$row['title'].'</option>';
                      }
                    ?> 
                        
                  </select>
                </div> 
                <h5 id="categorycheck" style="color: red;">
                        **Categorty is missing
                    </h5> 

                <div class="input-group mb-3" id="subcatdiv">
                  <div class="input-group-prepend">
                    <button class="btn btn-outline-secondary" type="button">SubCategory</button>
                  </div>
                  <select class="custom-select" id="subcategoryid" name="subcategoryid">
                  <option selected>Choose Category Title </option>
                       <option value="" disabled></option> 
                  </select>
                </div>  

                <!-- <div>
                    <div class="form group" id="subcatdiv">
                      <label for="">Sub Category</label>
                      <input type="text" name="subcategoryid" class="form-control" disabled placeholder="Please enter your category">
                    </div>
                </div> -->


                <div class="form-group" style="margin-bottom: 5px;">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
                    <h5 id="titlecheck" style="color:  red;">
                        **Title is missing
                    </h5>
                  </div>

                  <div class="form-group" style="margin-bottom: 5px;">
                    <label for="description">Description</label>
                    <input type="text"  class="form-control" id="description" placeholder="Enter description" name="description">
                    <h5 id="descriptioncheck" style="color: red;">
                        **Description is missing
                    </h5>
                  </div>

                  <div class="form-group" style="margin-bottom: 5px;" >
                    <label for="image">Upload Image:</label>
                    <input type="file" name="dest" id="im" accept="image/*" onchange="readURL(this);"><br>
                    <img src="" id="image" alt=" " height="150px" width="150px" >
                  
                  </div>

                  <div class="form-group" style="margin-bottom: 5px;">
                    <label for="description">Meta Description</label>
                    <input type="text" class="form-control" id="meta" placeholder="Enter description" name="meta">
                    <h5 id="metacheck" style="color:  red;">
                        **Mata Description is missing
                    </h5>
                  </div>

                  <div class="form-group" style="margin-bottom: 5px;">
                    <label for="description">Base Price</label>
                    <input type="number" class="form-control"  id="base" placeholder="Enter description" name="price">
                    <h5 id="basecheck" style="color: red;">
                        **Base Price Must be a number!
                    </h5>
                  </div>

                  <div class="form-group" style="margin-bottom: 5px;">
                    <label for="description">Discount</label>
                    <input type="number" class="form-control" id="discount" placeholder="Enter description" name="discount">
                    <h5 id="discountcheck" style="color: red;">
                        **minimum 1%!
                    </h5>
                  </div>

                  <div class="form-group" style="margin-bottom: 5px;">
                    <label for="description">Total Price</label>
                    <input type="text" class="form-control" id="total" placeholder="Enter description" name="total">
                  </div>

                  <div class="form-group" style="margin-bottom: 5px;" >
                  <label for="">Addon:</label>
                    <input type="checkbox" id="vehicle1" name="addon[]" value="paratha">
                    <label for="vehicle1"> Paratha</label>
                    <input type="checkbox" id="vehicle1" name="addon[]" value="coke">
                    <label for="vehicle2"> Coke</label>
                    <input type="checkbox" id="vehicle1" name="addon[]" value="lassi">
                    <label for="vehicle3"> lassi</label>
                    <input type="checkbox" id="vehicle1" name="addon[]" value="beer">
                    <label for="vehicle3"> beer</label>
                    <input type="checkbox" id="vehicle1" name="addon[]" value="juice">
                    <label for="vehicle3"> juice</label><br>
                  </div>
                  <h5 id="Addoncheck" style="color: red;">
                        **Addon is missing
                    </h5> 

                  <div class="form-group" style="margin-bottom: 5px;">
                  <label for="">Status:</label>
               
                    <input type="radio" id="status" name="status" value="Active">
                    <label for="css">Active</label>
                    <input type="radio" id="status" name="status" value="InActive">
                    <label for="javascript">InActive</label>
                  </div>
                  <h5 id="statuscheck" style="color: red;">
                        **Status is missing
                    </h5> 
  
                <!-- /.card-body -->

                <div id="subb" class="card-footer">
                  <button  id="submit" class="btn btn-primary" name="submit" value="submit">submit</button>
                </div>
              </form>
            </div>
            <h3 id="hdd"> Please Provide valid values!  </h3>
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
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" ></script>
<!-- <script>
                        const phpecho="<?php echo $row['id']; ?>";
                        console.log(phpecho);
                        //print
                      </script> -->
<script>
        $(document).ready(function(){

          $(document).on("change", "#catid", function() {
                    let catid= $(this).val();
                    var url = "dynamicajax.php?nocache=" + new Date().getTime();
                    $.ajax({
                        url: url,
                        type:"POST",
                        data: {catid:catid},
                        success: function(data){
                          // console.log(data);
                            $("#subcatdiv").replaceWith(data);
                        },
                    });
            });
            $("#base,#discount").keyup(function(){
                var main= $('#base').val();
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
        $('#image').attr('src',e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>  


<script>
// Document is ready
$(document).ready(function () {
//categoy section
$("#categorycheck").hide();
let categoryError = false;
$("#category").on('keyup',function () {
	validateUsecategory();
});

function validateUsecategory() {
	let category = $("#category").val();
  console.log("type of category : "+ typeof category);
  console.log("string is :"+category);
  console.log("LENGTH LOG CATEGORY IS :"+category.length);

  console.log(Number.isInteger(category));
	if (!Number.isInteger(category)) {
	$("#categorycheck").show();
  $("#categorycheck").html("**Category is required");
	categoryError = false;
	return false;
	} else {
	$("#categorycheck").hide();
  categoryError = true;
	}
}
// Validate Username
$("#hdd").hide();
$("#titlecheck").hide();
let titleError = false;
$("#title").on('change',function () {
	validateUsername();
});

function validateUsername() {
	let title = $("#title").val();
	if (title.length == "") {
	$("#titlecheck").show();
	titleError = false;
	return false;
	} else if (title.length < 3 || title.length > 10) {
	$("#titlecheck").show();
	$("#titlecheck").html("**length of title must be between 3 and 10");
	titleError = false;
	return false;
	} else {
	$("#titlecheck").hide();
  titleError = true;
	}
}

$("#descriptioncheck").hide();
let descriptionError = false;
$("#description").keyup(function () {
	validateDescription();
});

function validateDescription() {
	let description = $("#description").val();
	if (description.length == "") {
	$("#descriptioncheck").show();
	descriptionError = false;
	return false;
	} else if (description.length < 5 || description.length > 10) {
	$("#descriptioncheck").show();
	$("#descriptioncheck").html("**length of username must be between 5 and 10");
	descriptionError = false;
	return false;
	} else {
	$("#descriptioncheck").hide();
  descriptionError = true;
	}

}

$("#metacheck").hide();
var metaError = false;
$("#meta").keyup(function () {
	validateMeta();
});

function validateMeta() {
	let meta = $("#meta").val();
	if (meta.length == "") {
	$("#metacheck").show();
	metaError = false;
	return false;
	} else if (meta.length < 5 || meta.length > 10) {
	$("#metacheck").show();
	$("#metacheck").html("**length of username must be between 5 and 10");
	metaError = false;
	return false;
	} else {
	$("#metacheck").hide();
  metaError = true;
	}
}

$("#basecheck").hide();
var baseError = false;
$("#base").change(function () {
	validateBase();
});

function validateBase() {
	let base = $("#base").val();
  let baseValue = parseInt(base, 10);
  // console.log("base value is:",base);
  // console.log(!Number.isInteger(base));
  // console.log(typeof base);
 if (!Number.isInteger(base)) {
	$("#basecheck").show();
  $("#basecheck").html("**Base price must a Numeric Value");
	baseError = false;
	return false;
	} else if (base.length < 1 ) {
	$("#baseheck").show();
	$("#basecheck").html("**Base price must be a greater then 1");
	baseError = false;
	return false;
	} else {
	$("#basecheck").hide();
  baseError = true;
	}
}

$("#discountcheck").hide();
var discountError = false;
$("#discount").keyup(function () {
	validateDiscount();
});

function validateDiscount() {
	let discount = $("#discount").val();
	if (discount == "") {
	$("#discountcheck").show();
  $("#discountcheck").html("**Discount is required");
	discountError = false;
	return false;
	}else if(Number.isInteger(discount)){
    $("#discountcheck").show();
    $("#discountcheck").html("**Discount Value Must be a Number");
    discountError = false;

  }else if (discount< 1 ) {
	$("#discountcheck").show();
	$("#discountcheck").html("**Base price must be a greater then 1");
	discountError = false;
	return false;
	} else {
	$("discountcheck").hide();
  discountError = true;
	}
}

$("#Addoncheck").hide();
var discountError = false;
$("#discount").keyup(function () {
	validateAddon();
});

function validateAddon() {
	let discount = $("#discount").val();
	if (discount == "") {
	$("#Addoncheck").show();
  $("#Addoncheck").html("**Discount is required");
	discountError = false;
	return false;
	}else if (discount< 1 ) {
	$("#Addoncheck").show();
	$("#Addoncheck").html("**Addon must be a greater then 1");
	discountError = false;
	return false;
	} else{
	$("Addoncheck").hide();
  discountError = true;
	}
}

$("#statuscheck").hide();
var discountError = false;
$("#disstatus").keyup(function () {
	validateStatus();
});

function validateStatus() {
  let status = $("input#status").prop("checked") ? $("input#status").val() : null;
  if (status==null) {
    $("#statuscheck").show();
    $("#statuscheck").html("**status is required");
    statusError = false;
    return false;
  } else {
    $("statuscheck").hide();
    statusError = true;
  }
}

function isok(){
  if(titleError==true && descriptionError==true &&  metaError==true ){
    console.log("true");
    return true;
  }
  else{
    console.log("false");
    return false;
  }
}

function validate()
{
   return isok();
}

$("#submit").on('click',function(){
if(isok()){
  return true;
}else{
  $("#hdd").show();
  validateUsecategory();
  validateUsername();
  validateDescription();
  validateMeta();
  validateBase();
  validateDiscount();
  validateAddon();
  validateStatus()
  return false;
} 
return false;
})

});

</script>

<!-- <script>
  $("#formwa").validate();
</script> -->