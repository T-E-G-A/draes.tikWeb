<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Clothes</h1>
        <br>

        <?php 
            if(isset($_SESSION['add'])) 
            {
              echo $_SESSION['add'];
              unset($_SESSION['add']);
            }
      
            if(isset($_SESSION['upload'])) 
            {
              echo $_SESSION['upload'];
              unset($_SESSION['upload']);
            }
       ?> 

       <br><br>
          <!-- Button to add admin-->
          <a href="<?php echo SITEURL;?>admin/add-clothes.php" class="btn-primary">Add Clothes</a>
       <br><br><br>

          
          <table class="tbl-full">
            <tr>
              <th>S.N</th>
              <th>Title</th>
              <th>Price</th>
              <th>Image</th>
              <th>Featured</th>
              <th>Active</th>
              <th>Actions</th>



            </tr>

            <?php
                //create sql query to get all the items
                $sql = "SELECT * FROM tbl_clothes";

                //execute the query
                $res = mysqli_query($conn, $sql);

                //count rows to check if we have items
                $count = mysqli_num_rows($res);

                $sn=1; //create a varaible and assign the value

                if($count>0)
                {
                  // item present in Database
                  // Get the items from Database and Display
                  while($row=mysqli_fetch_assoc($res))
                  {
                    // get the values from individual columns
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                    ?>

                    <tr>
                      <td><?php echo $sn++ ;?></td>
                      <td><?php echo $title ;?></td>
                      <td><?php echo $price ;?></td>
                      <td>
                          <?php echo $image_name;?>
                      </td>
                      <td><?php echo $featured ;?></td>
                      <td><?php echo $active ;?></td>
                      

                      <td>
                      <a href="#" class="btn-secondary">Update Clothes</a>
                      <a href="#" class="btn-tertiary">Delete Clothes</a>
                      </td>
                    </tr>

                    <?php
                  }
                }
                else
                {
                  // item not Added in Database
                  echo "<tr> <td colspan='7' class='error'> item not Added Yet. </td> </tr>";
                }

            ?>
            

            
          </table>
    </div>
    
</div>

<?php include('partials/footer.php');?>