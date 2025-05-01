<?php
function set_message($type, $text_message)
{
    $_SESSION['message'] = [
        'type' => $type,
        'text' => $text_message
    ];
}

function show_message()
{
    if (isset($_SESSION['message'])) {
        $type = $_SESSION['message']['type'];
        $text_message = $_SESSION['message']['text'];
        echo "<div class='alert alert-$type'>$text_message</div>";
        unset($_SESSION['message']);
    }
}

function User_registration($name, $email, $password)
{
    $connect = $GLOBALS['connect'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT into users(`name`,`email`,`password`) VALUES('$name','$email','$hash_password')";
    $res = mysqli_query($connect, $sql);
    if ($res) {
        $user_id = mysqli_insert_id($connect);
        $_SESSION['User'] = [
            'id' => $user_id,
            'Username' => $name,
        ];
        return true;
    } else {
        return false;
    }
}

function User_login($email, $password)
{
    $connect = $GLOBALS['connect'];
    $sql = "SELECT * from users where email='$email'";
    $res = mysqli_query($connect, $sql);
    if (mysqli_num_rows($res) === 0) {
        set_message("danger", "invaild User email");
        header("location: ./index.php?page=login");
        exit;
    }
    $user = mysqli_fetch_assoc($res);
    if (password_verify($password, $user['password'])) {
        $_SESSION['User'] = [
            'id' => $user['id'],
            'Username' => $user['name'],

        ];
        return true;
    } else {
        return false;
    }
}

function getblog()
{
    $connect = $GLOBALS['connect'];
    $sql = "SELECT * from posts where user_id='{$_SESSION['User']['id']}'";
    $res = mysqli_query($connect, $sql);
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function blog_add($title, $image, $content)
{
    $connect = $GLOBALS['connect'];
    $name_image = $image['name'];
    $file_path = realpath(__DIR__ . "/../assets/imgs");
    $fullpath = $file_path . "/" . $name_image;
    $re_path =  "/assets/imgs/" . $name_image;
    if (!move_uploaded_file($image['tmp_name'], $fullpath)) {
        die('Image upload failed');
    }
    $sql = "INSERT INTO posts(title,descriptions,user_id,`image`,CREATE_AT) VALUES ('$title','$content','{$_SESSION['User']['id']}','$re_path',NOW())";
    $res = mysqli_query($connect, $sql);
    if ($res) {
        return true;
    } else {
        return false;
    }
}

function findblog($id)
{
    $connect = $GLOBALS['connect'];
    $sql = "SELECT * from posts where id='$id'";
    $res = mysqli_query($connect, $sql);
    if (mysqli_num_rows($res) === 0) {
        set_message("danger", "blog not found");
        header("location: ./index.php?page=blogs");
        exit;
    }
    return mysqli_fetch_assoc($res);
}

function blog_delete($id)
{
    findblog($id);
    $connect = $GLOBALS['connect'];
    $sql = "DELETE  from posts where id='$id'";
    $res = mysqli_query($connect, $sql);
    if ($res) {
        return true;
    } else {
        return false;
    }
}

function blog_update($id, $title, $image, $content)
{
    $blog = findblog($id);
    $connect = $GLOBALS['connect'];
    $imagepath = realpath(__DIR__ . "/../" . $blog["image"]);
    if ($imagepath && $image && file_exists($imagepath)) {
        unlink($imagepath);
    }
    $file_path = realpath(__DIR__ . "/../assets/imgs");
    $name_image = $image['name'];
    $fullpath = $file_path . "/" . $name_image;
    $re_path =  "/assets/imgs/" . $name_image;
    if (!move_uploaded_file($image['tmp_name'], $fullpath)) {
        die('Image upload failed');
    }
    $sql = "UPDATE  posts SET title='$title',descriptions='$content',`image`='$re_path' where id = '$id'";
    $res = mysqli_query($connect, $sql);
    if ($res) {
        return true;
    } else {
        return false;
    }
}
function get_all_blogs()
{
    $conn = $GLOBALS['connect'];
    $sql = "SELECT posts.*, users.name as author FROM posts 
            INNER JOIN users ON users.id = posts.user_id
            ORDER BY posts.create_at DESC";
    $res = mysqli_query($conn, $sql);
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

