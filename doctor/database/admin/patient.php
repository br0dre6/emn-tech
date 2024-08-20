<?php
class Patient extends Database
{

    public function insertWalkinAccount(
        $patientName,
        $patientAddress,
        $dateOfBirth,
        $patientEmail,
        $patientPhone,
        $patientPassword

    ) {


        $sql = "
            INSERT INTO patient(pemail,pname,ppassword,paddress,
            pnic,pdob,ptel)
            VALUES (:patientEmail, :patientName,:patientPassword,:patientAddress,NULL,:dateOfBirth,:patientPhone)
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':patientEmail', $patientEmail);
        $stmt->bindParam(':patientName', $patientName);
        $stmt->bindParam(':patientPassword', $patientPassword);
        $stmt->bindParam(':patientAddress', $patientAddress);
        $stmt->bindParam(':dateOfBirth', $dateOfBirth);
        $stmt->bindParam(':patientPhone', $patientPhone);

        $stmt->execute();

        $sql2 = "
            INSERT INTO webuser VALUES (:patientEmail,'p')
        ";
        $stmt2 = $this->conn->prepare($sql2);
        $stmt2->bindParam(':patientEmail', $patientEmail);

        $stmt2->execute();
        return true;
    }

}
?>