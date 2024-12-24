<?php
// get_product.php
if (isset($_GET['id'])) {
    $prod_id = $_GET['id'];
    $conn = new mysqli('localhost', 'root', '', 'estore');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT prod_id, name, description, price FROM products WHERE prod_id='$prod_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(["message" => "Product not found"]);
    }

    $conn->close();
}
?>
