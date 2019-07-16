<?php
include("includes/connection.php");
if(isset($_POST['sub'])){
    global $con;
    global $user_id;
    $content = mysqli_real_escape_string($con, $_POST['content']);
    $insert = "insert into posts(user_id,post_content,post_date) values ('$user_id','$content',NOW())";
    $run = mysqli_query($con,$insert);
    if($run ){
        echo"<script>alert('Shared on your Timeline ')</script>";

        $update = "update users set posts='yes' where user_id='$user_id'";
        $run_update = mysqli_query($con,$update);
    }
    
    
}

    
     


    
?>