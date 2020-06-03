<?php
  include "App/database/db.php";
  include "App/helpers/validatePost.php";
  include "App/controllers/posts.php";
  include "path.php";

  if(isset($_GET['id'])){
    $post = selectOne('posts', ['id' => $_GET['id']]);
  }
  $topics = selectAll('topics');
  $posts = selectAll('posts', ['published' => 1]);
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

  <title>About Us | BMW</title>
</head>

<body>
  <?php include "App/blocks/header.php"; ?>

  <div id="fb-root"></div>
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
    <!-- content -->
    <div class="content clearfix">
      <div class="page-content single">
        <h2 style="text-align: center;">About Us</h2>
        BMW of North America, LLC (BMW NA) was established in 1975 as the United States 
        importer of BMW luxury/performance vehicles. BMW of North America assumed import 
        and distribution responsibilities for BMW motorcycles in 1980. BMW of North America 
        also began to distribute light trucks in 1999. BMW of North America's Corporate 
        Headquarters is located in Woodcliff Lake, New Jersey. Its Eastern Regional 
        Headquarters and Technical Training Center is located in Woodcliff Lake, 
        New Jersey. A Vehicle Preparation Center is in Port Jersey, NJ and a Regional 
        Distribution Center is in Nazareth, PA
      </div>

      <div class="sidebar single">
        <!-- fb page -->
        <div class="fb-page" data-href="https://www.facebook.com/bmwperformancecenter/"
          data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
          <blockquote cite="https://www.facebook.com/bmwperformancecenter/" class="fb-xfbml-parse-ignore"><a
              href="https://www.facebook.com/bmwperformancecenter/">Piece of Advice</a></blockquote>
        </div>
        <!-- // fb page -->

        <!-- Popular Posts -->
        <div class="section popular">
          <h2>Popular</h2>
          <?php foreach($posts as $p): ?>
            <div class="post clearfix">
              <img src="Assets/images/image_1.png">
              <a href="" class="title"><?=$p['title']; ?></a>
            </div>
          <?php endforeach; ?>

        </div>
        <!-- // Popular Posts -->

        <!-- topics -->
        <div class="section topics">
          <h2>Topics</h2>
          <ul>
            <?php foreach($topics as $topic): ?>
              <a href="<?= 'index.php?t_id=' . $topic['id'] . '&name=' . $topic['name']; ?>">
                <li><?=$topic['name']; ?></li>
              </a>
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