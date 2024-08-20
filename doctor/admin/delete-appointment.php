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
    $email = $_GET["email"];
    //$result001= $database->query("select * from schedule where scheduleid=$id;");
    //$email=($result001->fetch_assoc())["docemail"];
    $sql = $database->query("delete from appointment where appoid='$id';");
    include_once "../phpmailer/cancel-email.php";
    //$sql= $database->query("delete from doctor where docemail='$email';");
    //print_r($email);

    echo "<script>window.location.href = 'appointment.php';</script>";
}


?>