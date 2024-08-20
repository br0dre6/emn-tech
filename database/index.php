<?php
class Index extends Database
{

    public function insertEmailMessage(
        $name,
        $email,
        $message

    ) {
        $sql = "
            INSERT INTO email_message(name,email,message)
            VALUES (:name,:email,:message)
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);

        $stmt->execute();
        return true;
    }

}
?>