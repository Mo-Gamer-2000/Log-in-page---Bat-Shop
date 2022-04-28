<?php include('../config/constants.php'); ?>

<html>
     <head>
          <title>Login - Bat Order System</title>
          <link rel="stylesheet" href="../css/admin.css">
     </head>

     <body>
          
          <div class="login">
               <h1 class="text-center">Login</h1>
               <br><br>

               <?php 
                    if(isset($_SESSION['login']))
                    {
                         echo $_SESSION['login'];
                         unset($_SESSION['login']);
                    }

                    if(isset($_SESSION['no-login-message']))
                    {
                         echo $_SESSION['no-login-message'];
                         unset($_SESSION['no-login-message']);
                    }
               ?>
               <br><br>

               <!-- Login Form Start here -->
               <form action="" method="POST" class="text-center">
                    Username: <br>
                    <input type="text" name="username" placeholder="Enter Username"> <br><br>

                    Password: <br>
                    <input type="password" name="password" placeholder="Enter Password"> <br><br>

                    <input type="submit" name="submit" value="Login" class="btn-primary">
                    <br><br>
               </form>
               <!-- Login Form Ends here -->

               <p class="text-center">Created by - <a href="www.vijhaythapa.com">Moeez Abdul</a></p>
          </div>

     </body>
</html>

<?php 

     //Check wheteher the submit button is clicked or not
     if(isset($_POST['submit']))
     {
          //Process for Login
          //1. Get the data from login form
          $username = $_POST['username'];
          $password = md5($_POST['password']);

          //2. SQL to check whther the user with the username and password exists or not
          $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

          //3. Execute the query
          $res = mysqli_query($conn, $sql);

          //4. Count rows to check whther the user exists or not
          $count = mysqli_num_rows($res);

          if($count==1)
          {
               //User available and login syccess
               $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
               $_SESSION['user'] = $username; //To check whther the user is logged in or not and logout with unset it

               //Redirect to Home page/dashboard
               header('location:'.SITEURL.'admin/');
          }
          else
          {
               //User not available and login fail
               $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
               //Redirect to Home page/dashboard
               header('location:'.SITEURL.'admin/login.php');
          }

     }
?>