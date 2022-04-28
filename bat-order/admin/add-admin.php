<?php include('partials/menu.php')?>

     <!-- Main Content Section Starts -->
     <div class="main-content">
               <div class="wrapper">
                    <h1>Add Admin</h1>

                    <br><br>

                    <?php
                         if(isset($_SESSION['add'])) //Checking whether the session is set or not
                         {
                              echo $_SESSION['add']; //Display the session message if set
                              unset($_SESSION['add']); //remove session message
                         }
                    ?>

                    <form action="" method="POST">

                         <table class="tbl-30">
                              <tr>
                                   <td>Full Name:</td>
                                   <td><Input type="text" name="full_name" placeholder="Enter Your Full Name"></td>
                              </tr>

                              <tr>
                                   <td>Username:</td>
                                   <td><Input type="text" name="username" placeholder="Enter Your Username"></td>
                              </tr>

                              <tr>
                                   <td>Password:</td>
                                   <td><Input type="password" name="password" placeholder="Enter Your Password"></td>
                              </tr>

                              <tr>
                                   <td colspan="2">
                                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                                   </td>
                              </tr>
                         </table>

                    </form>

               </div>
          </div>
          <!-- Main Content Section Ends -->

<?php include('partials/footer.php')?>

<?php
     //Process the Value from and save it in Database
     //Check whether the submit button is clicked or not

     if(isset($_POST['submit']))
     {
          //Comment: Button clicked 
          //echo"Button Clicked";

          //Get the data from form
          $full_name = $_POST['full_name'];
          $username = $_POST['username'];
          $password = md5($_POST['password']); //Password encrypted with MD5

          //2. SQL query to save the data into database
          $sql = "INSERT INTO tbl_admin SET
               full_name='$full_name',
               username='$username',
               password='$password'
          ";
          
          //3. Executing query and sending data into database
          $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

          //4. Check whether the (Query is executed) data is inserted or not and display appropriate message
          if($res==TRUE)
          {
               //Data inserted
               //echo "Data inserted";
               //Create a session variable to display message
               $_SESSION['add'] = "<div class='success'>Admin Added Successfully</div>";

               //Redirect page to menage admin
               header('location:'.SITEURL.'admin/menage-admin.php');
          }
          else
          {
               //Datanot not inserted
               //echo "Data not inserted";
               //Create a session variable to display message
               $_SESSION['add'] = "<div class='error'>Failed to Add Admin</div>";

               //Redirect page to add admin
               header("location:".SITEURL.'admin/add-admin.php');
          }
     }
     //Comment: Button not cliked alert below
     //else
     //{
          //Comment: Button not clicked
          //echo"Button not Clicked";
     //}
?>