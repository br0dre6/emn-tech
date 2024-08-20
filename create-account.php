<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
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
    <link href="./js/confirm/jquery-confirm3.3.2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/animations.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/signup.css">

    <title>Create Account</title>
    <style>
        .container {
            animation: transitionIn-X 0.5s;
        }
    </style>
</head>

<body>
    <?php

    //learn from w3schools.com
//Unset all the server side variables
    
    $_SESSION["user"] = "";
    $_SESSION["usertype"] = "";

    // Set the new timezone
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d');

    $_SESSION["date"] = $date;


    //import database
    include_once("connection.php");





    if ($_POST) {

        $result = $database->query("select * from webuser");

        $fname = $_SESSION['personal']['fname'];
        $lname = $_SESSION['personal']['lname'];
        $name = $fname . " " . $lname;
        $address = $_SESSION['personal']['address'];
        $nic = $_SESSION['personal']['nic'];
        $dob = $_SESSION['personal']['dob'];
        $email = $_POST['newemail'];
        $tele = $_POST['tele'];
        $newpassword = $_POST['newpassword'];
        $cpassword = $_POST['cpassword'];

        if ($newpassword == $cpassword) {
            $sqlmain = "select * from webuser where email=?;";
            $stmt = $database->prepare($sqlmain);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows == 1) {
                $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Already have an account for this Email address.</label>';
            } else {
                //TODO
                $database->query("insert into patient(pemail,pname,ppassword, paddress, pnic,pdob,ptel) values('$email','$name','$newpassword','$address','$nic','$dob','$tele');");
                $database->query("insert into webuser values('$email','p')");

                //print_r("insert into patient values($pid,'$email','$fname','$lname','$newpassword','$address','$nic','$dob','$tele');");
                $_SESSION["user"] = $email;
                $_SESSION["usertype"] = "p";
                $_SESSION["username"] = $fname;
                include_once "./phpmailer/create-account.php";
                echo "<script>window.location.href = 'patient/index.php';</script>";
                $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;"></label>';
            }

        } else {
            $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Password Conformation Error! Reconform Password</label>';
        }




    } else {
        //header('location: signup.php');
        $error = '<label for="promter" class="form-label"></label>';
    }

    ?>


    <center>
        <form class="create-account" action="" method="POST">
            <div class="container">
                <table border="0" style="width: 69%;">
                    <tr>
                        <td colspan="2">
                            <p class="header-text">Let's Get Started</p>
                            <p class="sub-text">It's Okey, Now Create User Account.</p>
                        </td>
                    </tr>
                    <tr>

                        <td class="label-td" colspan="2">
                            <span class="error-text">
                                <p class="text-center email-error"></p>
                            </span>
                            <label for="newemail" class="form-label">Email: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="email" name="newemail" class="input-text email" placeholder="Email Address"
                                required>
                        </td>

                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="tele" class="form-label">Mobile Number: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <span class="error-text">
                                <p class="text-center phone-error"></p>
                            </span>
                            <input type="tel" name="tele" class="input-text phone" placeholder="09123456789"
                                pattern="[0-9]{11}">
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="newpassword" class="form-label">Create New Password: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="password" name="newpassword" class="input-text password"
                                placeholder="New Password" required>
                            <div id="pswd_info">
                                <h4>Password must meet the following requirements:</h4>
                                <ul class="text-left offset-md-2">
                                    <li id="letter" class="invalid">At least <strong>one letter</strong></li>
                                    <li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
                                    <li id="number" class="invalid">At least <strong>one number</strong></li>
                                    <li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
                                    <li id="special" class="invalid">Be at least <strong>1 special characters</strong>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <span class="error-text">
                                <p class="text-center confirm-password-error"></p>
                            </span>
                            <label for="cpassword" class="form-label">Confirm Password: </label>

                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="password" name="cpassword" class="input-text confirm-password"
                                placeholder="Confirm Password" required>
                        </td>
                    </tr>

                    <tr>

                        <td colspan="2">
                            <?php echo $error ?>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="reset" value="Reset" class="login-btn btn-primary-soft btn">
                        </td>
                        <td>
                            <input type="submit" value="Sign Up" class="login-btn btn-primary btn sign-up">
                        </td>

                    </tr>
                    <tr>
                        <td colspan="2">
                        <br>
                            <label for="" class="sub-text" style="font-weight: 280;">By clicking Sign up, you agree to
                            </label>
                            <a href="termsandconditions.html" class="hover-link1 non-style-link"> Terms and Conditions.</a>
                        <br>
                            <label for="" class="sub-text" style="font-weight: 280;">Already have an account&#63;
                            </label>
                            <a href="login.php" class="hover-link1 non-style-link">Login</a>
                            <br><br><br>
                        </td>
                    </tr>


                    </tr>
                </table>

            </div>
        </form>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./js/confirm/jquery-confirm3.3.2.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <script src="./js/create-account.js"></script>
</body>

</html>