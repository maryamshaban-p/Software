<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prod_id = $_POST['prod_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $conn = new mysqli('localhost', 'root', '', 'estore');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE products SET name='$name', description='$description', price='$price' WHERE prod_id='$prod_id'";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Product updated successfully"]);
    } else {
        echo json_encode(["message" => "Error updating product: " . $conn->error]);
    }

    $conn->close();
}
?>
