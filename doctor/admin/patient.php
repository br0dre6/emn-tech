<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["user"])) {
    if (($_SESSION["user"]) == "" or $_SESSION['usertype'] != 'a') {
        header("location: ../login.php");
    }

} else {
    header("location: ../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- FOR confirm dialog jquery -->
    <link href="../js/confirm/jquery-confirm3.3.2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/animations.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/admin.css">

    <title>Patients</title>
    <style>
        .popup {
            animation: transitionIn-Y-bottom 0.5s;
        }

        .sub-table {
            animation: transitionIn-Y-bottom 0.5s;
        }
    </style>
</head>

<body>
    <?php

    //learn from w3schools.com
    //import database
    include_once("../connection.php");


    ?>
    <div class="container">
        <div class="menu">
            <table class="menu-container" border="0">
                <tr>
                    <td style="padding:10px" colspan="2">
                        <table border="0" class="profile-container">
                            <tr>
                                <td width="30%" style="padding-left:20px">
                                    <img src="../img/emnlogo.png" alt="" width="100%" style="border-radius:50%">
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title">Administrator</p>
                                    <p class="profile-subtitle">admin@edoc.com</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="../logout.php"><input type="button" value="Log out"
                                            class="logout-btn btn-primary-soft btn"></a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-dashbord">
                        <a href="index.php" class="non-style-link-menu">
                            <div>
                                <p class="menu-text">Dashboard</p>
                        </a>
        </div></a>
        </td>
        </tr>
        <tr class="menu-row">
            <td class="menu-btn menu-icon-doctor ">
                <a href="doctors.php" class="non-style-link-menu ">
                    <div>
                        <p class="menu-text">Doctors</p>
                </a>
    </div>
    </td>
    </tr>
    <tr class="menu-row">
        <td class="menu-btn menu-icon-schedule">
            <a href="schedule.php" class="non-style-link-menu">
                <div>
                    <p class="menu-text">Schedule</p>
                </div>
            </a>
        </td>
    </tr>
    <tr class="menu-row">
        <td class="menu-btn menu-icon-appoinment">
            <a href="appointment.php" class="non-style-link-menu">
                <div>
                    <p class="menu-text">Appointment</p>
            </a></div>
        </td>
    </tr>
    <tr class="menu-row">
        <td class="menu-btn menu-icon-products">
            <a href="./admin-prod.php" class="non-style-link-menu">
                <div>
                    <p class="menu-text">Products</p>
            </a></div>
        </td>
    <tr class="menu-row">
        <td class="menu-btn menu-icon-patient  menu-active menu-icon-patient-active">
            <a href="patient.php" class="non-style-link-menu  non-style-link-menu-active">
                <div>
                    <p class="menu-text">Patients</p>
            </a></div>
        </td>
    </tr>
    <tr class="menu-row">
        <td class="menu-btn menu-icon-settings">
            <a href="settings.php" class="non-style-link-menu">
                <div>
                    <p class="menu-text">Settings</p>
            </a></div>
        </td>
    </tr>
    <tr class="menu-row">
        <td class="menu-btn menu-icon-settings">
            <a href="message-us.php" class="non-style-link-menu">
                <div>
                    <p class="menu-text">Message Us</p>
            </a></div>
        </td>
    </tr>
    <tr class="menu-row">
        <td class="menu-btn menu-icon-settings">
            <a href="edit-cms.php" class="non-style-link-menu">
                <div>
                    <p class="menu-text">Edit</p>
            </a></div>
        </td>
    </tr>
    </table>
    </div>
    <div class="dash-body">
        <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
            <tr>
                <td width="20%">

                    <a href="patient.php"><button class="login-btn btn-primary-soft btn btn-icon-back"
                            style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px">
                            <font class="tn-in-text">Back</font>
                        </button></a>

                </td>
                <td>

                    <form action="" method="post" class="header-search">

                        <input type="search" name="search" class="input-text header-searchbar"
                            placeholder="Search Patient name or Email" list="patient">&nbsp;&nbsp;

                        <?php
                        echo '<datalist id="patient">';
                        $list11 = $database->query("select  pname,pemail from patient;");

                        for ($y = 0; $y < $list11->num_rows; $y++) {
                            $row00 = $list11->fetch_assoc();
                            $d = $row00["pname"];
                            $c = $row00["pemail"];
                            echo "<option value='$d'><br/>";
                            echo "<option value='$c'><br/>";
                        }
                        ;

                        echo ' </datalist>';
                        ?>


                        <input type="Submit" value="Search" class="login-btn btn-primary btn"
                            style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">

                    </form>

                </td>
                <td width="15%">
                    <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                        Today's Date
                    </p>
                    <p class="heading-sub12" style="padding: 0;margin: 0;">
                        <?php
                        date_default_timezone_set('Asia/Kolkata');

                        $date = date('Y-m-d');
                        echo $date;
                        ?>
                    </p>
                </td>
                <td width="10%">
                    <button class="btn-label" style="display: flex;justify-content: center;align-items: center;"><img
                            src="../img/calendar.svg" width="100%"></button>
                </td>


            </tr>


            <tr>
                <td colspan="1" style="padding-top:10px;">
                    <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">All
                        Patients (
                        <?php echo $list11->num_rows; ?>)
                    </p>
                </td>
                <td colspan="" style="padding-top:10px;">
                    <button class="btn btn-primary add-walkin" type="button" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop2">Add Walk in</button>

                </td>

            </tr>
            <?php
            if ($_POST) {
                $keyword = $_POST["search"];

                $sqlmain = "select * from patient where pemail='$keyword' or pname='$keyword' or pname like '$keyword%' or pname like '%$keyword' or pname like '%$keyword%' ";
            } else {
                $sqlmain = "select * from patient order by pid desc";

            }



            ?>

            <tr>
                <td colspan="4">
                    <center>
                        <div class="abc scroll">
                            <table width="93%" class="sub-table scrolldown" style="border-spacing:0;">
                                <thead>
                                    <tr>
                                        <th class="table-headin">


                                            Name

                                        </th>

                                        <th class="table-headin">


                                            Cellphone

                                        </th>
                                        <th class="table-headin">
                                            Email
                                        </th>
                                        <th class="table-headin">

                                            Date of Birth

                                        </th>
                                        <th class="table-headin">

                                            Events

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php


                                    $result = $database->query($sqlmain);

                                    if ($result->num_rows == 0) {
                                        echo '<tr>
                                    <td colspan="4">
                                    <br><br><br><br>
                                    <center>
                                    <img src="../img/notfound.svg" width="25%">
                                    
                                    <br>
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
                                    <a class="non-style-link" href="patient.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Patients &nbsp;</font></button>
                                    </a>
                                    </center>
                                    <br><br><br><br>
                                    </td>
                                    </tr>';

                                    } else {
                                        for ($x = 0; $x < $result->num_rows; $x++) {
                                            $row = $result->fetch_assoc();
                                            $pid = $row["pid"];
                                            $name = $row["pname"];
                                            $email = $row["pemail"];
                                            $nic = $row["pnic"];
                                            $dob = $row["pdob"];
                                            $tel = $row["ptel"];

                                            echo '<tr>
                                        <td> &nbsp;' .
                                                substr($name, 0, 35)
                                                . '</td>
                                       
                                        <td>
                                            ' . substr($tel, 0, 10) . '
                                        </td>
                                        <td>
                                        ' . substr($email, 0, 20) . '
                                         </td>
                                        <td>
                                        ' . substr($dob, 0, 10) . '
                                        </td>
                                        <td >
                                        <div style="display:flex;justify-content: center;">
                                        
                                        <a href="?action=view&id=' . $pid . '" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-view"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">View</font></button></a>
                                       
                                        </div>
                                        </td>
                                    </tr>';

                                        }
                                    }

                                    ?>

                                </tbody>

                            </table>
                        </div>
                    </center>
                </td>
            </tr>



        </table>
    </div>
    </div>
    <?php
    if ($_GET) {

        $id = $_GET["id"];
        $action = $_GET["action"];
        $sqlmain = "select * from patient where pid='$id'";
        $result = $database->query($sqlmain);
        $row = $result->fetch_assoc();
        $name = $row["pname"];
        $email = $row["pemail"];
        $nic = $row["pnic"];
        $dob = $row["pdob"];
        $tele = $row["ptel"];
        $address = $row["paddress"];
        echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <a class="close" href="patient.php">&times;</a>
                        <div class="content">

                        </div>
                        <div style="display: flex;justify-content: center;">
                        <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                        
                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">View Details.</p><br><br>
                                </td>
                            </tr>
                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="name" class="form-label">Patient ID: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    P-' . $id . '<br><br>
                                </td>
                                
                            </tr>
                            
                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="name" class="form-label">Name: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    ' . $name . '<br><br>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Email" class="form-label">Email: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                ' . $email . '<br><br>
                                </td>
                            </tr>
                         
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Tele" class="form-label">Cellphone: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                ' . $tele . '<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="spec" class="form-label">Address: </label>
                                    
                                </td>
                            </tr>
                            <tr>
                            <td class="label-td" colspan="2">
                            ' . $address . '<br><br>
                            </td>
                            </tr>
                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="name" class="form-label">Date of Birth: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    ' . $dob . '<br><br>
                                </td>
                                
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="patient.php"><input type="button" value="OK" class="login-btn btn-primary-soft btn" ></a>
                                
                                    
                                </td>
                
                            </tr>
                           

                        </table>
                        </div>
                    </center>
                    <br><br>
            </div>
            </div>
            ';

    }
    ;

    ?>
    </div>
    <!-- MODAL DIALOG -->
    <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title modal-title-2" id="exampleModalLongTitle"><!-- JQUERY CODE -->Add Walk-in
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-body-2">
                    <form class="walk-in-sign-up">
                        <input class="walk-in-sign-up-hidden" type="hidden" name="walkInSignUpHidden" value="false" />
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="patientName" class="mb-1">Name</label>
                                    <input id="patientName" class="form-control patient-name" type="text"
                                        name="patientName" placeholder="Name..." />
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="patientAddress" class="mb-1">Address</label>
                                    <input id="patientAddress" class="form-control patient-address" type="text"
                                        name="patientAddress" placeholder="Address..." />
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <span class="error-text">
                                        <p class="text-center date-error"></p>
                                    </span>
                                    <label for="dateOfBirth" class="mb-1">Date Of Birth</label>
                                    <input id="dateOfBirth" type="date" name="dateOfBirth" class="input-text date">

                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <span class="error-text">
                                        <p class="text-center email-error"></p>
                                    </span>
                                    <label for="patientEmail" class="mb-1">Email</label>
                                    <input id="patientEmail" class="form-control patient-email" type="text"
                                        name="patientEmail" placeholder="Email..." />
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <span class="error-text">
                                        <p class="text-center phone-error"></p>
                                    </span>
                                    <label for="patientPhone" class="mb-1">Phone</label>
                                    <input class="form-control patient-phone" type="text" name="patientPhone"
                                        placeholder="Phone..." />
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="patientPassword" class="mb-1">Password</label>
                                    <input class="form-control patient-password" type="password" name="patientPassword"
                                        placeholder="Password..." />
                                    <div id="pswd_info">
                                        <h4>Password must meet the following requirements:</h4>
                                        <ul class="text-left offset-md-2">
                                            <li id="letter" class="invalid">At least <strong>one letter</strong></li>
                                            <li id="capital" class="invalid">At least <strong>one capital
                                                    letter</strong></li>
                                            <li id="number" class="invalid">At least <strong>one number</strong></li>
                                            <li id="length" class="invalid">Be at least <strong>8 characters</strong>
                                            </li>
                                            <li id="special" class="invalid">Be at least <strong>1 special
                                                    characters</strong>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <span class="error-text">
                                        <p class="text-center confirm-password-error"></p>
                                    </span>
                                    <label for="patientConfirmPassword" class="mb-1">Confirm Password</label>
                                    <input class="form-control patient-confirm-password" type="password"
                                        name="patientConfirmPassword" placeholder="Confirm Password..." />
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col text-center">
                                    <button class="btn btn-primary save-walkin" type="submit">Add Walk-in</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <!-- jquery code-->
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/confirm/jquery-confirm3.3.2.min.js"></script>
    <script src="../js/admin/patient.js"></script>
</body>

</html>