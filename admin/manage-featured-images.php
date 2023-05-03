<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Featured Images</h1>
        <br>
        <?php
            if(isset($_SESSION['add-featured-images'])){
                echo $_SESSION['add-featured-images'];
                unset($_SESSION['add-featured-images']);
            }

            if(isset($_SESSION['delete-featured-images'])){
                echo $_SESSION['delete-featured-images'];
                unset($_SESSION['delete-featured-images']);
            }

            if(isset($_SESSION['update-featured-images'])){
                echo $_SESSION['update-featured-images'];
                unset($_SESSION['update-featured-images']);
            }
        ?>
        <br>
        
        <a href="<?php echo SITEURL;?>admin/add-feat-img.php" class="btn-primary">Add Featured Images</a>

        <br><br>
        <table class="tbl-full">
            <tr>
                <th>SN</th>
                <th>Title</th>
                <th>Image Name</th>
                <th>Section Name</th>
                <th>Active</th>
                <th>Action</th>
            </tr>

            <?php
                $sql = "SELECT * FROM tbl_featuredimages";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count > 0){
                    $ssn = 1;
                    while($rows = mysqli_fetch_assoc($res)){
                        $id = $rows['id'];
                        $title = $rows['title'];
                        $image_name = $rows['image_name'];
                        $active = $rows['active'];
                        $section_name = $rows['section_name'];
                        
                        ?>

                        <tr>
                            <td><?php echo $ssn++; ?></td>
                            <td><?php echo $title; ?></td>
                            <td>
                                <?php
                                    if($image_name!=""){
                                        ?><img src="../images/featured/<?php echo $image_name; ?>" alt=""  width="100px"><?php
                                    }else{
                                        echo "<div class='fail'>No Image Added</div>";
                                    }
                                ?>
                            </td>
                            <td><?php echo $section_name; ?></td>
                            <td><?php echo $active; ?></td>
                            <td>
                                <a href="<?php echo SITEURL;?>admin/update-feat-img.php?id=<?php echo $id; ?>" class="btn-secondary">Update Featured Image</a>
                                <a href="<?php echo SITEURL;?>admin/delete-feat-img.php?id=<?php echo $id; ?>" class="btn-danger">Remove Featured Image</a>
                            </td>
                        </tr>

                        <?php
                    }
                }else{
                    echo "<tr><td><div class='fail'>There is no Featured Images in database.</div></td></tr>";
                }
            ?>
            
        </table>
    </div>
</div>
<?php include('partials/footer.php');?>