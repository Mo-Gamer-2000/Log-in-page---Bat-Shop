<?php
     //Include constants.php file here
     include('../config/constants.php');

     //1. Get the ID of the admin to be deleted
     $id = $_GET['id'];

     //2. Create SQL query to delete admin
     $sql = "DELETE FROM tbl_admin WHERE id=$id";

     //Execute the query
     $res = mysqli_query($conn, $sql);

     //Check whether the query executed successfylly or not
     if($res==true)
     {
          //Query executed successfully and admin deleted 
          //echo "Admin deleted";
          //Create session variable to display message
          $_SESSION['delete'] = "<div class='success'>Admin Deleted Successsfully.</div>";
          //Redirect to menage admin page
          header('location:'.SITEURL.'admin/menage-admin.php');
     }
     else
     {
          //Failed to delete admin
          //echo "Failed to delete admin";

          $_SESSION['delete'] = "<div class='error'>Failed to delete admin. Try agian later.</div>";
          header('location:'.SITEURL.'admin/menage-admin.php');
     }
     //3. Redirect to menage admin page with a message (success/error)

?>