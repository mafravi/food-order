<?php include "partials/menu.php"; ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }

        ?>


        <form action="" method="POST">

            <table class="tbl_30">
                <tr>
                    <td>Current Password:</td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                </tr>
                <tr>
                    <td>New Password</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confrim Password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="change Password" class="btn_secondary">
                    </td>
                </tr>
            </table>
        </form>

    </div>
</div>

<?php
if(isset($_POST['submit'])){
$id = $_POST['id'];
$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];

$sql = "SELECT * FROM tbl_admin WHERE id=$id";

$res = mysqli_query($conn,$sql);
$count = mysqli_num_rows($res);
if ($res = true) {

    if ($count == 1) {


        if ($new_password == $confirm_password) {
            $sql2 = "UPDATE tbl_admin SET
                password=$new_password
                WHERE id=$id";
            $res2 = mysqli_query($conn, $sql);
            if ($res2 == true) {
                $_SESSION['change-pwd'] = "Password Changed succesfully";
                header('location:' . SITEURL . 'admin/manage-admin.php');
            } else {
                $_SESSION['change-pwd'] = " faild to  Changed the Password";
                header('location:' . SITEURL . 'admin/manage-admin.php');
            }
        } else {
            $_SESSION['pwd-not-match'] = "Password not Match";
            header('location:' . SITEURL . 'admin/manage-admin.php');
        }
    } else {
        $_SESSION['user-not-found'] = "User Not Found";
        header('location:' . SITEURL . 'admin/manage-admin.php');
    }
}
}



?>



<?php include "partials/footer.php"; ?>