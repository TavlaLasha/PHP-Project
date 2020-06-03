<header class="clearfix">
    <div class="logo">
      <a href="index.php">
        <h1 class="logo-text"><span>BMW </span>Center</h1>
      </a>
    </div>
    <div class="fa fa-reorder menu-toggle"></div>
    <nav>
      <ul>
        <li><a href="<?=url().'index.php'; ?>">Home</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="#">About Us</a></li>

        <?php if(isset($_SESSION['id'])): ?>
          <li>
            <a href="#" class="userinfo">
              <i class="fa fa-user"></i>
              <?=$_SESSION['username'];?>
              <i class="fa fa-chevron-down"></i>
            </a>
            <ul class="dropdown">
            <?php if($_SESSION['admin']):?>
              <li><a href="admin/dashboard/dashboard.php">Dashboard</a></li>
            <?php endif;?>
              <li><a href="logout.php" class="logout">logout</a></li>
            </ul>
          </li>
        <?php else: ?>
          <li><a href="register.php">Sign up</a></li>
          <li><a href="login.php"><i class="fa fa-sign-in"></i>Login</a></li>
        <?php endif; ?>
      </ul>
    </nav>
</header>