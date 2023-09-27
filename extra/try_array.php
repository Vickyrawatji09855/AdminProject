


<?php
include('../config.php');
?>

<table>
<thead>
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Status</th>
    </tr>
</thead>

<?php
$sql= "select * from `category` ";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){?>
<tbody>
  <tr>
    
  <td><?php echo $row['title']; ?> </td>
  <td><?php echo $row['description']; ?></td>
  <td><?php echo $row['status']; ?></td>

</tr>
  <?php
}
?>
</tbody>
</table>

<a href="refer.php"><button type="submit">Export</button></a>
