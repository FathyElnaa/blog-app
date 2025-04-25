<?php

try {
    $connect = mysqli_connect("localhost", "root", "", "blog");
    if (!$connect) {
        header("location: ./views/maintenance.php");
        exit;
    }
} catch (Exception $ex) {
    header("location: ./views/maintenance.php");
}
