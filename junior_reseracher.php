<?php  
include('database.php');
$limit = 50;  
if (isset($_GET["page"])) {
  $page  = $_GET["page"]; 
  } 
  else{ 
  $page=1;
  };  
$start_from = ($page-1) * $limit;  
$result = mysqli_query($conn,"SELECT * FROM user  WHERE Role_IDrole='1' ORDER BY userID ASC LIMIT $start_from, $limit");
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title> Junior Researcher Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/table.css">
</head>
<body>
 <h3 style="text-align: center;">Junior Researcher Page<h3></br>
  <a href="logout.php"><input id="btn_logout" name="logout" type="submit" class="btn btn-default" value="logout" / style="margin-left:55px;"></a>
   <a href="news.php?role=junior_rearcher"><input id="btn_logout" name="logout" type="submit" class="btn btn-default" value="Latest News" / style="margin-left:55px;"></a>
<br/><br/>
 <table class="table">
     <thead>
      <tr>
       <th>ID</th>  
      <th>Patient Name </th>
      <th> Email</th>
      <th> Image</th> 
      </tr>
     </thead>
     <tbody>
          <?php  
while ($row = mysqli_fetch_array($result)) {  
?>  
  <tr> 
       <td data-label="ID"><?php echo $row["userID"]; ?></td>  
       <td data-label="Patient Name"><?php echo $row["username"]; ?></td>
        
       <td data-label="Email"><?php echo $row["email"]; ?></td> 
       <td data-label="image"><img src="<?php echo $row['image'];?>" width="100" height="100"></td>
      
    </tr>  
<?php  
};  
?>  
</tbody>
</table>
</body>
</html>
<?php  

$result_db = mysqli_query($conn,"SELECT COUNT(userID) FROM user WHERE Role_IDrole='1' "); 
$row_db = mysqli_fetch_row($result_db);  
$total_records = $row_db[0];  
$total_pages = ceil($total_records / $limit); 
 
$pagLink = "<ul class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) {
              $pagLink .= "<li class='page-item'><a class='page-link' href='physician_page.php?page=".$i."'>".$i."</a></li>"; 
}
echo $pagLink . "</ul>";  
?>