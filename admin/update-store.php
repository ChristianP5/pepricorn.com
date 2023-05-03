<?php include('partials/menu.php');?>

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM tbl_store WHERE id=$id";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);

    if($count==1){

        $rows = mysqli_fetch_assoc($res);

        $id = $rows['id'];
        $name = $rows['name'];
        $rating = $rows['rating'];
        $active = $rows['active'];
        $current_image = $rows['image_name'];
        $description = $rows['description'];
        $address = $rows['address'];
        $user_id = $rows['user_id'];
        $location_id = $rows['location_id'];


    }else{
        header("location:".SITEURL."admin/manage-store.php");
    }

}else{
    header("location:".SITEURL."admin/manage-store.php");
}
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Store</h1>
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
                    <td>Name: </td>
                    <td>
                        <input type="text" name="name" id="" value="<?php echo $name;?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Rating: </td>
                    <td>
                        <input type="number" step="0.1" name="rating" id="" value="<?php echo $rating;?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes" id="" <?php if($active=='Yes'){ echo "checked";}?>>Yes
                        <input type="radio" name="active" value="No" id="" <?php if($active=='No'){ echo "checked";}?>>No
                    </td>
                </tr>
                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
                        if($current_image!=""){
                            ?>
                            <img src="../images/store/<?php echo $current_image; ?>" alt="" width="100px">
                            <a href="<?php echo SITEURL;?>admin/update-store-delete-image.php?id=<?php echo $id?>&image_name=<?php echo $current_image;?>" class="btn-danger">Remove Image</a>
                            <?php
                        }else{
                            echo "<div class='fail'>No Image Added</div>";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>New Image: </td>
                    <td>
                        <input type="file" name="image" id="">
                    </td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" id="" cols="30" rows="10"><?php echo $description;?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Address: </td>
                    <td>
                        <input type="text" name="address" id="" value="<?php echo $address;?>">
                    </td>
                </tr>
                <tr>
                    <td>User_name: </td>
                    <td>
                        <select name="user-id" id="">
                            <?php
                            //Select the Users data
                            $sql3 = "SELECT * FROM tbl_user WHERE active='Yes'";
                            $res3 = mysqli_query($conn, $sql3);
                            $count3 = mysqli_num_rows($res3);

                            if($count3>0){
                                while($rows3 = mysqli_fetch_assoc($res3)){
                                    $id3 = $rows3['id'];
                                    $username3 = $rows3['username'];

                                    ?>
                                    <option value="<?php echo $id3;?>" <?php if($user_id==$id3){echo "selected";} ?>><?php echo $username3;?></option>
                                    <?php
                                }
                            }else{
                                echo "<option value='0'>No Users Available.</option>";
                            }
                            ?>
                            <option value="1">Username</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Location_name: </td>
                    <td>
                        <select name="location-id" id="">
                            <?php
                            //Select data from Location Table
                            $sql4 = "SELECT * FROM tbl_location WHERE active='Yes'";
                            $res4 = mysqli_query($conn, $sql4);

                            $count4 = mysqli_num_rows($res4);
                            if($count4 > 0){
                                while($rows4 = mysqli_fetch_assoc($res4)){
                                    $id4 = $rows4['id'];
                                    $name4 = $rows4['name'];
                                    ?>
                                        <option value="<?php echo $id4; ?>" <?php if($location_id==$id4){echo "selected";} ?>><?php echo $name4;?></option>
                                    <?php
                                }
                                
                            }else{
                                echo "<option value='0'>No Locations Available.</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="current-image" value="<?php echo $current_image;?>">
                        <input type="submit" value="Update Store" class='btn-secondary' name='submit'>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
    if(isset($_POST['submit'])){
        //Get Data
        $id2 = $_POST['id'];
        $name2 = $_POST['name'];
        
        $rating2 = $_POST['rating'];

        //Check If Rating Input is too much or not
        if($rating2 > 5){
            $rating2 = 5;
        }elseif($rating2<0){
            $rating2 = 0;
        }else{
            $rating2 = $rating2;
        }
        
        $active2 = $_POST['active'];
        $current_image2 = $_POST['current-image'];
        $new_image2 = $_FILES['image']['name'];
        $description2 = $_POST['description'];
        $address2 = $_POST['address'];
        $user_id2 = $_POST['user-id'];
        $location_id2 = $_POST['location-id'];

        //Check if there is new image
        if($new_image2!=""){
            //Upload New Image
            $ext2 = pathinfo($new_image2, PATHINFO_EXTENSION);

            $image_name2 = 'Store_Image_'.rand(0000,9999).'.'.$ext2;

            $src_path = $_FILES['image']['tmp_name'];
            $dest_path = '../images/store/'.$image_name2;
            $upload = move_uploaded_file($src_path, $dest_path);

            if($upload==FALSE){
                $_SESSION['update-store'] = "<div class='fail'>Failed to upload New Image</div>";
                header("locatoin:".SITEURL."admin/manage-store.php");
                die();
            }

            //Is there Old Image?
            if($current_image2!=""){
                $remove_path = "../images/store/".$current_image2;
                $remove = unlink($remove_path);

                if($remove==FALSE){
                    $_SESSION['update-store'] = "<div class='fail'>Failed to Remove Old Image</div>";
                    header("locatoin:".SITEURL."admin/manage-store.php");
                    die();
                }
            }
        }else{
            $image_name2 = $current_image2;
        }

        //Update Database

        $sql2 = "UPDATE tbl_store SET
        name = '$name2',
        rating = $rating2,
        active = '$active2',
        image_name = '$image_name2',
        description = '$description2',
        address = '$address2',
        user_id = $user_id2,
        location_id = $location_id2
        WHERE id=$id2
        ";

        $res2 = mysqli_query($conn, $sql2);
        if($res2==TRUE){
            $_SESSION['update-store'] = "<div class='success'>Store Updated Successfully!</div>";
            header("location:".SITEURL."admin/manage-store.php");
        }else{
            $_SESSION['update-store'] = "<div class='fail'>Store Update Failed.</div>";
            header("location:".SITEURL."admin/manage-store.php");
        }
    }
?>

<?php include('partials/footer.php');?>