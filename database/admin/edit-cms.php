<?php
class EditCms extends Database
{

    public function getCmsRowCount()
    {
        $sql = "
            SELECT id FROM cms
            ORDER BY id DESC LIMIT 1
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
    public function getLastCmsId()
    {
        $sql = "
            SELECT id FROM cms
            ORDER BY id DESC LIMIT 1
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        //fetch for single and fetchAll for multiple
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insertCms(
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
    ) {

        $sql = "
            INSERT INTO cms(logo_image,header_brand_name,homepage_header,homepage_subheader,
            optometrist_image,optometrist_name,optometrist_description,about_us,mission,vision,
            objective, address, contact, email)
            VALUES (:fileName, :headerBrandName, :homepageHeader,:homepageSubheader, 
            :fileName2,:optometristName,:optometristDescription,
            :aboutUs,:mission,:vision,:objective,:address,:contact,
            :email)
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':fileName', $fileName);
        $stmt->bindParam(':headerBrandName', $headerBrandName);
        $stmt->bindParam(':homepageHeader', $homepageHeader);
        $stmt->bindParam(':homepageSubheader', $homepageSubheader);
        $stmt->bindParam(':fileName2', $fileName2);
        $stmt->bindParam(':optometristName', $optometristName);
        $stmt->bindParam(':optometristDescription', $optometristDescription);
        $stmt->bindParam(':aboutUs', $aboutUs);
        $stmt->bindParam(':mission', $mission);
        $stmt->bindParam(':vision', $vision);
        $stmt->bindParam(':objective', $objective);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':contact', $contact);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return true;
    }

    public function updateCmsWithFile1(
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
    ) {


        $sql = "
            UPDATE cms SET logo_image = :fileName, header_brand_name = :headerBrandName,
            homepage_header = :homepageHeader, homepage_subheader = :homepageSubheader, 
            optometrist_name = :optometristName, 
            optometrist_description = :optometristDescription, about_us = :aboutUs, mission = :mission, 
            vision = :vision, objective = :objective, address = :address, contact = :contact, email = :email 
            WHERE id = :cmsId
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':fileName', $fileName);
        $stmt->bindParam(':headerBrandName', $headerBrandName);
        $stmt->bindParam(':homepageHeader', $homepageHeader);
        $stmt->bindParam(':homepageSubheader', $homepageSubheader);
        $stmt->bindParam(':optometristName', $optometristName);
        $stmt->bindParam(':optometristDescription', $optometristDescription);
        $stmt->bindParam(':aboutUs', $aboutUs);
        $stmt->bindParam(':mission', $mission);
        $stmt->bindParam(':vision', $vision);
        $stmt->bindParam(':objective', $objective);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':contact', $contact);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':cmsId', $cmsId);
        $stmt->execute();
        return true;

    }

    public function updateCmsWithFile2(
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
    ) {


        $sql = "
            UPDATE cms SET header_brand_name = :headerBrandName,
            homepage_header = :homepageHeader, homepage_subheader = :homepageSubheader, 
            optometrist_image = :fileName2,optometrist_name = :optometristName, 
            optometrist_description = :optometristDescription, about_us = :aboutUs, mission = :mission, 
            vision = :vision, objective = :objective, address = :address, contact = :contact, email = :email 
            WHERE id = :cmsId
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':fileName2', $fileName2);
        $stmt->bindParam(':headerBrandName', $headerBrandName);
        $stmt->bindParam(':homepageHeader', $homepageHeader);
        $stmt->bindParam(':homepageSubheader', $homepageSubheader);
        $stmt->bindParam(':optometristName', $optometristName);
        $stmt->bindParam(':optometristDescription', $optometristDescription);
        $stmt->bindParam(':aboutUs', $aboutUs);
        $stmt->bindParam(':mission', $mission);
        $stmt->bindParam(':vision', $vision);
        $stmt->bindParam(':objective', $objective);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':contact', $contact);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':cmsId', $cmsId);
        $stmt->execute();
        return true;

    }

    public function updateCmsWithFile1AndFile2(
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
    ) {


        $sql = "
            UPDATE cms SET logo_image = :fileName, header_brand_name = :headerBrandName,
            homepage_header = :homepageHeader, homepage_subheader = :homepageSubheader, 
            optometrist_image = :fileName2,optometrist_name = :optometristName, 
            optometrist_description = :optometristDescription, about_us = :aboutUs, mission = :mission, 
            vision = :vision, objective = :objective, address = :address, contact = :contact, email = :email 
            WHERE id = :cmsId
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':fileName', $fileName);
        $stmt->bindParam(':fileName2', $fileName2);
        $stmt->bindParam(':headerBrandName', $headerBrandName);
        $stmt->bindParam(':homepageHeader', $homepageHeader);
        $stmt->bindParam(':homepageSubheader', $homepageSubheader);
        $stmt->bindParam(':optometristName', $optometristName);
        $stmt->bindParam(':optometristDescription', $optometristDescription);
        $stmt->bindParam(':aboutUs', $aboutUs);
        $stmt->bindParam(':mission', $mission);
        $stmt->bindParam(':vision', $vision);
        $stmt->bindParam(':objective', $objective);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':contact', $contact);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':cmsId', $cmsId);
        $stmt->execute();
        return true;

    }

    public function getCmsInformation()
    {
        $sql = "
            SELECT * FROM cms
            ORDER BY id DESC LIMIT 1
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        //fetch for single and fetchAll for multiple
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>