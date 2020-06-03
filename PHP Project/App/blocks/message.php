<?php if(isset($_SESSION['message'])):?>
    <div class="msg <?=$_SESSION['type'];?>">
      <li><?=$_SESSION['message'];?></li>
      <?php
        unset($_SESSION['message']);
        unset($_SESSION['type']);
      ?>
    </div>
<?php endif;?>