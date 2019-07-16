<?php
include("includes/connection.php");
global $con;

if(isset($_GET['user_query'])){
    
    $search_req = $_GET['user_query'];

}
$get_search ="select * from users where user_name LIKE '$search_req%'ORDER by 1 DESC LIMIT 3";
$run_search = mysqli_query($con,$get_search);
$count = mysqli_num_rows($run_search);
if($count==0){
    echo"<h3> No result found...</h3>";
    exit();
}
    
while($row_search=mysqli_fetch_array($run_search)){
    $user_id = $row_search['user_id'];
    $user_name = $row_search['user_name'];
    //who has posted on timeline
    $user = "select * from users where user_id = '$user_id' ";

    $run_user = mysqli_query($con,$user);
    $row_user = mysqli_fetch_array($run_user);
    $user_name = $row_user['user_name'];
    $user_image = $row_user['user_image'];

    echo"<div >
    </br><p><img src='user/user_images/$user_image' width='100' height='100'></p>
    <h4><a href='user_profile.php?user_id=$user_id'>$user_name</a></h4>
    </div>
    ";
}        
    

  
    
     


    
?>