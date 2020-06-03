<?php if(count($errors) > 0): ?>
        <div class="msg error">
          <?php foreach($errors as $error): ?>
          <li><?=$error;?></li>
          <?php endforeach; ?>
        </div>
<?php endif; ?>