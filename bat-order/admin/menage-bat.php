<?php include('partials/menu.php')?>

          <!-- Main Content Section Starts -->
          <div class="main-content">
               <div class="wrapper">
                    <h1>Menage Bat</h1>

                    <br><br><br>
                    <?php  
                    
                    if(isset($_SESSION['add']))
                    {
                         echo $_SESSION['add'];
                         unset ($_SESSION['add']);
                    }

                    if(isset($_SESSION['delete']))
                    {
                         echo $_SESSION['delete'];
                         unset ($_SESSION['delete']);
                    }

                    if(isset($_SESSION['upload']))
                    {
                         echo $_SESSION['upload'];
                         unset ($_SESSION['upload']);
                    }

                    if(isset($_SESSION['unauthorize']))
                    {
                         echo $_SESSION['unauthorize'];
                         unset ($_SESSION['unauthorize']);
                    }
                    
                    ?>

                         <br><br>

                         <!-- Button to Add Admin -->
                         <a href="<?php echo SITEURL; ?>admin/add-bat.php" class="btn-primary">Add Bat</a>

                         <br><br><br>

                    <table class="tbl-full">
                         <tr>
                              <th>Serial Number</th>
                              <th>Title</th>
                              <th>Price</th>
                              <th>Image</th>
                              <th>Featured</th>
                              <th>Active</th>
                              <th>Actions</th>
                         </tr>

                         <?php  
                              //Create SQL query to get all the bats
                              $sql = "SELECT * FROM tbl_bat";

                              //Execute the query
                              $res = mysqli_query($conn, $sql);

                              //Count the rows to check whether we have vats or not
                              $count = mysqli_num_rows($res);

                              //Create serial number variable and set default value as 1
                              $sn=1;
                              
                              if($count>0)
                              {
                                   //we have bat in database
                                   //Get the bats from database and display
                                   while($row=mysqli_fetch_assoc($res))
                                   {
                                        //Get the value from the individual columns
                                        $id = $row['id'];
                                        $title = $row['title'];
                                        $price = $row['price'];
                                        $image_name = $row['image_name'];
                                        $featured = $row['featured'];
                                        $active = $row['active'];
                                        ?>

                                        <tr>
                                             <td><?php echo $sn++; ?></td>
                                             <td><?php echo $title; ?></td>
                                             <td>£<?php echo $price; ?></td>
                                             <td>
                                                  <?php 
                                                       //Check whether we have image or not
                                                       if($image_name!=="")
                                                       {
                                                             //We have image, display image
                                                             ?>
                                                             <img src="<?php echo SITEURL; ?>images/bat/<?php echo $image_name; ?>" width="100px">
                                                             
                                                             <?php
                                                       }
                                                       else
                                                       {
                                                           //We do not have image, display error message
                                                            echo "<div class='error'>Image not Added.</div>";
                                                       }
                                                  ?>
                                             </td>
                                             <td><?php echo $featured; ?></td>
                                             <td><?php echo $active; ?></td>
                                             <td>
                                                  <a href="<?php echo SITEURL; ?>admin/update-bat.php?id=<?php echo $id; ?>" class="btn-secondary">Update Bat</a>
                                                  <a href="<?php echo SITEURL; ?>admin/delete-bat.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Bat</a>
                                             </td>
                                        </tr>

                                        <?php
                                   }
                              }
                              else
                              {
                                   //Bat not added in database
                                   ?>

                                   <tr>
                                        <td colspan="7"><div class="error">Bat not Added Yet.</div></td>
                                   </tr>

                                   <?php 
                              }
                         ?>
                    </table>
               </div>
          </div>
          <!-- Main Content Section Ends -->

<?php include('partials/footer.php')?>