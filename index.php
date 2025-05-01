<?php
session_start();
require_once("config/db_con.php");
require_once("core/functions.php");
require_once("core/validations.php");

require_once("./views/layouts/header.php");



show_message();
$page = isset($_GET['page']) ? $_GET['page'] : "home";

switch ($page) {
    case "home":
        require("./views/home.php");
        break;

    case "register":
        require("./views/auth/register.php");
        break;
    case "login":
        require("./views/auth/login.php");
        break;
    case "blogs":
        require("./views/blog/index.php");
        break;
    case "Blog-add":
        require("./views/blog/create.php");
        break;
    case "Blog-edit":
        require("./views/blog/edit.php");
        break;
    case "Blog-show":
        include "./views/blog/show.php";
        break;
    case "logout":
        require("./controllers/auth/logout_control.php");
        break;
    case "sign-up":
        require("./controllers/auth/Registration_control.php");
        break;
    case "auth-login":
        require("./controllers/auth/login_control.php");
        break;
    case "Blog-storage":
        require("./controllers/blog/blog_control.php");
        break;
    case "Blog-update":
        require("./controllers/blog/updateblog.php");
        break;
    case "Blog-delete":
        require("./controllers/blog/blog_control.php");
        break;

    default:
        require("./views/404-not-found.php");
}




require_once("./views/layouts/header.php");
