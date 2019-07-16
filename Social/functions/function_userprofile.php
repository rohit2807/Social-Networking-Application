<?php
include("includes/connection.php");

if(isset($_GET['u_id'])){
    $user_id = $_GET['u_id'];

    $get_user ="select * from users where user_id='$user_id'";
    $run_user = mysqli_query($con,$get_user);
    $row_user=mysqli_fetch_array($run_user);
    $id = $row_user['user_id'];
    $image = $row_user['user_image'];
    $name = $row_user['user_name'];
    $country = $row_user['user_country'];
    $gender = $row_user['user_gender'];
    $bday = $row_user['user_b_day'];

    if($gender=='Male'){
        $msg="Send him a message";
    }
    else{
        $msg="Send her a message";
    }

    echo "<div id='user_profile'>
        <img src='user/user_images/$image' width='150' height='150' />
        <br/><br/>
        <p><strong>Name: </strong>$name</p><br/>
        <p><strong>Gender: </strong>$gender</p><br/>
        <p><strong>Country: </strong>$country</p><br/>
        <p><strong>Date of Birth: </strong>$bday</p><br/>
        <a href='send_message.php?u_id=$id'><button>$msg</button></a><br/>
        </div>
    ";
}

?>