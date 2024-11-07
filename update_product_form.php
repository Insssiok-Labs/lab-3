<?php
require_once 'db_connection.php';

$db = new Database();
$conn = $db->getConnection();

$id = $_GET['id'];
$product = $conn->querySingle("SELECT * FROM products WHERE id = $id", true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
    <h2 class="text-2xl font-semibold text-gray-700 mb-6">Update Product</h2>

    <form action="update_product.php" method="post" class="space-y-4">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div>
            <label for="name" class="block text-gray-600">Product Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
            <label for="description" class="block text-gray-600">Description:</label>
            <textarea id="description" name="description" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"><?php echo htmlspecialchars($product['description']); ?></textarea>
        </div>

        <div>
            <label for="price" class="block text-gray-600">Price:</label>
            <input type="number" id="price" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" step="0.01" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">Update Product</button>
    </form>
</div>

</body>
</html>
