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

    <title>Doctors</title>
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
            <td class="menu-btn menu-icon-doctor menu-active menu-icon-doctor-active">
                <a href="doctors.php" class="non-style-link-menu non-style-link-menu-active">
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
        <td class="menu-btn menu-icon-patient">
            <a href="patient.php" class="non-style-link-menu">
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
        <div class="container-fluid">

            <h2>Message</h2>
            <div class="row">
                <div class="col-lg mb-3">
                    <input class="form-control oval-border message-us-search" type="text" placeholder="Search Message"
                        value="" />
                </div>
            </div>
            <div class="row message-us-table mb-3">
                <!-- JQUERY CODE -->
            </div>
            <div class="row">
                <div class="btn-group float-end">
                    <button class="btn previous-message-us-table-button text-white me-2" type="button">
                        <span class="iconify h4 mt-2" data-icon="bx:bx-left-arrow"></span>
                    </button>
                    <button class="btn next-message-us-table-button text-white" type="button">
                        <span class="iconify h4 mt-2" data-icon="bx:bx-right-arrow"></span>
                    </button>
                </div>
            </div>
        </div>
        <!-- MODAL DIALOG -->
        <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title modal-title-2" id="exampleModalLongTitle"><!-- JQUERY CODE --></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body modal-body-2">

                    </div>
                    <div class="modal-footer">
                        <!-- jquery code-->
                    </div>
                </div>
            </div>
        </div>
        <!-- for database pulling data DO NOT CHANGE THE ARRANGEMENT-->
        <input type="hidden" id="currentPage" value="1" />
        <input type="hidden" id="resultPerPage" value="10" />
        <!--  thispagefirstresult = (currentPage - 1) * resultPerPage; -->
        <input type="hidden" id="thisPageFirstResult" value="" />
        <!-- numberofpages = ceil(number of data from database/resultPerPage); -->
        <input type="hidden" id="numberOfPages" value="" />
        <!-- END for database pulling data -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/confirm/jquery-confirm3.3.2.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <script src="../js/admin/message-us.js"></script>
</body>

</html>