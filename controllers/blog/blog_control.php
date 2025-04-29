<?php

// $file_path=realpath(__DIR__."/../../assets/imgs");
// $name_path =$file_path."/".$_FILES['image']['name'];
// move_uploaded_file($_FILES['image']['tmp_name'],$name_path);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_GET['action'] == "store") {
        $title = trim($_POST["title"]);
        $image = $_FILES['image'];
        $content = trim($_POST['content']);

        $error = check_blog($title, $image, $content);
        if (!empty($error)) {
            set_message('danger', $error);
            header("Location: ./index.php?page=Blog-add");
            exit;
        }

        if (blog_add($title, $image, $content)) {
            set_message("success", "The blog has been created successfully");
            header("Location: ./index.php?page=blogs");
            exit;
        } else {
            set_message('danger', "Blog creation failed");
            header("Location: ./index.php?page=Blog-add");
            exit;
        }
    } elseif ($_GET["action"] == "delete" && isset($_POST['id'])) {
        $id = $_POST['id'];
        if (blog_delete($id)) {
            set_message("success", "The blog has been deleted successfully");
            header("Location: ./index.php?page=blogs");
            exit;
        } else {
            set_message('danger', "Blog deleted failed");
            header("Location: ./index.php?page=Blogs");
            exit;
        }
    } elseif ($_GET["action"] == "update" && isset($_POST['id'])) {
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
}
