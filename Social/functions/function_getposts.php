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
$get_posts ="select * from posts ORDER by 1 DESC LIMIT $start_from,$per_page";
$run_posts = mysqli_query($con,$get_posts);
while($row_posts=mysqli_fetch_array($run_posts)){
    $post_id = $row_posts['post_id'];
    $user_id = $row_posts['user_id'];
    $content = $row_posts['post_content'];
    $post_date = $row_posts['post_date'];
    //who has posted on timeline
    $user = "select * from users where user_id='$user_id' AND posts='yes'";

    $run_user = mysqli_query($con,$user);
    $row_user = mysqli_fetch_array($run_user);
    $user_name = $row_user['user_name'];
    $user_image = $row_user['user_image'];

    echo"<div id='posts'>
    </br><p><img src='user/user_images/$user_image' width='50' height='50'></p>
    <h4><a href='user_profile.php?u_id=$user_id'>$user_name</a></h4>
    <p>$post_date</p></br>
    <p>$content</p>
    </br><a href='single.php?post_id=$post_id' style='float:left;'><button> Comment</button></a>
    <a href='edit.php?post_id=$post_id' style='float:left;'><button> Edit</button></a>
    <a href='delete.php?post_id=$post_id' style='float:left;'><button> Delete</button></a></br>
    </div>
    ";

}
include("page.php");
  
    
     


    
?>