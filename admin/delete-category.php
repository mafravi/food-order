<?php
include "../config/constants.php";

if (isset($_GET['id']) AND isset($_GET['image_name'])) {
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];


    if ($image_name != "") {
        $path = "../images/category/" . $image_name;
        $remove = unlink($path);

        if ($remove == false) {
            $_SESSION['remove'] = "Failed to Remove category Image";
            header('location:' . SITEURL . 'admin/manage-category.php');
            die();
        }
    }


    $sql = "DELETE FROM tbl_category WHERE id=$id";
    $res = mysqli_query($conn, $sql);
    if ($res == true) {
        $_SESSION['delete'] = "Category Deleted Successfully";
        header('location:' . SITEURL . 'admin/manage-category.php');
    }
} else {
    header('location:' . SITEURL . 'admin/manage-category.php');
}
