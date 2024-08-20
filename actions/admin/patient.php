<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "../../connections.php";
require_once "../../database/admin/patient.php";
date_default_timezone_set("Asia/Manila");
$dbAdmin = new Patient();


if ((isset($_POST["walkInSignUpHidden"])) && ($_POST["walkInSignUpHidden"] == "true")) {
    $patientName = $_POST["patientName"];
    $patientAddress = $_POST["patientAddress"];
    $dateOfBirth = $_POST["dateOfBirth"];
    $patientEmail = $_POST["patientEmail"];

    $patientPhone = $_POST["patientPhone"];
    $patientPassword = $_POST["patientPassword"];

    echo $data = $dbAdmin->insertWalkinAccount(
        $patientName,
        $patientAddress,
        $dateOfBirth,
        $patientEmail,
        $patientPhone,
        $patientPassword

    );

}

