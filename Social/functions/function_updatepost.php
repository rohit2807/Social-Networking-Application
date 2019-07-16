<?php
include("includes/connection.php");


if(isset($_POST['update'])){
    $content = $_POST['content'];
    $update_post ="update posts set post_content ='$content' where post_id='$get_id'";
    $run_update = mysqli_query($con,$update_post);

    if($run_update){
        echo "<script>alert(' You edited this post ')</script>";
        echo "<script>window.open('home.php','_self')</script>";

    }
}
