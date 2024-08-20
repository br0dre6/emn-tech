<?php
class MessageUs extends Database
{
    public function getMessageUsTableCount()
    {
        $sql = "
            SELECT * FROM email_message
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->rowCount();
        return $result;
    }
    public function getMessageUsTableCountBySearch($messageUsSearch)
    {
        $sql = "
            SELECT *
            FROM email_message
            WHERE 
            ((name LIKE '%" . $messageUsSearch . "%'  OR 
            email LIKE '%" . $messageUsSearch . "%' OR message 
            LIKE '%" . $messageUsSearch . "%' ))
        ";
        $stmt = $this->conn->prepare($sql);

        $stmt->execute();
        $result = $stmt->rowCount();
        return $result;
    }

    public function getMessageUsTableBySearch($thisPageFirstResult, $resultPerPage, $messageUsSearch)
    {
        $sql = "
            SELECT *
            FROM email_message
            WHERE 
            ((name LIKE '%" . $messageUsSearch . "%'  OR 
            email LIKE '%" . $messageUsSearch . "%' OR message 
            LIKE '%" . $messageUsSearch . "%' ))
            ORDER BY id
            DESC LIMIT $thisPageFirstResult, $resultPerPage
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        //fetch for single and fetchAll for multiple
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getMessageUsTable($thisPageFirstResult, $resultPerPage)
    {
        $sql = "
            SELECT *
            FROM email_message
            ORDER BY id
            DESC LIMIT $thisPageFirstResult, $resultPerPage
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        //fetch for single and fetchAll for multiple
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>