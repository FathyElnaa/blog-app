<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST['password']);

    $error = check_register($name,$email,$password);
    if(!empty($error)){
        set_message('danger',$error);
        header("Location: ./index.php?page=register");
        exit;
    }

    if(User_registration($name, $email, $password)){
        set_message("success","User registered successfully");
        header("Location: ./index.php");
        exit;
    }else{
        set_message('danger',"User registration failed");
        header("Location: ./index.php?page=register");
        exit;
    }
}
