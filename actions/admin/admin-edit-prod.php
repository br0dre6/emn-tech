<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "../../connections.php";
require_once "../../database/admin/admin-edit-prod.php";
date_default_timezone_set("Asia/Manila");
$dbAdmin = new AdminEditProd();
class ProductDto
{
    public $id;
    public $productImage;
    public $productName;
    public $productDescription;
    public $shapeType;
    public $stock;
    public $isActive;


    public function __construct(
        $id,
        $productImage,
        $productName,
        $productDescription,
        $shapeType,
        $stock,
        $isActive
    ) {
        $this->id = $id;
        $this->productImage = $productImage;
        $this->productName = $productName;
        $this->productDescription = $productDescription;
        $this->shapeType = $shapeType;
        $this->stock = $stock;
        $this->isActive = $isActive;

    }
}
if (isset($_POST["getAdminProductInformationById"])) {
    $productId = $_POST["productId"];
    $data = $dbAdmin->getAdminProductInformationById($productId);
    $productInformationList = array();

    foreach ($data as $row) {
        $productInformationDto = new ProductDto(
            $row["id"],
            $row["product_image"],
            $row["product_name"],
            $row["product_description"],
            $row["shape_type"],
            $row["stock"],
            $row["is_active"]

        );

        $productInformationList[] = $productInformationDto;
    }

    // Encode the array as JSON
    $encodedProductInformationList = json_encode($productInformationList);

    // Send it to jQuery (assuming you are using AJAX)
    echo $encodedProductInformationList;

}

if ((isset($_POST["adminEditProdHidden"])) && ($_POST["adminEditProdHidden"] == "true")) {
    $productId = $_POST["productId"];
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
        echo $data = $dbAdmin->updateProductWithImage(
            $productId,
            $fileName,
            $productName,
            $productDescription,
            $shapeType,
            $stock
        );
    } else {
        echo $data = $dbAdmin->updateProductWithoutImage(
            $productId,
            $productName,
            $productDescription,
            $shapeType,
            $stock
        );
    }



}
?>