<?php include_once("lib/function/function.php"); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
<style>
    .video-content{
        padding-top: 80px;
        padding-left: 150px;
        padding-right: 150px;        
    }
</style>

<div class="video-content">
    Videos
    <br>
    <a href="view.php">All Videos</a>
    <br><br>

    <?php
        if(isset($_POST['submit'])){
            $result = video_upoload($_POST['username'], $_FILES['video']);
            return $result;
        }    
        /* if are there any file type error the print
            Wrong File Type */
            
        if(isset($_GET['error'])){
            echo "<p>".$_GET['error']."</p>";
        }
    ?>


    <form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
        Username : <input type="text" name="username">
        Video : <input type="file" name="video" accept="video/*">
        <input type="submit" value="Add" name="submit">
    </form>
</div>
