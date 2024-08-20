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


if ($_POST) {
    //import database
    include_once("../connection.php");
    $title = $_POST["title"];
    // if ((isset($_POST["adminAddProdHidden"])) && ($_POST["adminAddProdHidden"] == "true")) {}
    $docid = null;
    if (isset($_POST["docid"])) {
        $docid = $_POST["docid"];
    }

    $nop = $_POST["nop"];
    $date = $_POST["date"];
    $time = null;
    if (isset($_POST["time"])) {
        $time = $_POST["time"];
    }

    $sql = "insert into schedule (docid,title,scheduledate,scheduletime,nop) values ($docid,'$title','$date','$time',$nop);";
    $result = $database->query($sql);

    echo "<script>window.location.href = 'schedule.php?action=session-added&title=$title';</script>";

}


?>