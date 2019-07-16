<?php
include("includes/connection.php");
global $con;
$per_page=5;
if(isset($_GET['page'])){
    $page = $_GET['page'];
}
else{
    $page=1;
}
$start_from = ($page-1) * $per_page;
$get_pages ="select * from pages ORDER by 1 DESC LIMIT $start_from,$per_page";
$run_pages = mysqli_query($con,$get_pages);
while($row_pages=mysqli_fetch_array($run_pages)){
    $page_id = $row_pages['page_id'];
    $user_id = $row_pages['user_id'];
    $topic = $row_pages['page_name'];
    $content = $row_pages['page_content'];
    $post_date = $row_pages['date_created'];
    //who has posted on timeline
    $user = "select * from users where user_id='$user_id' AND page='yes'";

    $run_user = mysqli_query($con,$user);
    $row_user = mysqli_fetch_array($run_user);
    $user_name = $row_user['user_name'];
    $user_image = $row_user['user_image'];

    echo"<div id='posts'>
    </br><p><img src='user/user_images/$user_image' width='50' height='50'></p>
    <h4><a href='user_profile.php?u_id=$user_id'>$user_name</a></h4>
    
    <p>$topic</p><br/>
    <p>$content</p></br>
    <p>$post_date</p>
    </br>
    <a href='cr_edit.php?page_id=$page_id' style='float:left;'><button> Edit</button></a>
    <a href='cr_delete.php?page_id=$page_id' style='float:left;'><button> Delete</button></a></br>
    </div>
    ";

}
include("page_pages.php");
  
    
     


    
?>