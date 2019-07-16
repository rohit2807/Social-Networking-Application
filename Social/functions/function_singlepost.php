<?php
include("includes/connection.php");

if(isset($_GET['post_id'])){
    $get_id = $_GET['post_id'];
    $get_posts ="select * from posts where post_id='$get_id'";
    $run_posts = mysqli_query($con,$get_posts);
    $row_posts=mysqli_fetch_array($run_posts);
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

    //user seesion
    $user_comments=$_SESSION['user_email'];
    $get_comments="select * from users where user_email='$user_comments' ";
    $run_comments= mysqli_query($con,$get_comments);
    $row_comment=mysqli_fetch_array($run_comments);
    $user_comment_id = $row['user_id'];
    $user_comment_name = $row['user_name'];

    echo"<div id='posts'>
    </br><p><img src='user/user_images/$user_image' width='50' height='50'></p>
    <h4><a href='user_profile.php?user_id=$user_id'>$user_name</a></h4>
    <p>$post_date</p></br>
    <p>$content</p>
    </div>
    ";
    
    $get_id = $_GET['post_id'];
    $get_comments ="select * from comments where post_id='$get_id' ORDER by 1 DESC";
    $run_comments = mysqli_query($con,$get_comments);
    while($row=mysqli_fetch_array($run_comments)){
        $comment = $row['comment'];
        $comment_name = $row['comment_writer'];
        $date =$row['date'];
        echo"
        <div id='comments'>
        <h4>$comment_name</h4><i>replied</i> on $date</br>
        </br><p>$comment</p>
        </div>
        ";
    }

    echo"
    <form action='' method='post' id='reply'>
    <textarea cols='50' rows='5' name='comment' placeholder='Write a Comment '></textarea></br>
    <input type='submit' name='reply' value='Comment'/>
    </form>
    ";
    if(isset($_POST['reply'])){
        $comment = $_POST['comment'];
        $insert = "insert into comments(post_id,user_id,comment,comment_writer,date) values ('$post_id','$user_id','$comment','$user_comment_name',NOW())";
        $run = mysqli_query($con,$insert);

        echo "<script>alert(' You replied on this post ')</script>";
        echo "<script>window.open('home.php','_self')</script>";

    }  
    

    
}
?>