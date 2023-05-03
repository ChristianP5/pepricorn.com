<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add User</h1>
        <br>
        <?php
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
                    <td><input type="text" name="username" id="" value="<?php if(isset($_SESSION['add-username'])) {echo $_SESSION['add-username'];} ?>" required></td>
                </tr>
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full-name" id="" value="<?php if(isset($_SESSION['add-full-name'])) {echo $_SESSION['add-full-name'];} ?>" required></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" id="" required></td>
                </tr>
                <tr>
                    <td>Confirm Password: </td>
                    <td><input type="password" name="confirm-password" id="" required></td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                    <input type="radio" name="active" id="" value="Yes" <?php if(isset($_SESSION['add-active'])){ if($_SESSION['add-active']=='Yes'){ echo "checked";}}?>>Yes
                    <input type="radio" name="active" id="" value="No" <?php if(isset($_SESSION['add-active'])){ if($_SESSION['add-active']=='No'){ echo "checked";}}?>>No
                    </td>
                </tr>
                <tr>
                    <td>Address: </td>
                    <td>
                        <input type="text" name="address" id="" value="<?php if(isset($_SESSION['add-address'])) {echo $_SESSION['add-address'];} ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Contact: </td>
                    <td>
                        <input type="number" name="contact" id="" value="<?php if(isset($_SESSION['add-contact'])) {echo $_SESSION['add-contact'];} ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td>
                        <input type="email" name="email" id="" value="<?php if(isset($_SESSION['add-email'])) {echo $_SESSION['add-email'];} ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Date of Birth: </td>
                    <td>
                        <input type="date" name="dob" id="" value="<?php if(isset($_SESSION['add-dob'])) {echo $_SESSION['add-dob'];} ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Is Admin: </td>
                    <td>
                    <input type="radio" name="isAdmin" id="" value="Yes" <?php if(isset($_SESSION['add-isAdmin'])){ if($_SESSION['add-isAdmin']=='Yes'){ echo "checked";}}?>>Yes
                    <input type="radio" name="isAdmin" id="" value="No"<?php if(isset($_SESSION['add-isAdmin'])){ if($_SESSION['add-isAdmin']=='No'){ echo "checked";}}?>>No
                    </td>
                </tr>
                <tr>
                    <td>Is Seller: </td>
                    <td>
                    <input type="radio" name="isSeller" id="" value="Yes" <?php if(isset($_SESSION['add-isSeller'])){ if($_SESSION['add-isSeller']=='Yes'){ echo "checked";}}?>>Yes
                    <input type="radio" name="isSeller" id="" value="No" <?php if(isset($_SESSION['add-isSeller'])){ if($_SESSION['add-isSeller']=='No'){ echo "checked";}}?>>No
                    </td>
                </tr>
                <tr>
                    <td>Profile Picture (optional): </td>
                    <td>
                        <input type="file" name="image" id="">
                    </td>
                </tr>
                <tr>
                    <td  colspan="2">
                        <input type="submit" value="Add User" class="btn-secondary" name='submit'>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $full_name = $_POST['full-name'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $dob = $_POST['dob'];
        
        //Set Default Value
        if(isset($_POST['active'])){
            $active = $_POST['active'];
        }else{
            $active = "No";
        }

        if(isset($_POST['isAdmin'])){
            $isAdmin = $_POST['isAdmin'];
        }else{
            $isAdmin = "No";
        }

        if(isset($_POST['isSeller'])){
            $isSeller = $_POST['isSeller'];
        }else{
            $isSeller = "No";
        }


        //Save Values before reset
        $_SESSION['add-username'] = $username;
        $_SESSION['add-full-name'] = $full_name;
        $_SESSION['add-contact'] = $contact;
        $_SESSION['add-email'] = $email;
        $_SESSION['add-address'] = $address;
        $_SESSION['add-active'] = $active;
        $_SESSION['add-isAdmin'] = $isAdmin;
        $_SESSION['add-isSeller'] = $isSeller;
        $_SESSION['add-dob'] = $dob;

        //Confirm Password == Password
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm-password'];

        if($password!=$confirm_password){
            $_SESSION['not-match'] = "<div class='fail'>Password and Confirm Password does not match.</div>";
            header("location:".SITEURL."admin/add-user.php");
            die();
        }

        //Remove Saved Values if not going to reset
        if(isset($_SESSION['add-username'])){
            unset($_SESSION['add-username']);
        }
        if(isset($_SESSION['add-full-name'])){
            unset($_SESSION['add-full-name']);
        }
        if(isset($_SESSION['add-contact'])){
            unset($_SESSION['add-contact']);
        }
        if(isset($_SESSION['add-email'])){
            unset($_SESSION['add-email']);
        }
        if(isset($_SESSION['add-address'])){
            unset($_SESSION['add-address']);
        }
        if(isset($_SESSION['add-active'])){
            unset($_SESSION['add-active']);
        }
        if(isset($_SESSION['add-isAdmin'])){
            unset($_SESSION['add-isAdmin']);
        }
    
        if(isset($_SESSION['add-isSeller'])){
            unset($_SESSION['add-isSeller']);
        }

        if(isset($_SESSION['add-dob'])){
            unset($_SESSION['add-dob']);
        }


        

        //Upload Image
        $image_name = $_FILES['image']['name'];
        if($image_name != ""){
            //Image Exists
            //Rename Image Name
            $ext = pathinfo($image_name, PATHINFO_EXTENSION);

            $image_name = "Profile-Picture-".rand(00000, 99999).'.'.$ext;

            //Upload Image
            $source_path = $_FILES['image']['tmp_name'];
            $dest_path = '../images/user/'.$image_name;
            $upload = move_uploaded_file($source_path, $dest_path);

            if($upload==FALSE){
                $_SESSION['add-user'] = "<div class='fail'>Failed to upload image.</div>";
                header("location:".SITEURL."admin/manage-user.php");
            }
        }

        //Encrypt Password
        $password = md5($password);

        //Add Image Name to Database
        $sql = "INSERT INTO tbl_user SET
        username = '$username',
        full_name = '$full_name',
        active = '$active',
        password = '$password',
        address = '$address',
        contact = '$contact',
        email = '$email',
        isAdmin = '$isAdmin',
        isSeller = '$isSeller',
        image_name = '$image_name',
        DoB = '$dob';
        ";

        $res = mysqli_query($conn, $sql);

        if($res==TRUE){
            $_SESSION['add-user'] = "<div class='success'>User Added Successfully!</div>";
            header("location:".SITEURL."admin/manage-user.php");
        }else{
            $_SESSION['add-user'] = "<div class='fail'>Failed Adding User. Try Again</div>";
            header("location:".SITEURL."admin/manage-user.php");
        }
    }

include('partials/footer.php');?>