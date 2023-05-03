<?php include('partials/menu.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM tbl_user WHERE id=$id";

    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    if($count==1){
        $rows = mysqli_fetch_assoc($res);
        $id = $rows['id'];
        $username = $rows['username'];
        $full_name = $rows['full_name'];
        $active = $rows['active'];
        $password = $rows['password'];
        $address = $rows['address'];
        $contact = $rows['contact'];
        $email = $rows['email'];
        $dob = $rows['DoB'];
        $isAdmin = $rows['isAdmin'];
        $image_name = $rows['image_name'];
        $isSeller = $rows['isSeller'];

    }else{
        header("location:".SITEURL."admin/manage-user.php");
    }
}else{
    header("location:".SITEURL."admin/manage-user.php");
}
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update User</h1>
        <br>
        <?php
            if(isset($_SESSION['delete-image'])){
                echo $_SESSION['delete-image'];
                unset($_SESSION['delete-image']);
            }
            if(isset($_SESSION['not-match'])){
                echo $_SESSION['not-match'];
                unset($_SESSION['not-match']);
            }
        ?>
        <br>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Username: </td>
                    <td>
                    <input type="text" name="username" id="" value="<?php if(isset($_SESSION['update-username'])){ echo $_SESSION['update-username']; }else{ echo $username;}?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Full Name: </td>
                    <td>
                    <input type="text" name="full-name" id="" value="<?php if(isset($_SESSION['update-full-name'])){ echo $_SESSION['update-full-name']; }else{ echo $full_name;}?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td>
                    <input type="password" name="password" id="" required>
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password: </td>
                    <td>
                    <input type="password" name="confirm-password" id="" required>
                    </td>
                </tr>
                <tr>
                    <td>Address: </td>
                    <td>
                    <input type="text" name="address" id="" value="<?php if(isset($_SESSION['update-address'])){ echo $_SESSION['update-address']; }else{ echo $address;}?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Contact: </td>
                    <td>
                    <input type="number" name="contact" id="" value="<?php if(isset($_SESSION['update-contact'])){ echo $_SESSION['update-contact']; }else{ echo $contact;}?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td>
                    <input type="email" name="email" id="" value="<?php if(isset($_SESSION['update-email'])){ echo $_SESSION['update-email']; }else{ echo $email;}?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Date of Birth: </td>
                    <td>
                    <input type="date" name="dob" id="">
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                    <input type="radio" name="active" id="" value="Yes" <?php if($active=='Yes'){ echo 'checked'; }?>>Yes
                    <input type="radio" name="active" id="" value="No" <?php if($active=='No'){ echo 'checked'; }?>>No
                    </td>
                </tr>
                <tr>
                    <td>is Admin: </td>
                    <td>
                    <input type="radio" name="isAdmin" id="" value="Yes" <?php if($isAdmin=='Yes'){ echo 'checked'; }?>>Yes
                    <input type="radio" name="isAdmin" id="" value="No" <?php if($isAdmin=='No'){ echo 'checked'; }?>>No
                    </td>
                </tr>
                <tr>
                    <td>is Seller: </td>
                    <td>
                    <input type="radio" name="isSeller" id="" value="Yes"<?php if($isSeller=='Yes'){ echo 'checked'; }?>>Yes
                    <input type="radio" name="isSeller" id="" value="No" <?php if($isSeller=='No'){ echo 'checked'; }?>>No
                    </td>
                </tr>
                <tr>
                    <td>Current Profile Picture: </td>
                    <td>
                        <?php if($image_name!=""){
                            ?>
                            <img src="../images/user/<?php echo $image_name;?>" alt="" width="100px">
                            <td><a href="<?php echo SITEURL;?>admin/update-user-delete-image.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-danger">Remove Image</a></td>
                            <?php
                            }else{
                            echo "<div class='fail'>No Image Added</div>";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>New Profile Picture: </td>
                    <td>
                        <input type="file" name="image" id="">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="current-image" value="<?php echo $image_name; ?>">
                        <input type="submit" value="Update User" class='btn-secondary' name='submit'>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
    if(isset($_POST['submit'])){
        $id2 = $_POST['id'];
        $username2 = $_POST['username'];
        $full_name2 = $_POST['full-name'];
        $password2 = $_POST['password'];
        $confirm_password2 = $_POST['confirm-password'];
        $address2 = $_POST['address'];
        $contact2 = $_POST['contact'];
        $email2 = $_POST['email'];

        echo $_POST['dob'];

        if($_POST['dob']!=""){
            
            $dob2 = $_POST['dob'];
        }else{
            $dob2 = $dob;
        }
        
        $active2 = $_POST['active'];
        $isAdmin2 = $_POST['isAdmin'];
        $isSeller2 = $_POST['isSeller'];
        $new_image2 = $_FILES['image']['name'];
        $current_image2 = $_POST['current-image'];

        //Password matches  Confirm Password
        if($password2==$confirm_password2){
            if(isset($_SESSION['update-username'])){
                unset($_SESSION['update-username']);
            }
            if(isset($_SESSION['update-full-name'])){
                unset($_SESSION['update-full-name']);
            }
            if(isset($_SESSION['update-address'])){
                unset($_SESSION['update-address']);
            }
            if(isset($_SESSION['update-contact'])){
                unset($_SESSION['update-contact']);
            }
            if(isset($_SESSION['update-email'])){
                unset($_SESSION['update-email']);
            }
            if(isset($_SESSION['update-active'])){
                unset($_SESSION['update-active']);
            }
            if(isset($_SESSION['update-isAdmin'])){
                unset($_SESSION['update-isAdmin']);
            }
            if(isset($_SESSION['update-isSeller'])){
                unset($_SESSION['update-isSeller']);
            }

            $password2 = md5($password2);

        }else{
            //Save Data before Reset
            $_SESSION['update-username'] = $username2;
            $_SESSION['update-full-name'] = $full_name2;
            $_SESSION['update-address'] = $address2;
            $_SESSION['update-contact'] = $contact2;
            $_SESSION['update-email'] = $email2;
            $_SESSION['update-active'] = $active2;
            $_SESSION['update-isAdmin'] = $isAdmin2;
            $_SESSION['update-isSeller'] = $isSeller2;

            //Reset
            $_SESSION['not-match'] = "<div class='fail'>Password and Confirm Passowrd doesn't match.</div>";
            header("location:".SITEURL."admin/update-user.php?id=".$id);
            die();
        }

        //There is new image
        if($new_image2!=""){
            //There is new Image
            //Rename Image Name
            $ext2 = pathinfo($new_image2, PATHINFO_EXTENSION);

            $image_name2 = "Profile-Picture-".rand(00000, 99999).'.'.$ext2;

            //Upload Image
            $source_path2 = $_FILES['image']['tmp_name'];
            $dest_path2 = '../images/user/'.$image_name2;
            $upload2 = move_uploaded_file($source_path2, $dest_path2);

            if($upload2==FALSE){
                $_SESSION['update-user'] = "<div class='fail'>Failed to upload image.</div>";
                header("location:".SITEURL."admin/manage-user.php");
            }

        }else{
            //There is no new Image"
            $image_name2 = $current_image2;
        }


        //Update User Table
         //Add Image Name to Database
         $sql2 = "UPDATE tbl_user SET
         username = '$username2',
         full_name = '$full_name2',
         active = '$active2',
         password = '$password2',
         address = '$address2',
         contact = '$contact2',
         email = '$email2',
         isAdmin = '$isAdmin2',
         isSeller = '$isSeller2',
         image_name = '$image_name2',
         DoB = '$dob2'
         WHERE id = $id2;
         ";

         $res2 = mysqli_query($conn, $sql2);
         if($res2==TRUE){
            $_SESSION['update-user'] = "<div class='success'>User Updated Succesfully</div>";
            header("location:".SITEURL."admin/manage-user.php");
        }else{
            $_SESSION['update-user'] = "<div class='fail'>User Update Failed.</div>";
            header("location:".SITEURL."admin/manage-user.php");
         }
    }
?>
<?php include('partials/footer.php');?>