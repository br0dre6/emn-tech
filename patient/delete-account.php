<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["user"])) {
    if (($_SESSION["user"]) == "" or $_SESSION['usertype'] != 'p') {

        echo "<script>window.location.href = '../login.php';</script>";
    } else {
        $useremail = $_SESSION["user"];
    }

} else {

    echo "<script>window.location.href = '../login.php';</script>";
}


//import database
include_once("../connection.php");
$sqlmain = "select * from patient where pemail=?";
$stmt = $database->prepare($sqlmain);
$stmt->bind_param("s", $useremail);
$stmt->execute();
$userrow = $stmt->get_result();
$userfetch = $userrow->fetch_assoc();
$userid = $userfetch["pid"];
$username = $userfetch["pname"];


if ($_GET) {
    //import database
    include_once("../connection.php");
    $id = $_GET["id"];
    $sqlmain = "select * from patient where pid=?";
    $stmt = $database->prepare($sqlmain);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result001 = $stmt->get_result();
    $email = ($result001->fetch_assoc())["pemail"];

    $sqlmain = "delete from webuser where email=?;";
    $stmt = $database->prepare($sqlmain);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();


    $sqlmain = "delete from patient where pemail=?";
    $stmt = $database->prepare($sqlmain);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    //print_r($email);

    echo "<script>window.location.href = '../logout.php';</script>";
}


?>