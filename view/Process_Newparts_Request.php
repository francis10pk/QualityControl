<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $customerName = $_POST["customer_name"];
    $select_part = $_POST["select_part"];
    $description = $_POST["description"];
    $quantity = $_POST["quantity"];
    $customerProduct = $_POST["customer_product"];
    
    // Now, you can save this data to a database or perform any other actions as needed
    // Example: Saving to a database
    $pdo = new PDO("mysql:host=localhost;dbname=qualitycontroldb", "root", "");
    $stmt = $pdo->prepare("INSERT INTO new_request (customer_name, select_part,description, quantity, customer_product) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$customerName, $select_part, $description, $quantity, $customerProduct]);
    
    header("Location: Employee.php");
    exit(); // Stop execution after redirect
}

