<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "../connections.php";
require_once "../database/guest-prod-nav.php";
date_default_timezone_set("Asia/Manila");
$dbGuest = new GuestProdNav();
if (isset($_POST["getProductTableCount"])) {
    $resultPerPage = $_POST["resultPerPage"];
    $productSearch = $_POST["productSearch"];
    if ($productSearch == "") {
        $getProductTableCount = $dbGuest->getProductTableCount();
        echo ceil($getProductTableCount / $resultPerPage);
    } else {
        $getProductTableCountBySearch = $dbGuest->getProductTableCountBySearch($productSearch);
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
        $data = $dbGuest->getProductTableBySearch($thisPageFirstResult, $resultPerPage, $productSearch);
    } else {
        $data = $dbGuest->getProductTable($thisPageFirstResult, $resultPerPage);
    }
    ?>

    <?php

    foreach ($data as $row) {
        $id = $row["id"];
        $productImage = $row["product_image"];
        $productName = $row["product_name"];
        $productDescription = $row["product_description"];
        $shapeType = $row["shape_type"];
        $stock = $row["stock"];
        $isActive = $row["is_active"];
        $dateTimeCreated = $row["date_time_created"];
        $currentDateTime = new DateTime(); // Current date and time
        $createdDateTime = new DateTime($dateTimeCreated); // DateTime created from the database
        $interval = $currentDateTime->diff($createdDateTime); // Calculate the difference between current and created datetime

        ?>

        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="card">
                <a href="product-details.php?product_id=<?php echo $id; ?>">

                    <img src="./images/admin/<?php echo $productImage; ?>" class="card-img-top" alt="..." />
                    <div class="label-new">

                        <?php
                        if ($interval->days <= 7) {
                            echo "<span>new</span>";
                        } else {

                        }
                        ?>
                    </div>
                </a>
                <div class="card-body">
                    <a href="product-details.php">
                        <h6 class="card-title">
                            <?php echo $productName; ?>
                        </h6>
                    </a>
                    <p class="card-text">
                        <?php echo $productDescription; ?>
                    </p>
                    <div class="d-flex justify-content-between">
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>


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
?>