<?php
$role=$_GET['role'];

?>
<div class="content">
  <?php if($role=='junior_rearcher'){?>
  <a href="junior_reseracher.php"><input id="btn_logout" name="logout" type="submit" class="btn btn-default" value="Back" / style="margin-left:55px;margin-left: 55px;height: 30px; width: 72px;
    font-size: 14px;"></a>
<?php }
else{?>
  <a href="reseracher_page.php"><input id="btn_logout" name="logout" type="submit" class="btn btn-default" value="Back" / style="margin-left:55px;margin-left: 55px;height: 30px; width: 72px;
    font-size: 14px;"></a>
<?php }?>
  
  
<?php

 $url = "https://www.news-medical.net/tag/feed/Parkinsons-Disease.aspx";
 $feeds = simplexml_load_file($url);

 if(!empty($feeds)){

  $site = $feeds->channel->title;
  $sitelink = $feeds->channel->link;

  echo "<h2>".$site."</h2>";
  foreach ($feeds->channel->item as $item) {

   $title = $item->title;
   $link = $item->link;
   $description = $item->description;
   $postDate = $item->pubDate;
   $pubDate = date('D, d M Y',strtotime($postDate));


   
  ?>
   <div class="post">
     <div class="post-head">
       <h2><a class="feed_title" href="<?php echo $link; ?>"><?php echo $title; ?></a></h2>
       <span><?php echo $pubDate; ?></span>
     </div>
     <div class="post-content">
       <?php echo implode(' ', array_slice(explode(' ', $description), 0, 20)) . "..."; ?> <a href="<?php echo $link; ?>">Read more</a>
     </div>
   </div>

   <?php
    
   }
 
 }
 ?>
</div>
<style type="text/css">
  .content{
    width: 60%;
    margin: 0 auto;
}



h1{
    border-bottom: 1px solid gray;
}

h2{
    color: black;
}
h2 a{
    color: black;
    text-decoration: none;
}

.post{
    border: 1px solid gray;
    padding: 5px;
    border-radius: 3px;
    margin-top: 15px;
}

.post-head span{
    font-size: 18px;
    color: gray;
    letter-spacing: 1px;
}

.post-content{
    font-size: 18px;
    color: black;
}
</style>