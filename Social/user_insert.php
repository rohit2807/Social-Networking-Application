<?php
include("includes/connection.php");
if(isset($_POST['sign_up'])){
            
            $name = mysqli_real_escape_string($con, $_POST['u_name']);
            $pass = mysqli_real_escape_string($con, $_POST['u_pass']);
            $email = mysqli_real_escape_string($con, $_POST['u_email']);
            $country = mysqli_real_escape_string($con, $_POST['u_country']);
            $gender = mysqli_real_escape_string($con, $_POST['u_gender']);
            $b_day = mysqli_real_escape_string($con, $_POST['u_birthday']);
            $date  = date("d-m-y");
            $status = "unverified";
            $posts = "No";
            $page= "No";
            


            $get_email = "select * from users where user_email='$email'";
            $run_email = mysqli_query($con,$get_email);
            $check = mysqli_num_rows($run_email);

            if($check==1){
                echo "<script>alert('Already registered email. Please use other emial or try to login with the existing one')</script>";
                exit();
            }
            if(strlen($pass)<8){
                echo "<script>alert('Please enter a password of minimum 8 characters')</script>";
            }
            else{
            
            $insert = "insert into users(user_name,user_pass,user_email,user_country, user_gender,user_b_day, user_image, register_date, last_login, status, posts,page,today_date) values ('$name','$pass','$email','$country','$gender','$b_day','default.jpg',NOW(),NOW(),'$status','$posts','$page','$date')";
            
            $run_insert = mysqli_query($con,$insert);
                if($run_insert){
                    $_SESSION['user_email']=$email;
                    echo "<script>alert(' Congratulations!!! You have registered successfully')</script>";
                    echo "<script>window.open('home.php','_self')</script>";
                }
                
            }

}

?>
