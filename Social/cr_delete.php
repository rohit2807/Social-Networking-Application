<?php
include("includes/connection.php");

if(isset($_GET['page_id'])){
    $page_id = $_GET['page_id'];
    $delete_page ="delete  from pages where page_id='$page_id'";
    $run_delete = mysqli_query($con,$delete_page);

    if($run_delete){
        echo "<script>alert(' You deleted this page ')</script>";
        echo "<script>window.open('home.php','_self')</script>";

    }
}
