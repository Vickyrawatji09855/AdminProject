<?php
   require_once "config.php";
   include('layout/header.php');
   include('layout/sidebar.php');
   if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
    $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];
    // echo $_SERVER['REQUEST_URI'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];    
    $_SESSION['table']=$_SERVER['REQUEST_URI'];   
    
?>


  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="  display: flex;
  align-items: center;">
      <div class="container-fluid">
        <div class="row mb-2" >
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6" >
          <a href="add.php" class="btn btn-success pull-right" style="margin-left: 420px;"><i class="fa fa-plus" ></i> Add New Employee</a>
         
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users details are here.</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>

                  <tbody>
                    <?php
                     
                        $sql="select * from `people`";
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
                              
                                <td> <?php echo $row["first"] ?></td>
                                <?php
                                echo "<td>" . $row['last'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td><img src='" . $row['dest'] . "' alt='Image ' style='width: 50px; height: 40px;'> </td>";
                                echo "<td>";
                                
                                 echo '<a href="updatepeople.php?updateid='.$row['id'].' " class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>'; 
                             
                                echo '<a href="deletepeople.php?deleteid='.$row['id'].' " title="Delete Record" data-toggle="tooltip" style="margin-bottom:3px;"><span class="fa fa-trash" ></span></a>';
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