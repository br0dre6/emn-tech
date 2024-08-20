<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once "../connections.php";
require_once "../database/index.php";
date_default_timezone_set("Asia/Manila");
$dbIndex = new Index();
if (isset($_POST["sentContactUsEmail"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    include_once "../phpmailer/contact-us.php";
    $dbIndex->insertEmailMessage(
        $name,
        $email,
        $message
    );
}
?>