<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="warpper">
        <h1>Manage Store</h1>
        <br>
        <br>
            <a href="add-store.php" class="btn-primary">Add Store</a>
        <br>
        <br>
        <?php
        if(isset($_SESSION['add-store'])){
            echo $_SESSION['add-store'];
            unset($_SESSION['add-store']);
        }

        if(isset($_SESSION['delete-store'])){
            echo $_SESSION['delete-store'];
            unset($_SESSION['delete-store']);
        }

        if(isset($_SESSION['update-store'])){
            echo $_SESSION['update-store'];
            unset($_SESSION['update-store']);
        }
        ?>
        <br>
        <table class="tbl-full">
            <tr>
                <th>SN</th>
                <th>Name</th>
                <th>Image</th>
                <th>Active</th>
                <th>Rating</th>
                <th>Description</th>
                <th>Address</th>
                <th>User_id</th>
                <th>User_name</th>
                <th>Location_id</th>
                <th>Location_name</th>
                <th>Actions</th>
            </tr>
            <?php
            $sql = "SELECT * FROM tbl_store";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if($count>0){
                $ssn = 1;
                while($rows = mysqli_fetch_assoc($res)){
                    //Gather the Data
                    $id = $rows['id'];
                    $name = $rows['name'];
                    $image_name = $rows['image_name'];
                    $rating = $rows['rating'];
                    $active = $rows['active'];
                    $description = $rows['description'];
                    $address = $rows['address'];
                    $user_id = $rows['user_id'];
                    $location_id = $rows['location_id'];

                    $sql2 = "SELECT username FROM tbl_user WHERE id = $user_id";
                    $res2 = mysqli_query($conn, $sql2);
                    $count2 = mysqli_num_rows($res2);
                    if($count2==1){
                        $rows2 = mysqli_fetch_assoc($res2);

                        $user_name = $rows2['username'];
                    }else{
                        $user_name = "NA";
                    }

                    $sql3 = "SELECT name FROM tbl_location WHERE id = $location_id";
                    $res3 = mysqli_query($conn, $sql3);
                    $count3 = mysqli_num_rows($res3);
                    if($count3==1){
                        $rows3 = mysqli_fetch_assoc($res3);

                        $location_name = $rows3['name'];
                    }else{
                        $location_name = "NA";
                    }

                    ?>
                    <tr>
                        <td><?php echo $ssn++; ?></td>
                        <td><?php echo $name;?></td>
                        <td>
                            <?php
                            if($image_name!=""){
                                ?>
                                <img src="../images/store/<?php echo $image_name; ?>" alt="" width="100px">
                                <?php
                            }else{
                                echo "<div class='fail'>No Image Added</div>";
                            }
                            ?>
                            
                        </td>
                        <td><?php echo $active;?></td>
                        <td><?php echo $rating;?></td>
                        <td><?php echo $description;?></td>
                        <td><?php echo $address;?></td>
                        <td><?php echo $user_id;?></td>
                        <td><?php echo $user_name;?></td>
                        <td><?php echo $location_id;?></td>
                        <td><?php echo $location_name;?></td>

                        <td>
                            <a href="<?php echo SITEURL;?>admin/update-store.php?id=<?php echo $id;?>" class="btn-secondary">Update Store</a>
                            <a href="<?php echo SITEURL;?>admin/delete-store.php?id=<?php echo $id;?>" class="btn-danger">Remove Store</a>
                        </td>
                    </tr>
                    <?php

                }
            }else{
                echo "<div class='fail'>No Stores added to database.</div>";
            }
            ?>
            
        </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>