<?php
class AdminAddProd extends Database
{
    public function getLastProductId()
    {
        $sql = "
            SELECT id FROM products
            ORDER BY id DESC LIMIT 1
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        //fetch for single and fetchAll for multiple
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insertProduct(
        $fileName,
        $productName,
        $productDescription,
        $shapeType,
        $stock
    ) {

        $sql = "
            INSERT INTO products(product_image,product_name,product_description,shape_type,
            stock, is_active,date_time_created)
            VALUES (:fileName, :productName, :productDescription,:shapeType, 
            :stock, '1', NOW())
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':fileName', $fileName);
        $stmt->bindParam(':productName', $productName);
        $stmt->bindParam(':productDescription', $productDescription);
        $stmt->bindParam(':shapeType', $shapeType);
        $stmt->bindParam(':stock', $stock);
        $stmt->execute();
        return true;
    }

}
?>