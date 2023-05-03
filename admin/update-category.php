<?php include('partials/menu.php') ?>



<?php
    if(!isset($_GET['id'])){
        header('location:'.SITEURL."admin/manage-category.php");
    }else{
        $id = $_GET['id'];

        $sql = "SELECT * FROM tbl_category WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count == 1){
            $rows = mysqli_fetch_assoc($res);

            $id = $rows['id'];
            $title = $rows['title'];
            $image_name = $rows['image_name'];
            $featured = $rows['featured'];
            $active = $rows['active'];

        }else{
            header('location:'.SITEURL."admin/manage-category.php");
        }
    }
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>
        <br>

        <?php
            if(isset($_SESSION['delete-image'])){
                echo $_SESSION['delete-image'];
                unset($_SESSION['delete-image']);
            }
            ?>

        <br>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" id="" value="<?php echo $title;?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
                            if($image_name==""){
                                echo "<div class='fail'>No Image Added</div>";
                            }else{
                                ?>
                                    <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" alt="" width="100px">
                                
                                    <a href="<?php echo SITEURL;?>admin/update-category-delete-image.php?id=<?php echo $id?>&image_name=<?php echo $image_name;?>" class="btn-danger">Remove Image</a>
                                
                                <?php
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>New Image: </td>
                    <td>
                        <input type="file" name="new-image" id="">
                    </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" id=""  value="Yes" <?php if($featured == "Yes"){echo "checked";}?>>Yes
                        <input type="radio" name="featured" id=""  value="No"<?php if($featured == "No"){echo "checked";}?>>No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" id=""  value="Yes" <?php if($active == "Yes"){echo "checked";}?>>Yes
                        <input type="radio" name="active" id=""  value="No"<?php if($active == "No"){echo "checked";}?>>No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="current-image" value="<?php echo $image_name; ?>">
                        <input type="submit" name='submit' value="Update Category" class='btn-secondary'>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php

    if(isset($_POST['submit'])){
        $id2 = $_POST['id'];
        $title2 = $_POST['title'];
        $featured2 = $_POST['featured'];
        $active2 = $_POST['active'];
        $current_image = $_POST['current-image'];
        
        //New Image Data

        $new_image = $_FILES['new-image']['name'];

        if($new_image != ""){
            //Upload New Image
            $ext2 = end(explode(".", $new_image));

            $image_name2 = "Category_Image_".rand(0000, 9999).'.'.$ext2;

            $source_path = $_FILES['new-image']['tmp_name'];
            $dest_path = "../images/category/".$image_name2;
            
            $upload = move_uploaded_file($source_path, $dest_path);
            
            if($upload==FALSE){
                $_SESSION['update-category'] = "<div class='fail'>Failed to upload new image.</div>";
                header("location:".SITEURL."admin/manage-category.php");
                die();
            }

            if($current_image != ""){
                //Delete old image
                $delete_path = "../images/category/".$current_image;
                $delete_image = unlink($delete_path);

                if($delete_image==FALSE){
                    $_SESSION['update-category'] = "<div class='fail'>Failed to delete current image.</div>";
                    header("location:".SITEURL."admin/manage-category.php");
                    die();
                }
            }

            
           
            //Set image name to new image
        }else{
            $image_name2 = $current_image;
        }

        $sql2 = "UPDATE tbl_category SET
        title='$title2',
        image_name='$image_name2',
        featured='$featured2',
        active='$active2'
        WHERE id=$id2
        ";

        $res2 = mysqli_query($conn, $sql2);

        if($res2==TRUE){
            $_SESSION['update-category'] = "<div class='success'>Category Updated Succesfully</div>";
            header("location:".SITEURL."admin/manage-category.php");
        }else{
            $_SESSION['update-category'] = "<div class='fail'>Category Update Failed</div>";
            header("location:".SITEURL."admin/manage-category.php");
        }
        
    }
?>
<?php include('partials/footer.php') ?>