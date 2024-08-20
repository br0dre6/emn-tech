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

    <title>Sign Up</title>

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



    if ($_POST) {



        $_SESSION["personal"] = array(
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'address' => $_POST['address'],
            'nic' => $_POST['nic'],
            'dob' => $_POST['dob']
        );


        print_r($_SESSION["personal"]);

        echo "<script>window.location.href = 'create-account.php';</script>";

    }

    ?>


    <center>
        <form class="sign-up" action="" method="POST">
            <div class="container">
                <table border="0">

                    <tr>
                        <td colspan="2">
                            <p class="header-text">Let's Get Started</p>
                            <p class="sub-text">Add Your Personal Details to Continue</p>
                        </td>
                    </tr>
                    <tr>

                        <td class="label-td" colspan="2">
                            <label for="name" class="form-label">Name: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="text" name="fname" class="input-text first-name" placeholder="First Name"
                                required>
                        </td>

                    </tr>
                    <td class="label-td" colspan="2">
                        <input type="text" name="lname" class="input-text last-name" placeholder="Last Name" required>
                    </td>
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="address" class="form-label">Address: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="text" name="address" class="input-text address" placeholder="Address" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="dob" class="form-label">Date of Birth: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="date" name="dob" class="input-text date" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="reset" value="Reset" class="login-btn btn-primary-soft btn">
                        </td>
                        <td>
                            <input type="submit" value="Next" class="login-btn btn-primary btn next-button">
                        </td>

                    </tr>
                    <tr>
                        <td colspan="2">
                            <br>
                            <label for="" class="sub-text" style="font-weight: 280;">By clicking Next, you agree to
                            </label>
                            <a href="termsandconditions.html" class="hover-link1 non-style-link"> Terms and Conditions.</a>
                            <br>
                            <label for="" class="sub-text" style="font-weight: 280;">Already have an account&#63;
                            </label>
                            <a href="login.php" class="hover-link1 non-style-link">Login</a>
                            <br><br><br>
                        </td>
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
    <script src="./js/signup.js"></script>
</body>

</html>