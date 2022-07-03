<?php include_once("lib/function/function.php"); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
   
<style>
    .view-video{
        padding-top: 80px;
        padding-left: 150px;
        padding-right: 150px;        
    }
    video{
        padding-left: 20px;
        width: 640px;
        height: 360px;
    }
    a{
        font-size: 20px;
    }
    .video-title{
        background-color: rgb(233, 233, 233); 
        width: 620px;
        margin-left: 20px;

    }
    .video-title-content{
        padding-top: 10px;
        padding-left: 25px;
        padding-right: 25px;
        padding-bottom: 10px;
    }
</style>

<div class="view-video">
    <a href="test_video_upload.php">Upload new Video</a><br><br><br>
    <?php uploded_videos(); ?>
</div>

