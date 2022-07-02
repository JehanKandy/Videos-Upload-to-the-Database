<?php include_once("function.php"); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
<style>
    .view-video{
        padding-top: 80px;
        padding-left: 150px;
        padding-right: 150px;        
    }
    video{
        width: 640px;
        height: 360px;
    }
    a{
        font-size: 20px;
    }
</style>

<div class="view-video">
    <a href="test_video_upload.php">Upload new Video</a><br><br><br>
    <?php uploded_videos(); ?>
</div>
