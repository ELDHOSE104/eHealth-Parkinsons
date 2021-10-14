<?php
include('database.php');
$sql="SELECT * FROM tbl_video";
$result = mysqli_query($conn, $sql);
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="css/video.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <h3 class="text-center"> Video Gallery</h3>
<a href="logout.php"><input id="btn_logout" name="logout" type="submit" class="" value="logout" / style="margin-left:55px;"></a>
<div class="container">
  <div class="row">
       <?php 
      while ($key = mysqli_fetch_array($result)) {  
        ?>  
       <div class="col-lg-4 col-sm-12 mb-4">
                
                      <div class="item-folio1">
                       <div class="">
                              <!-- <a href="" class="thumb-link" title="" data-size="1050x700"> -->
                                  <img  onclick="revealVideo('<?php echo $key["video_id"]; ?>')" src="https://img.youtube.com/vi/<?php echo $key['image_id']; ?>/0.jpg" 
                                       srcset="https://img.youtube.com/vi/<?php echo $key['image_id']; ?>/0.jpg , https://img.youtube.com/vi/<?php echo $key['image_id']; ?>/0.jpg" alt="">
                                
                          </div>
                          <div id="myModal<?php echo $key['video_id']; ?>" class="modal fade myModal" role="dialog" style="">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content video_modal" style="margin-left: -300px;border-color: #f0f8ff00; margin-top: 60px;">
                                    <div class="m-header" style="display: none;">
                    <button class="close" data-dismiss="modal" style="color: blue;">
                        ×
                    </button>
                    <h2 class="myModalLabel">  </h2>
                </div>
                                    <div class="modal-header" style="display: none;">
                                        <button type="button" class="close" data-dismiss="modal" style="max-width: 50px;cursor: pointer;font-size: 35px; margin-right: 100px;">&times;</button>
                                      video_name']; ?></h4> -->
                                    </div>
                                    <div class="modal-body">
                                      
                                        <iframe class="myvideo"  id="myvideo<?php echo $key['video_id']; ?>"
                                        src="https://www.youtube.com/embed/<?php echo $key['image_id']; ?>?" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope;">
                                        </iframe>
                                    </div>
                                </div>

                             </div>
                        </div>

                        <div class="">
                              <p class="item-folio__cat1">
                                
                              </p>
                             
                          </div>

                      </div> <!-- end item-folio -->
                  </div> <!-- end masonry__brick -->
                  
               
 

<?php  
};  
?> 
</div></div> 
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript">
        function linked_in(link){
            window.open(link, '_blank');
        }
        function revealVideo(id) {
        $('#myModal'+id).modal('show');
        // $("#myvideo"+id)[0].src += "&autoplay=1";
        $("iframe#myvideo"+id).attr("src", $("iframe#myvideo"+id).attr("src").replace("autoplay=0", "autoplay=1"));
    }
    $(".myModal").on("hidden.bs.modal", function () {
       var str = $(this).attr('id');
       var id =  str.split("myModal");
       id = id[1];
       $("iframe#myvideo"+id).attr("src", $("iframe#myvideo"+id).attr("src").replace("autoplay=1", "autoplay=0"));
    });
    </script>
   
   