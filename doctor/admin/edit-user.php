<?php



//import database
include_once("../connection.php");



if ($_POST) {
    //print_r($_POST);
    $result = $database->query("select * from webuser");

    $oldemail = $_POST["oldemail"];

    $email = $_POST['email'];

    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $id = $_POST['id00'];

    if ($password == $cpassword) {
        $error = '3';

        $sqlmain = "select admin.aemail from admin inner join webuser on admin.aemail=webuser.email where webuser.email=?;";
        $stmt = $database->prepare($sqlmain);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        //$resultqq= $database->query("select * from doctor where docid='$id';");
        if ($result->num_rows == 1) {
            $id2 = $result->fetch_assoc()["aemail"];
        } else {
            $id2 = $id;
        }


        if ($id2 != $id) {
            $error = '1';
            //$resultqq1= $database->query("select * from doctor where docemail='$email';");
            //$did= $resultqq1->fetch_assoc()["docid"];
            //if($resultqq1->num_rows==1){

        } else {

            //$sql1="insert into doctor(docemail,docname,docpassword,docnic,doctel,specialties) values('$email','$name','$password','$nic','$tele',$spec);";
            $sql1 = "update admin set aemail='$email',apassword='$password';";
            $database->query($sql1);
            echo $sql1;
            $sql1 = "update webuser set email='$email' where email='$oldemail' ;";
            $database->query($sql1);
            echo $sql1;

            $error = '4';

        }

    } else {
        $error = '2';
    }




} else {
    //header('location: signup.php');
    $error = '3';
}



echo "<script>window.location.href = 'settings.php?action=edit&error=$error&id=$id';</script>";
?>



</body>

</html>