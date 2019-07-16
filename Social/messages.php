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
               
                
                
                <table witdth ="600" align="center">

                <tr>
                <h2 align="center"> Inbox</h2><br/>
                </tr>
                
                <tr align ="center">
                    <th>Sender</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Reply</th>
                </tr>
                <?php

                $select_message="select * from messages where receiver='$user_id' AND status='unread'";
                $run_message = mysqli_query($con,$select_message);

                $count_message = mysqli_num_rows($run_message);
                while($row_message = mysqli_fetch_array($run_message)){
                    $msg_id= $row_message['msg_id'];
                    $msg_receiver= $row_message['receiver'];
                    $msg_sender= $row_message['sender'];
                    
                    $msg_message= $row_message['message'];
                    $msg_date=$row_message['msg_date'];
                    
                    $get_sender ="select * from users where user_id='$msg_sender'";
                    $run_sender = mysqli_query($con,$get_sender);
                    $row = mysqli_fetch_array($run_sender);

                    $sender_name = $row['user_name'];
                    


            

                ?>
                <tr align="center">
                    <td><?php echo $sender_name;?></td>
                    <td><a href="messages.php?msg_id=<?php echo $msg_id;?>"><?php echo $msg_message;?></a></td>
                    <td><?php echo $msg_date;?></td>
                    <td><a href="messages.php?msg_id=<?php echo $msg_id;?>">Reply</a></td>
                </tr>
                    
                
              <?php  } ?>
              </table>

            </div>
        </div>
    </div>



</body>
</html>
<?php } ?>