<?php
    $table = "topics";
    $topics = selectAll($table);
    $id = '';
    $name = '';
    $description = '';
    $errors = array();

    if(isset($_POST['save-topic'])){
        $errors = validateTopic($_POST);
        if(count($errors)==0){
            unset($_POST['save-topic']);
            $topic_id = create('topics', $_POST);
            $_SESSION['message'] = "Topic created successfuly";
            $_SESSION['type'] = "Success";
            header('location: index.php');
            exit();
        }else{
            $name = $_POST['name'];
            $description = $_POST['description'];
        }
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $topics = selectOne($table, ['id' => $id]);
        $id = $topics['id'];
        $name = $topics['name'];
        $description = $topics['description'];
    }
    if(isset($_GET["del_id"])){
        $id = $_GET["del_id"];
        $count = delete($table, $id);
        $_SESSION['message'] = "Topic deleted successfuly";
        $_SESSION['type'] = "Success";
        header('location: index.php');
        exit();
    }
    if(isset($_POST['update-topic'])){
        $errors = validateTopic($_POST);

        if(count($errors)==0){
            $id = $_POST['id'];
            unset($_POST['update-topic'], $_POST['id']);
            $topic_id = update($table, $id, $_POST);
            $_SESSION['message'] = "Topic updated successfuly";
            $_SESSION['type'] = "Success";
            header('location: index.php');
            exit();
        }else{
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
        }
    }
?>