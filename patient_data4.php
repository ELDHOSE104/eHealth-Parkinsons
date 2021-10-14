<?php  
include('database.php');
  
$result = mysqli_query($conn,"SELECT * FROM data4");
$role=$_GET['role'];?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Patient Data</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/table.css">
</head>
<body>
  <div style="text-align: center;">Patient Data</div>
  <?php if($role=='physician'){?>
  <a href="physician_page.php"><input id="btn_logout" name="logout" type="submit" class="btn btn-default" value="Back" / style="margin-left:55px;visibility: ;"></a>
<?php }
else{?>
  <a href="reseracher_page.php"><input id="btn_logout" name="logout" type="submit" class="btn btn-default" value="Back" / style="margin-left:55px;visibility: "></a>
<?php }?>
  
  <br/><br/>
 <table class="table">
     <thead>
      <tr>
       <th>X</th>  
      <th>Y </th>
      <th> Time</th>
     <th>Button</th>
      <th>Correct</th>
      </tr>
     </thead>
     <tbody>
          <?php  
while ($row = mysqli_fetch_array($result)) {  
?>  
  <tr> 
       <td data-label="X"><?php echo $row["X"]; ?></td>  
       <td data-label="Y"><?php echo $row["Y"]; ?></td>
        
      <td data-label="Time"><?php echo $row["time"]; ?></td> 
        <td data-label="Time"><?php echo $row["button"]; ?></td> 
       <td data-label="Time"><?php echo $row["correct"]; ?></td> 
    </tr>  
<?php  
};  
?>  
</tbody>
</table>
</body>
</html>
