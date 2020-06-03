<header class="clearfix">
    <a class="logo" href="../../index.php">
      <h1 class="logo-text"><span>BMW </span>Center</h1>
    </a>
    <div class="fa fa-reorder menu-toggle"></div>
    <nav>
      <ul>
        <?php if(isset($_SESSION['username'])): ?>
            <li>
            <a href="#" class="userinfo">
              <i class="fa fa-user"></i>
                <?=$_SESSION['username']; ?>
              <i class="fa fa-chevron-down"></i>
            </a>
          <ul class="dropdown">
            <li><a href="../../logout.php" class="logout">logout</a></li>
          </ul>
        </li>
        <?php endif; ?>
      </ul>
    </nav>
</header>