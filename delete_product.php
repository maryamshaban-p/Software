<?php
 {
    $prod_id = $_GET['id'];

    $conn = new mysqli('localhost', 'root', '', 'estore');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM products WHERE prod_id='$prod_id'";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Product deleted successfully"]);
    } else {
        echo json_encode(["message" => "Error deleting product: " . $conn->error]);
    }

    $conn->close();
}
?>
