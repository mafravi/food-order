<?php include "../config/constants.php"; ?>

<html>

<head>
    <title>Login - Food Order System</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div class="login">
        <h1 class="text-center">Login</h1><br>
        <?php if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        if (isset($_SESSION['not-login-message'])) {
            echo $_SESSION['not-login-message'];
            unset($_SESSION['not-login-message']);
        }

        ?><br>
        <form action="" method="post">
            Username: <br>
            <input type="text" name="username" placeholder="Enter Username"><br><br>
            Password: <br>
            <input type="text" name="password" placeholder="Enter Password"><br><br>
            <input type="submit" name="submit" value="Login" class="btn-primary">
        </form>
    </div>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    if ($count==1) {
        $_SESSION['login'] = "Login Successfully";
        $_SESSION['user'] = $username;
        header('location:' . SITEURL . 'admin/manage-admin.php');
    } else {
        $_SESSION['login'] = " Failed to Login ";
        header('location:' . SITEURL . 'admin/login.php');
    }
}
?>