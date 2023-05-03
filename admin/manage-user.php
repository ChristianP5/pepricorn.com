<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <table class="tbl-full">
            <h1>Manage User</h1>
            <br>
            <a href="<?php echo SITEURL;?>admin/add-user.php" class="btn-primary">Add User</a>
            <br><br>
            <?php
                if(isset($_SESSION['add-user'])){
                    echo $_SESSION['add-user'];
                    unset($_SESSION['add-user']);
                }

                if(isset($_SESSION['delete-user'])){
                    echo $_SESSION['delete-user'];
                    unset($_SESSION['delete-user']);
                }

                if(isset($_SESSION['update-user'])){
                    echo $_SESSION['update-user'];
                    unset($_SESSION['update-user']);
                }
            ?>
            <br>
            <tr>
                <th>SN</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Image</th>
                <th>Active</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Email</th>
                <th>DoB</th>
                <th>isAdmin</th>
                <th>isSeller</th>
            </tr>

            <?php
                $sql = "SELECT * FROM tbl_user ORDER BY id DESC";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count > 0){
                    $ssn = 1;
                    while($rows = mysqli_fetch_assoc($res)){
                        $id = $rows['id'];
                        $username = $rows['username'];
                        $full_name = $rows['full_name'];
                        $active = $rows['active'];
                        $address = $rows['address'];
                        $contact = $rows['contact'];
                        $email = $rows['email'];
                        $dob = $rows['DoB'];
                        $isAdmin = $rows['isAdmin'];
                        $image_name = $rows['image_name'];
                        $isSeller = $rows['isSeller'];
                        ?>
                        <tr>
                            <td><?php echo $ssn++;?></td>
                            <td><?php echo $username;?></td>
                            <td><?php echo $full_name;?></td>
                            <td>
                                <?php
                                if($image_name!=""){
                                    ?>
                                    <img src="../images/user/<?php echo $image_name;?>" width="100px" alt="">
                                    <?php
                                }else{
                                    echo "<div class='fail'>No Image Added</div>";
                                }
                                ?>
                            </td>
                            <td><?php echo $active;?></td>
                            <td><?php echo $address;?></td>
                            <td><?php echo $contact;?></td>
                            <td><?php echo $email;?></td>
                            <td><?php echo $dob; ?></td>
                            <td><?php echo $isAdmin;?></td>
                            <td><?php echo $isSeller;?></td>
                            
                            <td>
                                <a href="<?php echo SITEURL;?>admin/update-user.php?id=<?php echo $id;?>" class="btn-secondary">Update User</a>
                                <a href="<?php echo SITEURL;?>admin/delete-user.php?id=<?php echo $id;?>" class="btn-danger">Remove User</a>
                            </td>
                        </tr>
                        <?php
                    }
                }else{
                    echo "<tr><td colspan='3'><div class='fail'>No users in database.</div></td></tr>";
                }
            ?>
            
        </table>
    </div>
</div>
<?php include('partials/footer.php'); ?>