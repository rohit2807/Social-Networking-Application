<?php
include("includes/connection.php");
if(isset($_POST['sub'])){
    global $con;
    global $user_id;
    global $user_name;
    $page_name = mysqli_real_escape_string($con, $_POST['page_name']);
    $page_content = mysqli_real_escape_string($con, $_POST['page_content']);
    $insert = "insert into pages(user_id,page_name,page_content,page_author,date_created) values ('$user_id','$page_name','$page_content','$user_name',NOW())";
    $run = mysqli_query($con,$insert);
    if($run ){
        echo"<script>alert('Page has been created ')</script>";
        $update = "update users set page='yes' where user_id='$user_id'";
        $run_update = mysqli_query($con,$update);
    }
    
    
}

    
     


    
?>