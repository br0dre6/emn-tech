<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "../../connections.php";
require_once "../../database/admin/edit-cms.php";
date_default_timezone_set("Asia/Manila");
$dbAdmin = new EditCms();


class CmsDto
{
    public $id;
    public $logoImage;
    public $headerBrandName;
    public $homepageHeader;
    public $homepageSubheader;
    public $optometristImage;
    public $optometristName;
    public $optometristDescription;
    public $aboutUs;
    public $mission;
    public $vision;
    public $objective;
    public $address;
    public $contact;
    public $email;

    public function __construct(
        $id,
        $logoImage,
        $headerBrandName,
        $homepageHeader,
        $homepageSubheader,
        $optometristImage,
        $optometristName,
        $optometristDescription,
        $aboutUs,
        $mission,
        $vision,
        $objective,
        $address,
        $contact,
        $email
    ) {
        $this->id = $id;
        $this->logoImage = $logoImage;
        $this->headerBrandName = $headerBrandName;
        $this->homepageHeader = $homepageHeader;
        $this->homepageSubheader = $homepageSubheader;
        $this->optometristImage = $optometristImage;
        $this->optometristName = $optometristName;
        $this->optometristDescription = $optometristDescription;
        $this->aboutUs = $aboutUs;
        $this->mission = $mission;
        $this->vision = $vision;
        $this->objective = $objective;
        $this->address = $address;
        $this->contact = $contact;
        $this->email = $email;
    }
}
if ((isset($_POST["editCmsHidden"])) && ($_POST["editCmsHidden"] == "true")) {

    $headerBrandName = $_POST["headerBrandName"];
    $homepageHeader = $_POST["homepageHeader"];
    $homepageSubheader = $_POST["homepageSubheader"];
    $optometristName = $_POST["optometristName"];
    $optometristDescription = $_POST["optometristDescription"];
    $aboutUs = $_POST["aboutUs"];
    $mission = $_POST["mission"];
    $vision = $_POST["vision"];
    $objective = $_POST["objective"];
    $address = $_POST["address"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $cmsId = 1;
    $fileName = 1;
    $fileName2 = 1;
    $data;
    $getCmsRowCount = $dbAdmin->getCmsRowCount();
    if ($getCmsRowCount >= 1) {
        $data = $dbAdmin->getLastCmsId();
        foreach ($data as $row) {
            $fileName = $row["id"];
            $cmsId = $row["id"];
            $randomNumber = random_int(1, 99);
            $randomNumber2 = random_int(100, 199);
            $fileName += $randomNumber;
            $fileName2 += $randomNumber2;
        }
    } else {
        echo 0;
    }
    if ($dbAdmin->getCmsRowCount() > 0) {

    }


    if (!empty($_FILES["logoImage"]["name"]) && empty($_FILES["optometristImage"]["name"])) {
        //directory of your file will go
        $folder = "../../images/admin/";
        //code for getting temporary file location
        $filetmp = $_FILES["logoImage"]["tmp_name"];
        //removing the values until the "." 
        $remove = explode(".", $_FILES["logoImage"]["name"]);
        $ext = end($remove);

        $fileName = $fileName . "." . $ext;
        //move the uploaded image into the folder: resoSys
        move_uploaded_file($filetmp, $folder . $fileName);

        $fileName2 = null;
    }



    if (empty($_FILES["logoImage"]["name"]) && !empty($_FILES["optometristImage"]["name"])) {
        // insert 2
        //directory of your file will go
        $folder2 = "../../images/admin/";
        //code for getting temporary file location
        $filetmp2 = $_FILES["optometristImage"]["tmp_name"];
        //removing the values until the "." 
        $remove2 = explode(".", $_FILES["optometristImage"]["name"]);
        $ext2 = end($remove2);

        $fileName2 = $fileName2 . "." . $ext2;
        //move the uploaded image into the folder: resoSys
        move_uploaded_file($filetmp2, $folder2 . $fileName2);
        $fileName = null;
    }

    if (!empty($_FILES["logoImage"]["name"]) && !empty($_FILES["optometristImage"]["name"])) {
        //directory of your file will go
        $folder = "../../images/admin/";
        //code for getting temporary file location
        $filetmp = $_FILES["logoImage"]["tmp_name"];
        //removing the values until the "." 
        $remove = explode(".", $_FILES["logoImage"]["name"]);
        $ext = end($remove);

        $fileName = $fileName . "." . $ext;
        //move the uploaded image into the folder: resoSys
        move_uploaded_file($filetmp, $folder . $fileName);

        // insert 2

        //directory of your file will go
        $folder2 = "../../images/admin/";
        //code for getting temporary file location
        $filetmp2 = $_FILES["optometristImage"]["tmp_name"];
        //removing the values until the "." 
        $remove2 = explode(".", $_FILES["optometristImage"]["name"]);
        $ext2 = end($remove2);

        $fileName2 = $fileName2 . "." . $ext2;
        //move the uploaded image into the folder: resoSys
        move_uploaded_file($filetmp2, $folder2 . $fileName2);
    }

    if ($getCmsRowCount >= 1) {
        if ($fileName != null && $fileName2 == null) {
            $data = $dbAdmin->updateCmsWithFile1(
                $cmsId,
                $fileName,
                $headerBrandName,
                $homepageHeader,
                $homepageSubheader,
                $optometristName,
                $optometristDescription,
                $aboutUs,
                $mission,
                $vision,
                $objective,
                $address,
                $contact,
                $email
            );
        } else if ($fileName == null && $fileName2 != null) {
            $data = $dbAdmin->updateCmsWithFile2(
                $cmsId,
                $headerBrandName,
                $homepageHeader,
                $homepageSubheader,
                $fileName2,
                $optometristName,
                $optometristDescription,
                $aboutUs,
                $mission,
                $vision,
                $objective,
                $address,
                $contact,
                $email
            );
        } else {
            $data = $dbAdmin->updateCmsWithFile1AndFile2(
                $cmsId,
                $fileName,
                $headerBrandName,
                $homepageHeader,
                $homepageSubheader,
                $fileName2,
                $optometristName,
                $optometristDescription,
                $aboutUs,
                $mission,
                $vision,
                $objective,
                $address,
                $contact,
                $email
            );
        }


    } else {
        $data = $dbAdmin->insertCms(
            $fileName,
            $headerBrandName,
            $homepageHeader,
            $homepageSubheader,
            $fileName2,
            $optometristName,
            $optometristDescription,
            $aboutUs,
            $mission,
            $vision,
            $objective,
            $address,
            $contact,
            $email
        );
        echo "<script> alert('successfully cms updated!');</scrip>";
    }

}

if (isset($_POST["getCmsInformation"])) {

    $data = $dbAdmin->getCmsInformation();
    $cmsInformationList = array();

    foreach ($data as $row) {
        $cmsInformationDto = new CmsDto(
            $row["id"],
            $row["logo_image"],
            $row["header_brand_name"],
            $row["homepage_header"],
            $row["homepage_subheader"],
            $row["optometrist_image"],
            $row["optometrist_name"],
            $row["optometrist_description"],
            $row["about_us"],
            $row["mission"],
            $row["vision"],
            $row["objective"],
            $row["address"],
            $row["contact"],
            $row["email"]
        );

        $cmsInformationList[] = $cmsInformationDto;
    }

    // Encode the array as JSON
    $encodedCmsInformationList = json_encode($cmsInformationList);

    // Send it to jQuery (assuming you are using AJAX)
    echo $encodedCmsInformationList;

}
?>