<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "../connections.php";
require_once "../database/create-account.php";
date_default_timezone_set("Asia/Manila");
$dbIndex = new CreateAccount();
if (isset($_POST["getExistingEmail"])) {
    $email = $_POST["email"];
    $data = $dbIndex->getExistingEmail($email);
    if ($data >= 1) {
        echo 1;
    } else {
        echo 0;
    }
}
?>