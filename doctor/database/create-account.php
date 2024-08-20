<?php
class CreateAccount extends Database
{
    public function getExistingEmail($email)
    {
        $sql = "
            SELECT email FROM webuser WHERE email = :email
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
}
?>