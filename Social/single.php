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
                    
                    
                    echo"
                        <center><img src='user/user_images/$user_image' width='200' height='200' /></center>
                        <div id='user_mention'>
                        <p><strong>Name:</strong> $user_name</p>
                        <p><strong>Country:</strong> $user_country</p>
                        <p><strong>Active Since: </strong> $last_login</p>
                        <p><strong>Sex:</strong> $user_gender</p>
                        <p><a href='messages.php?u_id=$user_id'>Messages</a></p>

                        <p><a href='edit_profile.php'>Edit My Account</a></p>
                        <p><a href='posts.php'>My Posts</a></p>
                        <p><a href='logout.php'>Logout</a></p>
                        </div>
                    ";
                    ?>
                </div>
            </div>
            <div id="content_timeline">
                
                  <?php include("functions/function_singlepost.php") ?>
                
            </div>
        </div>
    </div>



</body>
</html>
<?php } ?>