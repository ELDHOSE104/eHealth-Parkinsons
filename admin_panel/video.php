<?php
include('db.php');
if(isset($_POST['submit']))
 {
        
        $video_url=$_POST['u_url'];
        $video_details=$_POST['video_title'];
        $fetch=explode("v=", $video_url);
        if(isset($fetch[1])&&$fetch[1]!=''){
        $videoid=$fetch[1];
        }else{
        $fetch=explode("/", $video_url);
        $videoid=$fetch[3];
        }
        $image_id=$videoid;
        $sql = "INSERT INTO tbl_video (video_url,image_id,video_details,video_des)
          VALUES ('$video_url','$image_id','$video_details','')";
          mysqli_query($conn, $sql);
        $_SESSION['msg'] = "";
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2 style="text-align: center;">Video Form</h2>
  <a href="logout.php"><input id="btn_logout" name="logout" type="submit" class="btn btn-default" value="logout" / style="margin-left:55px;"></a>
   <?php if(isset($_SESSION['msg'])) { ?>
    <br><div class='alert alert-info'>New Videos Added Successfully...</div>
    <?php unset($_SESSION['msg']); } ?>
  <form method="POST">
    <div class="form-group">
      <label>Video URL</label>
      <input type="text" class="form-control" name="u_url" id="u_url" placeholder="Video URL" required>
    </div>
    <div class="form-group">
      <label>Video Title </label>
       <input type="text" name="video_title" id="video_title" class="form-control" placeholder="Video Title" required>
    </div>
    <button type="submit" name="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
