<?php
include("includes/connection.php");
if(isset($_POST['delete'])){
    global $con;
    $delete_post = "delete from posts where user_id='$user_id'";
    $run_post = mysqli_query($con,$delete_post);
    $delete_page = "delete from pages where user_id='$user_id'";
    $run_page = mysqli_query($con,$delete_page);
    $delete_msgus = "delete from messages where user_id='$user_id'";
    $run_us = mysqli_query($con,$delete_msgus);
    $delete_msgrec = "delete from messages where receiver='$user_id'";
    $run_rec = mysqli_query($con,$delete_msgrec);
    $delete_msg = "delete from messages where sender='$user_id'";
    $run_msg = mysqli_query($con,$delete_msg);
    $delete = "delete from users where user_id='$user_id'";
    $run = mysqli_query($con,$delete);
    

    if($run ){
        session_start();

        session_destroy();

        echo "<script>window.open('index.php','_self')</script>";

       
        
    }
    
     
}

if(isset($_POST['no'])){
    echo "<script>window.open('home.php','_self')</script>";

}
    



    
?>