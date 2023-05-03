<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>

        <br>
        <?php
            if(isset($_SESSION['add-category'])){
                echo $_SESSION['add-category'];
                unset($_SESSION['add-category']);
            }

            if(isset($_SESSION['delete-category'])){
                echo $_SESSION['delete-category'];
                unset($_SESSION['delete-category']);
            }

            if(isset($_SESSION['update-category'])){
                echo $_SESSION['update-category'];
                unset($_SESSION['update-category']);
            }
        ?>
        <br>
        <a href="add-category.php" class="btn-primary">Add Category</a>
        <br><br>
        <table class="tbl-full">
            <tr>
                <th>SN</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Action</th>
            </tr>

            <?php
                $sql = "SELECT * FROM tbl_category";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count > 0){
                    $ssn = 1;
                    while($rows = mysqli_fetch_assoc($res)){
                        $id = $rows['id'];
                        $title = $rows['title'];
                        $image_name = $rows['image_name'];
                        $featured = $rows['featured'];
                        $active = $rows['active'];
                        ?>
                        <tr>
                            <td><?php echo $ssn++; ?></td>
                            <td><?php echo $title; ?></td>
                            <td>
                                <?php
                                    if($image_name==""){
                                        echo "<div class='fail'>No Image</div>";
                                    }else{
                                        ?><img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="" width="100px"><?php
                                    }
                                ?>
                                
                            </td>
                            <td><?php echo $featured; ?></td>
                            <td><?php echo $active; ?></td>
                            <td>
                                <a href="<?php echo SITEURL;?>admin/update-category.php?id=<?php echo $id;?>" class="btn-secondary">Update Category</a>
                                <a href="<?php echo SITEURL;?>admin/delete-category.php?id=<?php echo $id;?>" class="btn-danger">Delete Category</a>
                            </td>
                        </tr>
                        <?php

                    }
                }else{
                    echo "<tr><td><div class='fail'>No Categories Exist Yet.</div></td></tr>";
                }
            ?>

            
            
        </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>