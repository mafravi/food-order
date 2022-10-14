<?php include "partials/menu.php"; ?>

<!-- Main content starts -->
<div class="main-content">
  <div class="wrapper">
    <h1>DASHBOARD</h1>
    <?php if (isset($_SESSION['login'])) {
      echo $_SESSION['login'];
      unset($_SESSION['login']);
    }
    ?><br>
    <div class="col-4 text-center">
      <h1>5</h1><br>
      category
    </div>

    <div class="col-4 text-center">
      <h1>5</h1><br>
      category
    </div>

    <div class="col-4 text-center">
      <h1>5</h1><br>
      category
    </div>

    <div class="col-4 text-center">
      <h1>5</h1><br>
      category
    </div>

    <div class="clearfix"></div>

  </div>
</div>
<!-- Menu content ends -->

<?php include "partials/footer.php"; ?>