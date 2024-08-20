<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "../../connections.php";
require_once "../../database/admin/message-us.php";
date_default_timezone_set("Asia/Manila");
$dbAdmin = new MessageUs();

if (isset($_POST["getMessageUsTableCount"])) {
    $resultPerPage = $_POST["resultPerPage"];
    $messageUsSearch = $_POST["messageUsSearch"];
    if ($messageUsSearch == "") {
        $getMessageUsTableCount = $dbAdmin->getMessageUsTableCount();
        echo ceil($getMessageUsTableCount / $resultPerPage);
    } else {
        $getMessageUsTableCountBySearch = $dbAdmin->getMessageUsTableCountBySearch($messageUsSearch);
        echo ceil($getMessageUsTableCountBySearch / $resultPerPage);
    }
}

if (isset($_POST["getMessageUsTable"])) {
    $messageUsSearch = $_POST["messageUsSearch"];
    $currentPage = $_POST["currentPage"];
    $numberOfPage = $_POST["numberOfPage"];
    $thisPageFirstResult = $_POST["thisPageFirstResult"];
    $resultPerPage = $_POST["resultPerPage"];
    if ($messageUsSearch != "") {
        $data = $dbAdmin->getMessageUsTableBySearch($thisPageFirstResult, $resultPerPage, $messageUsSearch);
    } else {
        $data = $dbAdmin->getMessageUsTable($thisPageFirstResult, $resultPerPage);
    }
    ?>
    <div class="custom-scrollbar justify-content-center mb-3">
        <table class="table table-hover table-stripped">
            <thead class="table-head table-dark">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Message</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($data as $row) {
                    $id = $row["id"];
                    $name = $row["name"];
                    $email = $row["email"];
                    $message = $row["message"];

                    ?>
                    <tr>
                        <td>
                            <?php
                            echo $name;
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $email;
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $message;
                            ?>
                        </td>

                        <td>
                            <form class="message-us-edit">
                                <input class="message-us-id" type="hidden" value="<?php echo $id; ?>" />
                                <input class="to-send-email" type="hidden" value="<?php echo $email; ?>" />
                                <div class="dropdown">
                                    <button class="btn message-us-dropdown-edit text-white dropdown-toggle" type="button"
                                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Options
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item message-us-edit" href="#" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop2">Reply</a></li>

                                    </ul>
                                </div>
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

if (isset($_POST["getReplyField"])) {
    $toSendEmail = $_POST["toSendEmail"];

    ?>
    <form class="reply-form">
        <input class="to-send-email" type="hidden" name="toSendEmail" value="<?php echo $toSendEmail; ?>" />

        <div class="row mb-3">

            <div class="col-lg">
                <label for="email" class="fw-bold mb-1">Email</label>
                <input id="email" class="form-control email" name="email" type="text" value="" />
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg">
                <label for="message" class="fw-bold mb-1">Message</label>
                <textarea id="message" class="form-control message" name="message" required></textarea>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg">
                <input type="submit" value="Send Reply" class="btn btn-success col-12 message-us-sent" />

            </div>
        </div>

    </form>
    <?php
}

if (isset($_POST["messageUsReply"])) {
    $toSendEmail = $_POST["toSendEmail"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    include_once "../../phpmailer/message-us.php";

}
?>