<?php
     //Include constants page
     include('../config/constants.php');

     //echo "YES!!";

     if(isset($_GET['id']) AND isset($_GET['image_name'])) //Either use '&&' or 'AND'
     {
          //Proccess to delete
          //echo "Proccess to delete";

          //1. Get ID and image name
          $id = $_GET['id'];
          $image_name = $_GET['Image_name'];

          //2. Remove the image if available
          //Check whether the image is available or not and delete only if available
          if($image_name != "")
          {
               //It has image and need to remove from the folder
               //Get image path
               $path = "../images/bat/".$image_name;

               //Remove image file from folder
               $remove = unlink($path);

               //Check whether the image is removed or not
               if($remove==false)
               {
                    //Failed to remove image
                    $_SESSION['remove'] = "<div class='error'>Failed to Remove Image File.</div>";
                    //Redirect to menage food
                    header('location:'.SITEURL.'admin/menage-bat.php');
                    //Stop the proccess of deleteing bat
                    die();
               }
               else
               {
                    //
               }
          }

          //3. Delete bat from database
          $sql = "DELETE FROM tbl_bat WHERE id=$id";
          //Execute the query
          $res = mysqli_query($conn, $sql);

          //Check whether the query executed or not and set the session message respectivly
          //4. Redirect to menage bat with session message
          if($res==true)
          {
               //bat deleted
               $_SESSION['delete'] = "<div class='success'>Bat deleted Successfully.</div>";
               header('location:'.SITEURL.'admin/menage-bat.php');
          }
          else
          {
               //Failed to delete bat
               $_SESSION['delete'] = "<div class='error'>Failed to Delete Bat..</div>";
               header('location:'.SITEURL.'admin/menage-bat.php');
          }
     }
     else
     {
          //Redirect to menage bat page
          //echo "redirect";
          $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
          header('location:'.SITEURL.'admin/menage-bat.php');
     }

?>