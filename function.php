<?php 
    include("config.php");

    use FTP\Connection;
    session_start();

    // function for upload videos

    function video_upoload($username, $video){
        $con = Connection();

        
       /*
            ********* for find name, type, tmp_name, errors, size of video 
            and also we can use it for images, files for upload to the
            database ***********

           echo "<pre>";
           echo($username);
           print_r($video);

        */

        //create veriable for video name
        $video_name = $_FILES['video']['name'];
        //create veriable for video temp_name
        $tmp_name = $_FILES['video']['tmp_name'];
        //error
        $error = $_FILES['video']['error'];
    
        //now check are there any errors in this array

        if($error === 0){
            //now get the pathinfo of video 
            $video_mp4 = pathinfo($video_name, PATHINFO_EXTENSION);

            /*  now print it
                echo $video_mp4;  */
            //now convert video pathifo to lowercase
             
            $video_exe_lc = strtolower($video_mp4);

            //now give the user controlls for video upload
            // file type controllers(some of video file types are in array)

            $allowed_file_types = array("mp4","webm","avi","flv");

            //now do some error handlings

            if(in_array($video_exe_lc, $allowed_file_types)){

                //now make new name for video with lowercase extention
                $new_video = uniqid("video-", true).'.'.$video_exe_lc;

                //now make folder for uploaded videos
                $video_file_path = 'upload/'.$new_video;

                // now move the video to above folder
                move_uploaded_file($tmp_name, $video_file_path);


                //now upload files to the database
                $insert_video = "INSERT INTO videos(video_url,username,add_date)VALUES('$new_video','$username',NOW())";
                $insert_video_result = mysqli_query($con, $insert_video);

                //header to  view.php file for view uploaded videos
                header("location:view.php");
            }

            else{
                //print error
                $error_msg = "Wrong File Type";
                header("location:test_video_upload.php?error=$error_msg");
            }

        }

    }





    // create a function for view uploaded video
    function uploded_videos(){
        $con = Connection();
        
        $all_videos = "SELECT * FROM videos";
        $all_videos_result = mysqli_query($con, $all_videos);
        $all_video_nor = mysqli_num_rows($all_videos_result);

        if($all_video_nor > 0){
            while($video_row = mysqli_fetch_assoc($all_videos_result)){

                /*  ********* for find database table column of video 
                    and also we can use it for images, files for view to the
                    database ***********    

                echo "<pre>";
                print_r($video_row);  */

                ?>
                
                <video src="upload/<?= $video_row['video_url']; ?>" name="video" id="myVideo" controls></video>

                <div class="video-title">
                    <div class="video-title-content">
                        <i class="far fa-eye"></i> Views 50M &nbsp;&nbsp;
                        <i class="fas fa-download"></i> &nbsp;&nbsp;
                        <i class="fas fa-cog"></i> &nbsp;&nbsp;
                    </div>
                </div>
                <?php
            }
        }
    }


?>
