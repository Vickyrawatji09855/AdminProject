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
            <h1>Subcategories</h1>
          </div>
          <div class="col-sm-6" >
          <a href="subcategorycreate.php" class="btn btn-success pull-right" style="margin-left: 420px;"><i class="fa fa-plus" ></i> Add More SubCategory </a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">SubCategory and Category Join is here.</h3>
              </div>
              <?php
                if(isset($_SESSION['onup'])){
                echo ' <div class="alert alert-danger" role="alert">
                Due to on update Cascade, we are not able to update data
              </div>';
               unset($_SESSION['onup']);
               session_destroy();
              
                }
              ?>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Category Title</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $sql = "SELECT ctg.title as cat, sub.title, sub.description, sub.dest ,sub.id
                        FROM category ctg, subcategory sub where ctg.id=sub.categoryid";
                        $result=mysqli_query($conn,$sql);
                    
                        if($result){
                          
                            while($row = mysqli_fetch_assoc($result)){
                              // print_r($row);
                                ?>
                                <tr>
                                <td> <?php echo $row["cat"] ?></td>
                                <td> <?php echo $row["title"] ?></td>
                                <td> <?php echo $row["description"] ?></td>
                                <?php
                                 echo "<td><img src='" . $row['dest'] . "' alt='Image ' style='width: 50px; height: 40px;'> </td>";
                                echo "<td>";
                                echo '<a href="subcategoryedit.php?updateid='.$row['id'].' " class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>'; 
                                echo '<a href="extra/sdelete.php?deleteid='.$row['id'].' " title="Delete Record" data-toggle="tooltip" style="margin-bottom:3px;"><span class="fa fa-trash" ></span></a>';
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