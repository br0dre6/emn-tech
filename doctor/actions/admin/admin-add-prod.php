<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "../../connections.php";
require_once "../../database/admin/admin-add-prod.php";
date_default_timezone_set("Asia/Manila");
$dbAdmin = new AdminAddProd();
if ((isset($_POST["adminAddProdHidden"])) && ($_POST["adminAddProdHidden"] == "true")) {

    $productName = $_POST["productName"];
    $productDescription = $_POST["productDescription"];
    $shapeType = $_POST["shapeType"];
    $stock = $_POST["stock"];
    $data = $dbAdmin->getLastProductId();
    $fileName = 1;
    foreach ($data as $row) {
        $fileName = $row["id"];
        $fileName++;
        $randomNumber = random_int(200, 299);
        $fileName += $randomNumber;
    }
    if (!empty($_FILES["productImage"]["name"])) {
        //directory of your file will go
        $folder = "../../images/admin/";
        //code for getting temporary file location
        $filetmp = $_FILES["productImage"]["tmp_name"];
        //removing the values until the "." 
        $remove = explode(".", $_FILES["productImage"]["name"]);
        $ext = end($remove);

        $fileName = $fileName . "." . $ext;
        //move the uploaded image into the folder: resoSys
        move_uploaded_file($filetmp, $folder . $fileName);
    }

    echo $data = $dbAdmin->insertProduct(
        $fileName,
        $productName,
        $productDescription,
        $shapeType,
        $stock
    );

}
?>