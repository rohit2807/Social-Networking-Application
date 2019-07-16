<?php
session_start();
include("includes/connection.php");
if(!isset($_SESSION['user_email'])){
    header("location: index.php");
}
else{


?>

<!DOCTYPE html>

<html>
    <head>
        <title> Welcome to Social </title>
    <link rel="stylesheet" href="styles/home_style.css" media="all" />
    </head>

<body>
    <div class="container">
        <div id="head_wrap">
            <div id="header">
                <ul id ="menu">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="friends.php">User List</a></li>
                    <li><a href="cr_page.php">Create Page</a></li>
                    <li><a href="view_page.php">View Page</a></li>
                </ul>
                <form method="get" action="results.php" id="form1">
                    <input type="text" name="user_query" placeholder="Friends Search"/>
                    <input type="submit" name="search" value="Search"/>
                </form>
            </div>
        </div>
        <div class="content">
            <div id="user_timeline">
                <div id="user_details"> 
                    <?php
                    $user=$_SESSION['user_email'];
                    $get_user="select * from users where user_email='$user' ";
                    $run_user= mysqli_query($con,$get_user);
                    $row=mysqli_fetch_array($run_user);

                    $user_image = $row['user_image'];
                    $user_id = $row['user_id'];
                    $user_name = $row['user_name'];
                    $user_country = $row['user_country'];
                    $last_login = $row['last_login'];
                    $user_gender = $row['user_gender'];
                    $user_b_day = $row['user_b_day'];
                    $today_date = $row['today_date'];

                    $user_posts = "select * from posts where user_id='$user_id'";
                    $run_posts = mysqli_query($con,$user_posts);

                    $post_count = mysqli_num_rows($run_posts);
                    
                    
                    echo"
                        <center><img src='user/user_images/$user_image' width='200' height='200' /></center>
                        <div id='user_mention'>
                        <p><strong>Name:</strong> $user_name</p>
                        <p><strong>Country:</strong> $user_country</p>
                        <p><strong>Active Since: </strong> $last_login</p>
                        <p><strong>Sex:</strong> $user_gender</p>
                        <p><a href='messages.php?u_id=$user_id'>Messages</a></p>

                        <p><a href='edit_profile.php?u_id=$user_id'>Edit My Account</a></p>
                        <p><a href='posts.php'>My Posts($post_count)</a></p>
                        <p><a href='logout.php'>Logout</a></p>
                        </div>
                    ";
                    ?>
                </div>
            </div>
            <div id="content_timeline">
                <?php
                    if(isset($_GET['u_id'])){
                    $u_id = $_GET['u_id'];

                    $get ="select * from users where user_id='$u_id'";
                    
                    $run = mysqli_query($con,$get);
                    $row_user=mysqli_fetch_array($run);
                    $image = $row_user['user_image'];
                    $name = $row_user['user_name'];
                    }
                ?>


                <h2> Send a message to <span style='color:purple;'></span></h2><br/>
                <img style="border:2px solid blue; border-radius::5px;" src="user/user_images/<?php echo $image;?>" width="100" height="100"/>
                   <br/> <p><strong><?php echo $name;?></strong>
                    <form action="send_message.php?u_id=<?php echo $u_id;?>" method="post" id="f"><br/>
                    <textarea name="msg" cols="40" rows="4" placeholder="Message.." ></textarea><br/>
                    <input type="submit" name="message" value="Send Message"/>
                    </form><br/>
                

                <?php
                if(isset($_POST['message'])){
                    $msg = $_POST['msg'];

                    $insert ="insert into messages (user_id,sender,receiver,message,reply,status,msg_date) values ('$user_id','$user_id','$u_id','$msg','no_reply','unread',NOW())";
                    $run_insert=mysqli_query($con,$insert);
                    
                    if($run_insert){
                        echo "<script>alert(' Message sent ')</script>";
                        echo "<script>window.open('home.php','_self')</script>";


                    }
                    
                    
                    
                }
                ?>
                    

            </div>
        </div>
    </div>



</body>
</html>
<?php } ?>