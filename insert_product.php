<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "estore"; 
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $pod_id = $_POST['pod_id'];
    $categ_id = $_POST['categ_id'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $sql = "INSERT INTO products (name, prod_id, categ_id, description, image, price) 
            VALUES ('$name', '$pod_id', '$categ_id', '$description', '$image', '$price')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('New product inserted successfully');
                window.location.href = 'add-products.html'; // Redirect to another page if needed
              </script>";
    } else {
        echo "<script>
                alert('Error inserting product: " . $conn->error . "');
              </script>";
    }

    $conn->close();
}
?>
