<?php
  include "App/database/db.php";
  include "App/controllers/topics.php";
  include "path.php";

  $posts = array();
  $postsTitle = 'Recent Posts';

  if(isset($_GET['t_id'])){
    $posts = getPostsByTopicId($_GET['t_id']);
    $postsTitle = 'You Search For Posts Under "'.$_GET['name'].'"';
  }
  else if(isset($_POST['search-term'])){
    $postsTitle = 'You Search For "'.$_POST['search-term'].'"';
    $posts = searchPosts($_POST['search-term']);
  }else{
    $posts = getPublishedPosts();
  }
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
  <link href="Assets/css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  <title>BMW</title>
</head>
<body>
  <?php
    include "App/blocks/header.php";
    include "App/blocks/message.php";
  ?>
  <script>
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s);
      js.id = id;
      js.src =
        'https://connect.facebook.net/ka_GE/sdk.js#xfbml=1&version=v7.0';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>
  <!-- Page wrapper -->
  <div class="page-wrapper">
    <!-- Posts Slider -->
    <div class="posts-slider">
      <i class="fa fa-chevron-right next"></i>
      <i class="fa fa-chevron-left prev"></i>
      <div class="posts-wrapper">
        <?php  foreach($posts as $post): ?>
        <div class="post">
          <div class="inner-post">
            <img src="<?=BASE_URL.'/Assets/images/'. $post['image']; ?>" alt="IMG" style="height: 200px; width: 100%; border-top-left-radius: 5px; border-top-right-radius: 5px;">
            <div class="post-info">
              <h4><a href="single.php?id=<?=$post['id']; ?>"><?=$post['title']; ?></a></h3>
                <div>
                  <i class="fa fa-user-o"></i> <?=$post['username']; ?>
                  &nbsp;
                  <i class="fa fa-calendar"></i> <?=date('F j, Y', strtotime($post['created_at'])); ?>
                </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <!-- // Posts Slider -->
    <!-- content -->
    <div class="content clearfix">
      <div class="page-content">
        <h1 class="recent-posts-title"><?=$postsTitle; ?></h1>
        <?php foreach($posts as $post): ?>
        <div class="post clearfix">
          <img src="<?=BASE_URL.'/Assets/images/'. $post['image']; ?>" class="post-image" alt="">
          <div class="post-content">
            <h2 class="post-title"><a href="<?=url().'single.php?id='.$post['id']; ?>"><?=$post['title']; ?></a></h2>
            <div class="post-info">
              <i class="fa fa-user-o"></i> <?=$post['username']; ?>
              &nbsp;
              <i class="fa fa-calendar"></i> <?=date('F j, Y', strtotime($post['created_at'])); ?>
            </div>
            <p class="post-body"><?=html_entity_decode(substr($post['body'], 0, 300). '...'); ?>
            </p>
            <a href="single.php?id=<?=$post['id']; ?>" class="read-more">Read More</a>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <div class="sidebar">
        <div class="fb-page" data-href="https://www.facebook.com/bmwperformancecenter/"
          data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
          <blockquote cite="https://www.facebook.com/bmwperformancecenter/" class="fb-xfbml-parse-ignore"><a
              href="https://www.facebook.com/bmwperformancecenter/">BMW Center</a></blockquote>
        </div>
        <!-- Search -->
        <div class="search-div">
          <form action="index.php" method="post">
            <input type="text" name="search-term" class="text-input" placeholder="Search...">
          </form>
        </div>
        <!-- // Search -->
        <!-- topics -->
        <div class="section topics">
          <h2>Topics</h2>
          <ul>
            <?php foreach($topics as $key => $topic): ?>
              <li><a href="<?= 'index.php?t_id=' . $topic['id'] . '&name=' . $topic['name']; ?>"><?=$topic['name']; ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <!-- // topics -->
      </div>
    </div>
    <!-- // content -->
  </div>
  <!-- // page wrapper -->
  <?php include "App/blocks/footer.php"; ?>
  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Slick JS -->
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="Assets/js/scripts.js"></script>
</body>
</html>