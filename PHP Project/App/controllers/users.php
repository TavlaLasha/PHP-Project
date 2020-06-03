<?php
    $id = '';
    $admin = '';
    $username = '';
    $email = '';
    $password = '';
    $passwordConf = '';
    $errors = array();
    $table = 'users';
    $admin_users = selectAll($table);
    
    function userLogin($user){
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['admin'] = $user['admin'];
        $_SESSION['message'] = "You are now logged in";
        $_SESSION['type'] = "Success";
        if ($_SESSION['admin']) {
            header('location: admin/dashboard/dashboard.php');
        } else {
            header('location: index.php');
        }
        exit();
    }
    if(isset($_POST['register-btn']) || isset($_POST['save-user'])){

        $errors = validateUser($_POST);

        if(count($errors)==0){
            unset($_POST['register-btn'], $_POST['passwordConf'], $_POST['save-user']);
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            if(isset($_POST['admin'])){
                $_POST['admin']=1;
                $user_id = create($table, $_POST);
                $_SESSION['message'] = "Admin user created successfully";
                $_SESSION['type'] = "Success";
                header('location: ../../admin/users/index.php');
                exit();
            }else{
                $_POST['admin']=0;
                $user_id = create($table, $_POST);
                $user = selectOne($table, ['id' => $user_id]);
    
                userLogin($user);
            }
        }
        else{
            $username = $_POST['username'];
            $admin = isset($_POST['admin']) ? 1 : 0;
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordConf = $_POST['passwordConf'];
        }
    }
    if(isset($_POST['update-user'])){

        $errors = validateUser($_POST);

        if(count($errors)==0){
            $id = $_POST['id'];
            unset($_POST['passwordConf'], $_POST['update-user'], $_POST['id']);
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $_POST['admin']= isset($_POST['admin']) ? 1 : 0;
            $count = update($table, $id, $_POST);
            $_SESSION['message'] = "Admin user updated successfully";
            $_SESSION['type'] = "Success";
            header('location: ../../admin/users/index.php');
            exit();
        }
        else{
            $username = $_POST['username'];
            $admin = isset($_POST['admin']) ? 1 : 0;
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordConf = $_POST['passwordConf'];
        }
    }
    if(isset($_GET['id'])){
        $user = selectOne($table, ['id' => $_GET['id']]);
        $id = $user['id'];
        $username = $user['username'];
        $admin = $user['admin'] == 1 ? 1 : 0;
        $email = $user['email'];
    }
    if(isset($_POST['login-btn'])){
        $errors = validateLogin($_POST);
        if(count($errors)==0){
            $user = selectOne($table, ['username' => $_POST['username']]);
            if ($user && password_verify($_POST['password'], $user['password'])) {
                userLogin($user);
            } else {
                array_push($errors, "Wrong credentials");
            }
        }
        $username = $_POST['username'];
        $password = $_POST['password'];
    }
    if(isset($_GET['del_id'])){
        $id = $_GET["del_id"];
        $count = delete($table, $id);
        $_SESSION['message'] = "User deleted successfuly";
        $_SESSION['type'] = "Success";
        header('location: index.php');
        exit();
    }
?>