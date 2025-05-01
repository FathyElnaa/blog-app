<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $title = trim($_POST["title"]);
    $image = $_FILES['image'];
    $content = trim($_POST['content']);
    if (blog_update($id, $title, $image, $content)) {
        set_message("success", "The blog has been updated successfully");
        header("Location: ./index.php?page=blogs");
        exit;
    } else {
        set_message('danger', "Blog updated failed");
        header("Location: ./index.php?page=Blog-edit");
        exit;
    }
}