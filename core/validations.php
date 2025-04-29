<?php
function valid_required($value, $type_name)
{
    return empty($value) ? $type_name . " is required" : null;
}
function check_email($email)
{
    return (!filter_var($email, FILTER_VALIDATE_EMAIL)) ? "Invalid email" : null;
}
function check_password($password)
{
    if (strlen($password) < 8) {
        return "Password less than 8 characters";
    }
    if (!preg_match("/[A-Z]/", $password)) {
        return "The password does not contain a capital letter";
    }
    if (!preg_match("/[a-z]/", $password)) {
        return "Password must contain lowercase letters";
    }
    if (!preg_match("/[0-9]/", $password)) {
        return "The password must contain numbers";
    }
    return null;
}
function check_register($name, $email, $password)
{
    $register_data = [
        'name' => $name,
        'email' => $email,
        'password' => $password
    ];

    foreach ($register_data as $data => $value) {
        if ($error = valid_required($value, $data)) {
            return $error;
        }
    }
    if ($error = check_email($email)) {
        return $error;
    }
    if ($error = check_password($password)) {
        return $error;
    }
}



function check_login($email, $password)
{
    $login_data = [
        'email' => $email,
        'password' => $password
    ];

    foreach ($login_data as $data => $value) {
        if ($error = valid_required($value, $data)) {
            return $error;
        }
    }
    if ($error = check_email($email)) {
        return $error;
    }
}
function check_blog($title, $image, $content)
{
    $blog_data = [
        'title' => $title,
        'image' => $image,
        'content' => $content
    ];

    foreach ($blog_data as $data => $value) {
        if ($error = valid_required($value, $data)) {
            return $error;
        }
    }
}
