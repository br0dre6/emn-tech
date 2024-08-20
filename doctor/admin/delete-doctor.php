<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["user"])) {
    if (($_SESSION["user"]) == "" or $_SESSION['usertype'] != 'a') {
        echo "<script>window.location.href = '../login.php';</script>";
    }

} else {
    echo "<script>window.location.href = '../login.php';</script>";
}


if ($_GET) {
    //import database
    include_once("../connection.php");
    $id = $_GET["id"];
    $result001 = $database->query("select * from doctor where docid=$id;");
    $email = ($result001->fetch_assoc())["docemail"];
    $sql = $database->query("delete from webuser where email='$email';");
    $sql = $database->query("delete from doctor where docemail='$email';");
    //print_r($email);
    echo "<script>window.location.href = 'doctors.php';</script>";
}


?>