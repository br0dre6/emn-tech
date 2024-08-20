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
    <link rel="stylesheet" href="../css/admin/main.css" />
    <link rel="stylesheet" href="../css/animations.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/admin.css">

    <title>Dashboard</title>
    <style>
        .dashbord-tables {
            animation: transitionIn-Y-over 0.5s;
        }

        .filter-container {
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
                    <td class="menu-btn menu-icon-dashbord menu-active menu-icon-dashbord-active">
                        <a href="index.php" class="non-style-link-menu non-style-link-menu-active">
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
    <div class="dash-body" style="margin-top: 15px">
        <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;">
            <tr>
                <td colspan="2" class="nav-bar">
                    <div class="row justify-content-center">
                        <div class="col-md-8 mt-3 mb-3">
                            <form class="edit-cms">
                                <input class="edit-cms-hidden" type="hidden" name="editCmsHidden" value="false" />
                                <h2 class="text-center font-weight-bold">Header Logo Image</h2>
                                <div class="row">
                                    <div class="col text-center">
                                        <img id="myImage" class="img-fluid logo-image" src="../img/avatar1.png" />
                                    </div>
                                </div>
                                <div class="row justify-content-center text-center">
                                    <div class="col text-center">
                                        <p class="text-center">
                                            <label for="files" class="btn image-label text-white mt-2">Upload picture of
                                                your Logo Image</label>
                                        </p>
                                        <input id="files" type="file" name="logoImage" style="visibility:hidden;"
                                            onchange="showImage.call(this)" />
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3">
                                        <label for="headerBrandName" class="mt-2">Header Brand Name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input id="headerBrandName" class="form-control header-brand-name" type="text"
                                            name="headerBrandName" placeholder="Header Brand Name" />
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3">
                                        <label for="homepageHeader" class="mt-2">Homepage Header</label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea id="homepageHeader" class="form-control homepage-header"
                                            name="homepageHeader" placeholder="Homepage Header..."></textarea>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3">
                                        <label for="homepageSubheader" class="mt-2">Homepage Sub Header</label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea id="homepageSubheader" class="form-control homepage-header"
                                            name="homepageSubheader" placeholder="Homepage Subheader..."></textarea>
                                    </div>
                                </div>
                                <h2 class="text-center font-weight-bold">Optometrist Img</h2>
                                <div class="row">
                                    <div class="col text-center">
                                        <img id="myImage2" class="img-fluid logo-image" src="../img/avatar1.png" />
                                    </div>
                                </div>
                                <div class="row justify-content-center text-center">
                                    <div class="col text-center">
                                        <p class="text-center">
                                            <label for="files2" class="btn image-label text-white mt-2">Upload picture
                                                of
                                                your Optometrist Image</label>
                                        </p>
                                        <input id="files2" type="file" name="optometristImage"
                                            style="visibility:hidden;" onchange="showImage2.call(this)" />
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3">
                                        <label for="optometristName" class="mt-2">Optometrist Name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input id="optometristName" class="form-control optometrist-name" type="text"
                                            name="optometristName" placeholder="Optometrist Name" />
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3">
                                        <label for="optometristDescription" class="mt-2">Optometrist Description</label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea id="optometristDescription"
                                            class="form-control optometrist-description" name="optometristDescription"
                                            placeholder="Optometrist Description..."></textarea>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3">
                                        <label for="aboutUs" class="mt-2">About Us</label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea id="aboutUs" class="form-control about-us" name="aboutUs"
                                            placeholder="About Us..."></textarea>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3">
                                        <label for="mission" class="mt-2">Mission</label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea id="mission" class="form-control mission" name="mission"
                                            placeholder="Mission..."></textarea>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3">
                                        <label for="vision" class="mt-2">Vision</label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea id="vision" class="form-control mission" name="vision"
                                            placeholder="Vision..."></textarea>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3">
                                        <label for="objective" class="mt-2">Objective</label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea id="objective" class="form-control objective" name="objective"
                                            placeholder="Objective..."></textarea>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3">
                                        <label for="address" class="mt-2">Address</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input id="address" class="form-control address" type="text" name="address"
                                            placeholder="Address" />
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3">
                                        <label for="contact" class="mt-2">Contact</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input id="contact" class="form-control contact" type="text" name="contact"
                                            placeholder="Contact" />
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3">
                                        <label for="email" class="mt-2">Email</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input id="email" class="form-control email" type="email" name="email"
                                            placeholder="Email" />
                                    </div>
                                </div>
                                <div class="d-grid gap-2 col-12 mx-auto mb-2">
                                    <input class="btn btn-success edit-cms-submit text-white col-md-12" type="submit"
                                        name="editCmsSubmit" value="Update" />
                                </div>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        </table>

        </td>
        </tr>
        </table>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/confirm/jquery-confirm3.3.2.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <script src="../js/admin/edit-cms.js"></script>

</body>

</html>