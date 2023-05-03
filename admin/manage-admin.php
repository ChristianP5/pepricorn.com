<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>
        <br>
        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        <br><br>

        <?php
            if(isset($_SESSION['add-admin'])){
                echo $_SESSION['add-admin'];
                unset($_SESSION['add-admin']);
            }

            if(isset($_SESSION['delete-admin'])){
                echo $_SESSION['delete-admin'];
                unset($_SESSION['delete-admin']);
            }

            if(isset($_SESSION['update-admin'])){
                echo $_SESSION['update-admin'];
                unset($_SESSION['update-admin']);
            }
        ?>
        <table class="tbl-full">
            <tr>
                <th>SN</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
            

            
            <?php
            //Check For Admin Data
            $sql = "SELECT * FROM tbl_admin";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count > 0){
                $ssn = 1;
                while($rows = mysqli_fetch_assoc($res)){
                    $id = $rows['id'];
                    $full_name = $rows['full_name'];
                    $username = $rows['username'];

                    ?>
                    <tr>
                    <td><?php echo $ssn++; ?></td>
                    <td><?php echo $full_name; ?></td>
                    <td><?php echo $username; ?></td>
                    <td>
                        <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondary">Update Admin</a>
                        <?php
                        if($full_name != $_SESSION['user']){
                            ?><a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger">Delete Admin</a>
                            <?php
                        }
                        ?>
                        
                    </td>
                    </tr>
                    <?php
                }
            }else{
                echo "<div class='fail'>No Admins in Database</div>";
            }
            ?>

            
        </table>
    </div>
</div>
<?php include('partials/footer.php');?>