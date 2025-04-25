<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST['password']);

    $error = check_login($email, $password);
    if (!empty($error)) {
        set_message('danger', $error);
        header("Location: ./index.php?page=login");
        exit;
    }

    if (User_login($email, $password)) {
        set_message("success", "User login successfully");
        header("Location: ./index.php");
        exit;
    } else {
        set_message('danger', "Incorrect password or email");
        header("Location: ./index.php?page=login");
        exit;
    }
}
