<?php  
include('db.php');
$limit = 50;  
if (isset($_GET["page"])) {
  $page  = $_GET["page"]; 
  } 
  else{ 
  $page=1;
  };  
$start_from = ($page-1) * $limit;  
$result = mysqli_query($conn,"SELECT * FROM user ORDER BY userID ASC LIMIT $start_from, $limit");
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Admin Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="table.css">
 
</head>
<body>
  <div style="text-align: center;"></div>
   <a href="video.php"><input id="btn_logout" name="btn_logout" type="submit" class="btn btn-default" value="video" / style="margin-left:55px;"></a>
  <a href="logout.php"><input id="btn_logout" name="logout" type="submit" class="btn btn-default" value="logout" / style="margin-left:55px;"></a>
<br/><br/>
 <table class="table">
     <thead>
      <tr>
        <th>ID</th>  
      <th>Name</th>
      <th>Email</th>
      <th>Image</th> 
      <th>Role</th>
      <th></th>
      </tr>
     </thead>
     <tbody>
        <?php  
while ($row = mysqli_fetch_array($result)) {  
?>  
  <tr> 
      <td data-label="ID"><?php echo $row["userID"]; ?></td>  
      <td data-label="Name"><?php echo $row["username"]; ?></td>
        
      <td data-label="Email"><?php echo $row["email"]; ?></td> 
      <td data-label="Image"><img src="<?php echo $row['image'];?>" width="100" height="100"></td>
       <td data-label="Role"><form method="POST" action="admin_view.php?id=<?php echo $row['userID']; ?>">
          <select name="Role_IDrole" id="role" >
            <option value="">select</option>
            <option value="1" <?php if($row["Role_IDrole"]=='1'){ ?>selected <?php } ?>>Patient</option>
            <option value="2" <?php if($row["Role_IDrole"]=='2'){ ?>selected <?php } ?>>physician</option>
            <option value="3" <?php if($row["Role_IDrole"]=='3'){ ?>selected <?php } ?>>Researcher</option>
            <option value="4" <?php if($row["Role_IDrole"]=='4'){ ?>selected <?php } ?>>Junior researcher</option>
          </select>
          <input  name="submit" type="submit" class="login-button" value="Submit" />
        </form></td>
        <td><a href="edit.php?id=<?php echo $row['userID']; ?>">Edit</a></td>
    </tr>  
<?php  
};  
?>  
</tbody>
</table>


<?php  

$result_db = mysqli_query($conn,"SELECT COUNT(userID) FROM users"); 
$row_db = mysqli_fetch_row($result_db);  
$total_records = $row_db[0];  
$total_pages = ceil($total_records / $limit); 
 
$pagLink = "<ul class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) {
              $pagLink .= "<li class='page-item'><a class='page-link' href='admin_view.php?page=".$i."'>".$i."</a></li>"; 
}
echo $pagLink . "</ul>";  
?>

</body>
</html>
<?php
if(isset($_POST['submit']))
{
 
  $id=$_GET['id'];
  $role = $_POST['Role_IDrole'];
  $sql = "UPDATE user SET Role_IDrole='$role' WHERE userID='$id'";
    if(mysqli_query($conn, $sql))
    {
   
    echo "<script>alert('roles were updated successfully.');window.location.href='"."admin_view.php';</script>";
    }
    else
    {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}
?>
