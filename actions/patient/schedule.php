<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "../../connections.php";
require_once "../../database/patient/schedule.php";
date_default_timezone_set("Asia/Manila");
$dbPatient = new Schedule();
if (isset($_POST["getAllDoctor"])) {
    $data = $dbPatient->getAllDoctor();
    foreach ($data as $row) {
        $docId = $row["docid"];
        $docName = $row["docname"];

        ?>
        <option value="<?php echo $docId; ?>">
            <?php echo $docName; ?>
        </option>

        <?php
    }
}
if ((isset($_POST["scheduleHidden"])) && ($_POST["scheduleHidden"] == "true")) {
    $purposeToAppoint = $_POST["purposeToAppoint"];
    $doctorId = $_POST["doctorId"];
    $sessionDate = $_POST["sessionDate"];
    $scheduleTime = $_POST["scheduleTime"];
    $data = $dbPatient->checkIfAlreadyInSchedule($sessionDate, $scheduleTime);
    if ($data >= 1) {
        echo "already have appointed in this date and time";
    } else {
        $data = $dbPatient->insertSchedule($purposeToAppoint, $doctorId, $sessionDate,
            $scheduleTime);
    }


}
?>