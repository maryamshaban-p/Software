<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "estore"; 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$product_id = isset($_GET['prod_id']) ? intval($_GET['prod_id']) : 0;
$productQuery = "SELECT * FROM products WHERE prod_id = $product_id";
$productResult = $conn->query($productQuery);
$product = $productResult->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product ? $product['name'] : 'Product Not Found'; ?> - Product Details</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }
        .product_details {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .product_image img {
            max-width: 100%;
            border-radius: 8px;
        }
        .product_name {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }
        .price_text {
            font-size: 20px;
            color: #e67e22;
            margin: 10px 0;
        }
        .description_text {
            font-size: 16px;
            color: #555;
            margin: 20px 0;
        }
        .add_to_cart {
            margin-top: 20px;
        }
        .add_cart_button {
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #e67e22;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .add_cart_button:hover {
            background-color: #d35400;
        }
    </style>
</head>
<body>

<div class="product_details">
    <?php if ($product): ?>
        <h1 class="product_name"><?php echo $product['name']; ?></h1>
        <div class="product_image">
            <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
        </div>
        <p class="price_text">Price: <span style="color: #262626;">$ <?php echo $product['Price']; ?></span></p>
        <p class="description_text"><?php echo $product['description']; ?></p>
        <div class="add_to_cart">
            <button class="add_cart_button">Add to Cart</button>
        </div>
    <?php else: ?>
        <p>Product not found.</p>
    <?php endif; ?>
</div>

<?php
$conn->close();
?>

</body>
</html>