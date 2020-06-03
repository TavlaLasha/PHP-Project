<?php
    $table = 'posts';
    $topics = selectAll('topics');
    $posts = selectAll($table);
    $id = '';
    $title = '';
    $body = '';
    $topic_id = '';
    $published = '';
    $errors = array();

    if(isset($_GET['id'])){
        $post = selectOne($table, ['id' => $_GET['id']]);
        $id = $post['id'];
        $title = $post['title'];
        $body = $post['body'];
        $topic_id = $post['topic_id'];
        $published = $post['published'];
    }
    if(isset($_GET['del_id'])){
        $count = delete($table, $_GET['del_id']);
        $_SESSION['message'] = "Post deleted successfuly";
        $_SESSION['type'] = "Success";
        header('location: ../../admin/posts/index.php');
        exit();
    }
    if(isset($_GET['published']) && isset($_GET['p_id'])){
        $published = $_GET['published'];
        $p_id = $_GET['p_id'];
        $count = update($table, $p_id, ['published' => $published]);
        $_SESSION['message'] = "Post publish state changed!";
        $_SESSION['type'] = "Success";
        header('location: ../../admin/posts/index.php');
        exit();
    }
    if(isset($_POST['save-post'])){
        $errors = validatePost($_POST);
        if(!empty($_FILES['image']['name'])){
            $image_name = $_FILES['image']['name'];
            $destination = ROOT_PATH.'/Assets/images/'.$image_name;
            
            $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
            if($result){
                $_POST['image'] = $image_name;
            }else{
                array_push($errors, "Filed to upload image");
            }
        }else{
            array_push($errors, "Image required!");
        }
        if(count($errors)==0){
            unset($_POST['save-post']);
            $_POST['user_id'] = $_SESSION['id'];
            $_POST['published'] = isset($_POST['publish']) ? 1 : 0;
            $_POST['body'] = htmlentities($_POST['body']);
            unset($_POST['publish']);
            
            $post_id = create($table, $_POST);
            $_SESSION['message'] = "Post created successfuly";
            $_SESSION['type'] = "Success";
            header('location: ../../admin/posts/index.php');
            exit();
        }else{
            $title = $_POST['title'];
            $body = $_POST['body'];
            $topic_id = $_POST['topic_id'];
            $published = isset($_POST['publish']) ? 1 : 0;
        }
    }
    if(isset($_POST['update-post'])){
        $errors = validatePost($_POST);
        if(count($errors)==0){
            $id = $_POST['id'];
            unset($_POST['update-post'], $_POST['id']);
            $_POST['user_id'] = $_SESSION['id'];
            $_POST['published'] = isset($_POST['publish']) ? 1 : 0;
            $_POST['body'] = htmlentities($_POST['body']);
            unset($_POST['publish']);
            
            $post_id = update($table, $id, $_POST);
            $_SESSION['message'] = "Post updated successfuly";
            $_SESSION['type'] = "Success";
            header('location: ../../admin/posts/index.php');
            exit();
        }else{
            $title = $_POST['title'];
            $body = $_POST['body'];
            $topic_id = $_POST['topic_id'];
            $published = isset($_POST['publish']) ? 1 : 0;
        }
    }
?>