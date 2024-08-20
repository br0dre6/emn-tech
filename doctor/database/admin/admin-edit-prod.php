<?php
class AdminEditProd extends Database
{

    public function getAdminProductInformationById($productId)
    {
        $sql = "
            SELECT * FROM products WHERE id= :productId
   
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':productId', $productId);
        $stmt->execute();
        //fetch for single and fetchAll for multiple
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
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

    public function updateProductWithoutImage(
        $productId,
        $productName,
        $productDescription,
        $shapeType,
        $stock
    ) {


        $sql = "
            UPDATE products SET product_name = :productName, product_description = :productDescription,
            shape_type = :shapeType, stock = :stock, date_time_updated = NOW()
            WHERE id = :productId
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':productId', $productId);
        $stmt->bindParam(':productName', $productName);
        $stmt->bindParam(':productDescription', $productDescription);
        $stmt->bindParam(':shapeType', $shapeType);
        $stmt->bindParam(':stock', $stock);

        $stmt->execute();
        return true;

    }

    public function updateProductWithImage(
        $productId,
        $fileName,
        $productName,
        $productDescription,
        $shapeType,
        $stock
    ) {


        $sql = "
            UPDATE products SET product_image = :fileName, product_name = :productName, product_description = :productDescription,
            shape_type = :shapeType, stock = :stock, date_time_updated = NOW()
            WHERE id = :productId
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':fileName', $fileName);
        $stmt->bindParam(':productId', $productId);
        $stmt->bindParam(':productName', $productName);
        $stmt->bindParam(':productDescription', $productDescription);
        $stmt->bindParam(':shapeType', $shapeType);
        $stmt->bindParam(':stock', $stock);

        $stmt->execute();
        return true;

    }

}
?>