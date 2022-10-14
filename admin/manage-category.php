<?php include "partials/menu.php"; ?>

<div class="main-cantent">
    <div class="wrapper">
        <h1>
            Manage Category
        </h1>
        <br>
        <br>
        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if(isset($_SESSION['delete'])){
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        if(isset($_SESSION['remove'])){
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
        }
        ?><br><br>
        <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add category</a>

        <br>
        <br>
        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
            <?php
            $sn = 1;

            $sql = "SELECT * FROM tbl_category";
            $res = mysqli_query($conn, $sql);
            if ($res == true) {
                $count = mysqli_num_rows($res);
                if ($count > 0) {
                    while ($rows = mysqli_fetch_assoc($res)) {
                        $id = $rows['id'];
                        $title = $rows['title'];
                        $image_name = $rows['image_name'];
                        $featured = $rows['featured'];
                        $active = $rows['active'];
            ?>          <tr>
                            <td><?php echo $sn++ ;?></td>
                            <td><?php echo $title; ?></td>

                            <td>
                                <?php
                                if(!empty($image_name)){
                                    ?>
                                    <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" width="100px">

                                    <?php


                                }else{
                                    echo "<div class='error'>Image not added</div>";
                                }?>
                            </td>

                            <td><?php echo $featured ;?></td>
                            <td><?php echo $active ;?></td>

                            <td>
                                <a href="" class="btn-secondary">Update Category</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name;?>" class="btn-danger">Delete Category</a>
                            </td>
                        </tr>

            <?php

                    }
                }
            }


            ?>

        </table>
    </div>
</div>

<?php include "partials/footer.php"; ?>