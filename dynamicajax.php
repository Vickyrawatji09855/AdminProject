<?php
include('config.php');
$catid=$_POST['catid'];
// echo "category id: ".$catid."<br>";
if(!empty($catid)){
    $sql="select * from `subcategory` where `categoryid`='$catid' ";
    $result=mysqli_query($conn,$sql);
    $fetchsubcat=mysqli_num_rows($result);
    // echo "no of rows are:".$fetchsubcat;
    if($fetchsubcat>0){
        ?>
       


        <div class="input-group mb-3" id="subcatdiv">
                  <div class="input-group-prepend">
                    <button class="btn btn-outline-secondary" type="button">SubCategory</button>
                  </div>
                  <select class="custom-select" id="subcategoryid" name="subcategoryid">
                  <?php
                   while($row=mysqli_fetch_assoc($result)){
                ?>
                <option value="<?php echo $row['id'];?>"><?php echo $row['title'];?></option>
                <?php
            }
            ?>
                  </select>
                </div> 

<?php
    }else{
        ?>
                        <div class="input-group mb-3" id="subcatdiv">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary" type="button">SubCategory</button>
                        </div>
                        <select class="custom-select" id="subcategoryid" name="subcategoryid">
                        <option selected>Choose Category Title </option>
                            <option value="" disabled></option> 
                        </select>
                        </div>  
<?php
    }
}

?>