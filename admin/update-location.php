<?php include('partials/menu.php'); ?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM tbl_location WHERE id=$id";

    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);

    if($count==1){
        $rows = mysqli_fetch_assoc($res);
        
        $id = $rows['id'];
        $name = $rows['name'];
        $active = $rows['active'];

    }else{
        header("location:".SITEURL."admin/manage-location.php");
    }
}else{
    header("location:".SITEURL."admin/manage-location.php");
}
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Location</h1>
        <br>
        
        <br>
        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Name: </td>
                    <td>
                        <input type="text" name="name" id="" value="<?php echo $name;?>">
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes" <?php if($active == 'Yes'){ echo "checked";} ?>>Yes
                        <input type="radio" name="active" value="No" <?php if($active == 'No'){ echo "checked";} ?>>No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" value="Update Locatoin" name='submit' class='btn-secondary'>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
    if(isset($_POST['submit'])){
        $id2 = $_POST['id'];
        $name2 = $_POST['name'];
        $active2 = $_POST['active'];

        $sql2 = "UPDATE tbl_location SET
        name='$name2',
        active='$active2'
        WHERE id=$id2";

        $res2 = mysqli_query($conn, $sql2);

        if($res2==TRUE){
            $_SESSION['update-location'] = "<div class='success'>Location Updated Succesfully</div>";
            header("location:".SITEURL."admin/manage-location.php");
        }else{
            $_SESSION['update-location'] = "<div class='fail'>Location Update Failed.</div>";
            header("location:".SITEURL."admin/manage-location.php");
        }
    }
?>
<?php include('partials/footer.php'); ?>