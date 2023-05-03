<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Store</h1>
        <br>
        <table class="tbl-30">
            <form action="" method="post" enctype="multipart/form-data">
            <tr>
                <td>Name: </td>
                <td>
                    <input type="text" name='name' required>
                </td>
            </tr>
            <tr>
                <td>Rating (1-5): </td>
                <td>
                    <input type="number" step="0.1" name="rating" id="">
                    
                </td>
            </tr>
            <tr>
                <td>Active: </td>
                <td>
                    <input type="radio" name="active" id="" value="Yes">Yes
                    <input type="radio" name="active" id="" value="No">No
                </td>
            </tr>
            <tr>
                <td>Image: </td>
                <td>
                    <input type="file" name="image" id="">
                </td>
            </tr>
            <tr>
                <td>Description: </td>
                <td>
                    <textarea name="description" id="" cols="30" rows="10"></textarea>
                </td>
            </tr>
            <tr>
                <td>Address: </td>
                <td>
                    <input type="text" name="address" id="">
                </td>
            </tr>
            <tr>
                <td>User_username: </td>
                <td>
                    <select name="user-username" id="">
                        <?php
                        //Select the Users data
                        $sql = "SELECT * FROM tbl_user WHERE active='Yes'";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);

                        if($count>0){
                            while($rows = mysqli_fetch_assoc($res)){
                                $id = $rows['id'];
                                $username = $rows['username'];

                                ?>
                                <option value="<?php echo $id;?>"><?php echo $username;?></option>
                                <?php
                            }
                        }else{
                            echo "<option value='0'>No Users Available.</option>";
                        }
                        ?>
                        
                    </select>
                </td>
            </tr>
            <tr>
                <td>Location_name: </td>
                <td>
                    <select name="location-name" id="">
                        <?php
                        //Select data from Location Table
                        $sql2 = "SELECT * FROM tbl_location WHERE active='Yes'";
                        $res2 = mysqli_query($conn, $sql2);

                        $count2 = mysqli_num_rows($res2);
                        if($count2 > 0){
                            while($rows2 = mysqli_fetch_assoc($res2)){
                                $id2 = $rows2['id'];
                                $name2 = $rows2['name'];
                                ?>
                                    <option value="<?php echo $id2; ?>"><?php echo $name2;?></option>
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
                    <input type="submit" value="Add Store" name='submit' class='btn-secondary'>
                </td>
            </tr>
            </form>
        </table>
    </div>
</div>

<?php
    if(isset($_POST['submit'])){
        $store_name = $_POST['name'];
        $store_rating = $_POST['rating'];
        //Check If Rating Input is too much or not
        if($store_rating > 5){
            $store_rating = 5;
        }elseif($store_rating<0){
            $store_rating = 0;
        }else{
            $store_rating = $store_rating;
        }

        $store_description = $_POST['description'];
        $store_address = $_POST['address'];
        $store_user_id = $_POST['user-username'];
        $store_location_id = $_POST['location-name'];
        
        if(isset($_POST['active'])){
            $store_active = $_POST['active'];
        }else{
            $store_active = 'No';
        }

        $image_name = $_FILES['image']['name'];
        if($image_name != ""){
            //There is Image
            $ext = pathinfo($image_name, PATHINFO_EXTENSION);

            $image_name = 'Store_Image_'.rand(0000,9999).'.'.$ext;
            
            $src_path = $_FILES['image']['tmp_name'];
            $dest_path = "../images/store/".$image_name;

            $upload = move_uploaded_file($src_path, $dest_path);
            
            if($upload==FALSE){
                $_SESSION['add-store'] = "<div class='fail'>Failed to upload Store Image</div>";
                header("location:".SITEURL."admin/manage-store.php");
                die();
            }

        }else{
            //There is No Image
            $image_name = "";
        }

        //Insert into database
        $sql3 = "INSERT INTO tbl_store SET
        name = '$store_name',
        rating = $store_rating,
        active = '$store_active',
        image_name = '$image_name',
        description = '$store_description',
        address = '$store_address',
        user_id = $store_user_id,
        location_id = $store_location_id
        ";

        $res3 = mysqli_query($conn, $sql3);

        if($res3==TRUE){
            $_SESSION['add-store'] = "<div class='success'>Store added successfully!</div>";
            header("location:".SITEURL."admin/manage-store.php");
        }else{
            $_SESSION['add-store'] = "<div class='fail'>Failed to add Store</div>";
            header("location:".SITEURL."admin/manage-store.php");
        }
        
    }
?>
<?php include('partials/footer.php'); ?>

