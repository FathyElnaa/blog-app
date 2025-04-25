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
        $_SESSION['Username'] = $name;
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
        $_SESSION['Username'] = $user['name'];
        return true;
    } else {
        return false;
    }
}
