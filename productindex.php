<?php
require_once "config.php";
include('layout/header.php');
include('layout/sidebar.php');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="  display: flex;
  align-items: center;">
      <div class="container-fluid">
        <div class="row mb-2" >
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6" >
          <a href="productcreate.php" class="btn btn-success pull-right" style="margin-left: 420px;"><i class="fa fa-plus" ></i> Add More Products </a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
           <?php
              if(isset($_SESSION['pinsert'])){
              echo '<div id="pinsert" class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>A row is inserted in product table.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
              unset($_SESSION['pinsert']);
              }
              ?>

          <?php
              if(isset($_SESSION['pdelete'])){
              echo '<div id="pdelete" class="alert alert-success" role="alert">
             A row is deleted from Product table.
            </div>';
              unset($_SESSION['pdelete']);
              }
              ?>   
          <?php
              if(isset($_SESSION['pedit'])){
              echo '<div id="pedit" class="alert alert-success" role="alert">
              A row is Updated from Product table!
            </div> ';
              unset($_SESSION['pedit']);
              }
              
              ?>
                 <?php
             
                  
                    ?> 
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">SubCategory and Category Join is here in Products.</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Category Title</th>
                    <th>Category Title</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Meta Description</th>
                    <th>Base Price</th>
                    <th>Discount</th>
                    <th>Total price</th>
                    <th>Addon</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        // $sql = "select category.title, subcategory.title, product.* where `category` Join `subcategory` on category.id=subcategory.categoryid Join `product` on subcategory.id=product.subcategoryid";
                        $sql="SELECT category.title as ctit, subcategory.title as stit, product.*
                        FROM category
                        JOIN subcategory ON category.id = subcategory.categoryid
                        JOIN product ON subcategory.id = product.subcategoryid";
                        $result= mysqli_query($conn,$sql);
                        if($result){
                        
                            while($row = mysqli_fetch_assoc($result)){
                              // print_r($row);
                                ?>
                                <tr>
                                <td> <?php echo $row["ctit"] ?></td>
                                <td> <?php echo $row["stit"] ?></td>
                                <td> <?php echo $row["title"] ?></td>
                                <td> <?php echo $row["description"] ?></td>
                                <?php
                                 echo "<td><img src='" .'img/'. $row['dest'] . "' alt='Image ' style='width: 50px; height: 40px;'> </td>";
                                ?>
                                <td> <?php echo $row["meta"] ?></td>
                                <td> <?php echo $row["price"] ?></td>
                                <td> <?php echo $row["discount"] ?></td>
                                <td> <?php echo $row["total"] ?></td>
                                <td> <?php echo $row["addon"] ?></td>
                                <td> <?php echo $row["status"] ?></td>
                                <?php
                                echo "<td>";
                                echo '<a href="productedit.php?updateid='.$row['id'].' " class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>'; 
                                echo '<a href="extra/pdelete.php?deleteid='.$row['id'].' " title="Delete Record" data-toggle="tooltip" style="margin-bottom:3px;"><span class="fa fa-trash" ></span></a>';
                                echo "</td>";
                            }
                        }
                        ?>      
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include('layout/footer.php');
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready( function(){
    $("#pinsert,#pdelete,#pedit").fadeOut(2000);
   })
</script>