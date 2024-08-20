<?php
// for localhost
class Database
{
    private $dsn = "mysql:host=localhost;dbname=opto";
    private $user = "root";
    private $pass = "";
    protected $conn;
    public function __construct()
    {
        try {
            // PDO is a class
            $this->conn = new PDO($this->dsn, $this->user, $this->pass);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

// for webhost
// class Database
// {
//     private $dsn = "mysql:host=localhost;dbname=u128886969_opto";
//     private $user = "u128886969_opto";
//     private $pass = "123123Qq@";
//     protected $conn;
//     public function __construct()
//     {
//         try {
//             // PDO is a class
//             $this->conn = new PDO($this->dsn, $this->user, $this->pass);
//         } catch (PDOException $e) {
//             echo $e->getMessage();
//         }
//     }
// }

?>