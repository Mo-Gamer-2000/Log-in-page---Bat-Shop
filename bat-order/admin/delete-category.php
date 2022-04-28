<?php 
     //Include constants file
     include('../config/constants.php');

     //echo "Delete Page";
     //Check whether the id and image_name value is set or not
     if(isset($_GET['id']) AND isset($_GET['image_name'])) 
     {
          //Get the value and delete
          //echo "Get value and delete";
          $id = $_GET['id'];
          $image_name = $_GET['image_name'];

          //Remove the physical image file if available 
          if($image_name != "")
          {
               //Image available. So remove it
               $path = "../images/category/".$image_name;
               //Remove gthe image
               $remove = unlink($path);

               //If failed to remove image then  add an error message and stop the process
               if($remove==false)
               {
                    //Set the session message
                    $_SESSION['remove'] = "<div class='error'>Failed to Remove Category Image.</div>";
                    //Redirect to menage category page
                    header('location:'.SITEURL.'admin/menage-categpry.php');
                    //Stop the process
                    die();
               }
          }
          else
          {
               //
          }

          //Delete data from database 

          //SQL query delete data from database
          $sql = "DELETE FROM tbl_category WHERE id=$id";

          //Execute the query
          $res = mysqli_query($conn, $sql);

          //Check whether the data is deleted from database or not
          if($res==true)
          {
               //Set success message and redirect
               $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully.</div>";
               //Redirect to menage category page
               header('location:'.SITEURL.'admin/menage-category.php');
          }
          else
          {
               //Set fail message and redirect
               $_SESSION['delete'] = "<div class='error'>Failed to Delete Category.</div>";
               //Redirect to menage category page
               header('location:'.SITEURL.'admin/menage-category.php');
          }

          //Redirect to menage category page with message

     }
     else
     {
          //Redirect to menage category page
          header('location:'.SITEURL.'admin/menage-category.php');
     }

?>