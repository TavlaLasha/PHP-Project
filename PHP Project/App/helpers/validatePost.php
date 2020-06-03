<?php
    function validatePost($post){
        $errors = array();

        if(empty($post['title'])){
            array_push($errors, 'Title is required');
        }
        if(empty($post['body'])){
            array_push($errors, 'Body is required');
        }
        if(empty($post['topic_id'])){
            array_push($errors, 'Please select topic');
        }

        $existingPost = selectOne('posts', ['title' => $post['title']]);
        if(isset($existingPost)){
            if (isset($post['update-post']) && $existingPost['id'] != $post['id']) {
                array_push($errors, "Title already exists");
            }
            if (isset($post['add-post']) && $existingPost['id'] != $post['id']) {
                array_push($errors, "Title already exists");
            }
        }

        return $errors;
    }
?>