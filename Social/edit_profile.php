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
                    $user_pass = $row['user_pass'];
                    $user_email = $row['user_email'];
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

                        <p><a href='edit_profile.php?u_id=$user_id'>Edit My Account</a></p>
                        <p><a href='posts.php'>My Posts</a></p>
                        <p><a href='logout.php'>Logout</a></p>
                        </div>
                    ";
                    ?>
                </div>
            </div>
            <div id="content_timeline">
                <h2>Edit your Profile </h2><br/>
                <form action="" method="post" id="f" class="ff" enctype="multipart/form-data">
                    <table align="center" width="400">
                        <tr>
                            <td align="right">Name:</td>
                            <td>
                                <input type="text" name="u_name"  required="required" value="<?php echo $user_name?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">Password:</td>
                            <td>
                                <input type="password" name="u_pass" required="required" value="<?php echo $user_pass?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">Email:</td>
                            <td>
                                <input type="email" name="u_email"  required="required" value="<?php echo $user_email?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" >Country:</td>
                            <td>
                                <select name="u_country">
                                    <option> <?php echo $user_country?></option>
                                    <option> India</option>
                                    <option> United States</option>
                                    <option> UAE</option>
                                    <option> United Kingdom</option>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" >Gender:</td>
                            <td>
                                <select name="u_gender" disabled="disabled" >
                                    <option><?php echo $user_gender?></option>
                                    <option> Male</option>
                                    <option> Female</option>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" >Birthday:</td>
                            <td>
                                <input type="date" disabled="disabled" value="<?php echo $user_b_day?>" />
                            </td>
                        </tr>
                        <tr>
                            <td align="right" >Profile Picture:</td>
                            <td>
                                <input type="file" name="u_image" />
                            </td>
                        </tr>
                        <tr align="center">
                            <td colspan="6">
                                <input type="submit" name="update" value="Update">
                            </td>
                        </tr>
                    </table>
                </form>
<?php
    if(isset($_POST['update'])){
        $u_name =$_POST['u_name'];
        $u_pass =$_POST['u_pass'];
        $u_email =$_POST['u_email'];
        $u_country =$_POST['u_country'];
        $u_image =$_FILES['u_image']['name'];
        $image_temp = $_FILES['u_image']['tmp_name'];

        move_uploaded_file($image_temp,"user/user_images/$u_image");
        $update = "update users set user_name='$u_name',user_pass='$u_pass',user_email='$u_email',user_country='$u_country',user_image='$u_image' where user_id='$user_id'";
        $update_commit = mysqli_query($con, $update);
        if($update_commit){
            echo "<script>alert('You have updated your profile'</script>";
            echo"<script>window.open('home.php','_self')</script>";
        }

    }
?>
                
                
            </div>
        </div>
    </div>



</body>
</html>
<?php } ?>