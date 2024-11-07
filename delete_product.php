<?php

require_once 'db_connection.php';

if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    $db = new Database();
    $conn = $db->getConnection();

    $stmt = $conn->prepare("DELETE FROM products WHERE id = :id");
    $stmt->bindValue(':id', $productId, SQLITE3_INTEGER);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting product.";
    }
}
?>
