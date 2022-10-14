<?php include "partials/menu.php"; ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br><br>

        <?php
        $id = $_GET['id'];

        $sql = "SELECT * FROM tbl_admin WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        if ($res == true) {
            $count = mysqli_num_rows($res);
            if ($count == 1) {
                $row = mysqli_fetch_assoc($res);
                $full_name = $row['full_name'];
                $username = $row['username'];
            } else {
                header('location:' . SITEURL . 'admin/manage-admin.php');
            }
        }



        ?>



        <form action="" method="POST">
            <table class="tbl_30">
                <tr>
                    <td>Full name:</td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                    </td>
                </tr>
                <tr>
                    <td>User name:</td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>">
                    </td>
                </tr>
                <tr>

                    <td colspan="2">
                        <input type="hidden" name="submit" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>





<?php include "partials/footer.php"; ?>

<?php
   if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];

    $sql = "UPDATE tbl_admin SET
    full_name = '$full_name',
    username = '$username' WHERE id='$id'";

    $res = mysqli_query($conn,$sql);

    if($res ==true){
          $_SESSION['update'] ="admin Updated Succefully.";
          header('location:'.SITEURL.'admin/manage-admin.php');
    }else{
        $_SESSION['update'] ="Failed to Updated Admin.";
        header('location:'.SITEURL.'admin/manage-admin.php');

    }



   }

?>