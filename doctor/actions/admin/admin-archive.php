<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "../../connections.php";
require_once "../../database/admin/admin-archive.php";
date_default_timezone_set("Asia/Manila");
$dbAdmin = new AdminArchive();

if (isset($_POST["getProductTableCount"])) {
    $resultPerPage = $_POST["resultPerPage"];
    $productSearch = $_POST["productSearch"];
    if ($productSearch == "") {
        $getProductTableCount = $dbAdmin->getProductTableCount();
        echo ceil($getProductTableCount / $resultPerPage);
    } else {
        $getProductTableCountBySearch = $dbAdmin->getProductTableCountBySearch($productSearch);
        echo ceil($getProductTableCountBySearch / $resultPerPage);
    }
}

if (isset($_POST["getProductTable"])) {
    $productSearch = $_POST["productSearch"];
    $currentPage = $_POST["currentPage"];
    $numberOfPage = $_POST["numberOfPage"];
    $thisPageFirstResult = $_POST["thisPageFirstResult"];
    $resultPerPage = $_POST["resultPerPage"];
    if ($productSearch != "") {
        $data = $dbAdmin->getProductTableBySearch($thisPageFirstResult, $resultPerPage, $productSearch);
    } else {
        $data = $dbAdmin->getProductTable($thisPageFirstResult, $resultPerPage);
    }
    ?>
    <div class="custom-scrollbar justify-content-center mb-3">
        <table class="table table-hover table-stripped">
            <thead class="table-head table-dark">
                <tr>
                    <th scope="col">Product Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Description</th>
                    <th scope="col">Shape Type</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($data as $row) {
                    $id = $row["id"];
                    $productImage = $row["product_image"];
                    $productName = $row["product_name"];
                    $productDescription = $row["product_description"];
                    $shapeType = $row["shape_type"];
                    $stock = $row["stock"];
                    $isActive = $row["is_active"];

                    ?>
                    <tr>
                        <td>
                            <img class="img-fluid" src="../images/admin/<?php echo $productImage; ?>" style="height:100px;" />

                        </td>
                        <td>
                            <?php
                            echo $productName;
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $productDescription;
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $shapeType;
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $stock;
                            ?>
                        </td>
                        <td>
                            <form class="product-edit">
                                <input class="product-id" type="hidden" value="<?php echo $id; ?>" />
                                <input class="product-edit-hidden" type="hidden" name="productEditHidden" value="" />
                                <a class="btn btn-primary me-2" href="./admin-add-prod.php?product_id=<?php echo $id; ?>">Edit
                                </a>

                                <button class="btn btn-danger archive-button" type="submit">Archive</button>

                            </form>
                        </td>

                    </tr>
                    <?php
                }
                ?>

            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col text-end">
            <?php
            if ($numberOfPage == 0) {
                ?>
                <p class="lead">0 out of 0 page</p>
                <?php
            } else {
                ?>
                <p class="lead">
                    <?php echo $currentPage . " out of " . $numberOfPage . " pages"; ?>
                </p>
                <?php
            }
            ?>

        </div>
    </div>
    <?php
}

if ((isset($_POST["productEditHidden"])) && ($_POST["productEditHidden"] == "true")) {
    $productId = $_POST["productId"];
    echo $dbAdmin->updateProductActiveStatus($productId);
}
?>