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
            <h1>Category</h1>
          </div>
          <div class="col-sm-6" >
          <a href="createcategory.php" class="btn btn-success pull-right" style="margin-left: 420px;"><i class="fa fa-plus" ></i> Add More Category </a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Category details are here.</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>

                  <tbody>
                    <?php
                     
                        $sql="select * from `category`";
                        $result=mysqli_query($conn,$sql);
                        if($result){
                            // $row=mysqli_fetch_assoc($result);

                            // $first=$row['first'];
                            // $last=$row['last'];
                            // $email=$row['email'];
                            // $dest=$row['dest'];
                            // $count=mysqli_num_rows($result);
                            while($row = mysqli_fetch_array($result)){
                                ?>
                                <tr>
                              
                                <td> <?php echo $row["title"] ?></td>
                                <?php
                                echo "<td>" . $row['description'] . "</td>";
                                echo "<td><img src='" . $row['dest'] . "' alt='Image ' style='width: 50px; height: 40px;'> </td>";
                                echo "<td>" . $row['status'] . "</td>";
                                echo "<td>";
                                echo '<a href="editcategory.php?updateid='.$row['id'].' " class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>'; 
                                echo '<a href="extra/cdelete.php?deleteid='.$row['id'].' " title="Delete Record" data-toggle="tooltip" style="margin-bottom:3px;"><span class="fa fa-trash" ></span></a>';
                                echo "</td>";
                                echo "</tr>";
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