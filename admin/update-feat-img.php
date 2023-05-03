<?php include('partials/menu.php');?>

<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "SELECT * FROM tbl_featuredimages WHERE id='$id'";
        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count != 1){
            header("location:".SITEURL."admin/manage-featured-images.php");
        }else{
            $rows = mysqli_fetch_assoc($res);

            $id = $rows['id'];
            $title = $rows['title'];
            $image_name = $rows['image_name'];
            $section_name = $rows['section_name'];
            $active = $rows['active'];
        }
    }else{

        header("location:".SITEURL."admin/manage-featured-images.php");
    }
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Featured Image</h1>
        <br>
        <?php
            if(isset($_SESSION['delete-image'])){
                echo $_SESSION['delete-image'];
                unset($_SESSION['delete-image']);
            }
            ?>
        <br>
        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" id="" value="<?php echo $title;?>">
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
                                <img src="<?php echo SITEURL;?>images/featured/<?php echo $image_name;?>" alt="" width="100px">
                                
                                <a href="<?php echo SITEURL;?>admin/update-feat-img-delete-image.php?id=<?php echo $id?>&image_name=<?php echo $image_name;?>" class="btn-danger">Remove Image</a>
                                <?php
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>New image: </td>
                    <td>
                        <input type="file" name="new-image" id="">
                    </td>
                </tr>
                <tr>
                    <td>Section Name: </td>
                    <td>
                        <input type="text" name="section-name" id="" value="<?php echo $section_name;?>">
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" id="" value="Yes" <?php if($active == "Yes"){ echo "checked";}?>>Yes
                        <input type="radio" name="active" id="" value="No" <?php if($active == "No"){ echo "checked";}?>>No
                        
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="current-image" value="<?php echo $image_name;?>">
                        <input type="submit" value="Update Featured Image" name="submit" class='btn-secondary'>
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
        $current_image2 = $_POST['current-image'];
        $section_name2 = $_POST['section-name'];
        $active2 = $_POST['active'];

        $new_image2 = $_FILES['new-image']['name'];

        if($new_image2!=""){
            //Upload New Image
            $ext2 = end(explode($new_image2));
            $image_name2 = "Featured-Image-".rand(0000,9999).'.'.$ext2;

            $source_path2 = $_FILES['new-image']['tmp_name'];
            $dest_path2 = '../images/featured/'.$image_name2;

            $upload2 = move_uploaded_file($source_path2, $dest_path2);

            if($upload2 == FALSE){
                $_SESSION['update-featured-images'] = "<div class='fail'>Failed to upload new image.</div>";
                header("location:".SITEURL."admin/manage-featured-images.php");
                die();
            }


            //Remove Old Image
            $remove_path2 = '../images/featured/'.$current_image2;
            $remove2 = unlink($remove_path2);

            if($remove2 == FALSE){
                $_SESSION['update-featured-images'] = "<div class='fail'>Failed to remove old image.</div>";
                header("location:".SITEURL."admin/manage-featured-images.php");
                die();
            }
        }else{
            $image_name2=$current_image2;
        }

        $sql2 = "UPDATE tbl_featuredimages SET
        title='$title2',
        image_name='$image_name2',
        section_name='$section_name2',
        active='$active2'
        WHERE id=$id2";

        $res2 = mysqli_query($conn, $sql2);

        if($res2==TRUE){
            $_SESSION['update-featured-images'] = "<div class='success'>Featured Image Updated Succesfully!</div>";
            header("location:".SITEURL."admin/manage-featured-images.php"); 
        }else{
            $_SESSION['update-featured-images'] = "<div class='fail'>Failed to update Featured Image.</div>";
            header("location:".SITEURL."admin/manage-featured-images.php");
        }
    }
?>
<?php include('partials/footer.php');?>