<?php
class AdminProd extends Database
{
    public function getProductTableCount()
    {
        $sql = "
            SELECT * FROM products WHERE is_active <> '0'
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->rowCount();
        return $result;
    }
    public function getProductTableCountBySearch($productSearch)
    {
        $sql = "
            SELECT *
            FROM products
            WHERE 
            ((product_name LIKE '%" . $productSearch . "%'  OR 
            product_description LIKE '%" . $productSearch . "%' OR shape_type 
            LIKE '%" . $productSearch . "%' OR stock LIKE '%" . $productSearch . "%') AND (is_active <> '0'))
        ";
        $stmt = $this->conn->prepare($sql);

        $stmt->execute();
        $result = $stmt->rowCount();
        return $result;
    }

    public function getProductTableBySearch($thisPageFirstResult, $resultPerPage, $productSearch)
    {
        $sql = "
            SELECT *
            FROM products
            WHERE 
            ((product_name LIKE '%" . $productSearch . "%'  OR 
            product_description LIKE '%" . $productSearch . "%' OR shape_type 
            LIKE '%" . $productSearch . "%' OR stock LIKE '%" . $productSearch . "%') AND (is_active <> '0'))
            ORDER BY id
            DESC LIMIT $thisPageFirstResult, $resultPerPage
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        //fetch for single and fetchAll for multiple
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getProductTable($thisPageFirstResult, $resultPerPage)
    {
        $sql = "
            SELECT *
            FROM products WHERE is_active <> '0'
            ORDER BY id
            DESC LIMIT $thisPageFirstResult, $resultPerPage
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        //fetch for single and fetchAll for multiple
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateProductActiveStatus($productId)
    {
        $sql = "
            UPDATE products SET is_active = '0'
            WHERE id = :productId
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':productId', $productId);
        $stmt->execute();
        return true;
    }
}