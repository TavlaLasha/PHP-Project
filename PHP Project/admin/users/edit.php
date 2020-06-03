<?php
  include "../../App/database/db.php";
  include "../../App/helpers/validateUser.php";
  include "../../App/controllers/users.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <!-- Custom Styles -->
  <link rel="stylesheet" href="../../Assets/css/style.css">

  <!-- Admin Styling -->
  <link rel="stylesheet" href="../../Assets/css/admin.css">

  <title>Admin - Edit Admin User</title>
</head>

<body>

  <?php
    include "../../App/blocks/adminHeader.php";
  ?>

  <div class="admin-wrapper clearfix">
    <?php
      include "../../App/blocks/adminSidebar.php";
    ?>

    <!-- Admin Content -->
    <div class="admin-content clearfix">
      <div class="button-group">
        <a href="create.php" class="btn btn-sm">Add User</a>
        <a href="index.php" class="btn btn-sm">Manage Users</a>
      </div>
      <div class="">
        <h2 style="text-align: center;">Edit User</h2>

        <form action="edit.php" method="post">
          <input type="hidden" name="id" value="<?=$id; ?>">
          <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" value="<?=$username; ?>" class="text-input">
          </div>
          <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="<?=$email; ?>" class="text-input">
          </div>
          <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" value="<?=$password; ?>" class="text-input">
          </div>
          <div class="input-group">
            <label>Confirm Password</label>
            <input type="password" name="passwordConf" value="<?=$passwordConf; ?>" class="text-input">
          </div>
          <div class="input-group">
          <?php if(isset($admin) && $admin == 1): ?>
            <input type="checkbox" name="admin" checked>
            <label>Admin</label>
          <?php else: ?>
            <input type="checkbox" name="admin">
            <label>Admin</label>
          <?php endif; ?>
          </div>
          <div class="input-group">
            <button type="submit" name="update-user" class="btn">Update User</button>
          </div>
        </form>

      </div>
    </div>
    <!-- // Admin Content -->

  </div>


  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- CKEditor 5 -->
  <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>

  <!-- Custome Scripts -->
  <script src="../../Assets/js/scripts.js"></script>

</body>

</html>