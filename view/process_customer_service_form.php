<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $customerName = $_POST["customer_name"];
    $serviceLevel = $_POST["service_level"];
    $status = $_POST["status"];
    $problemDescription = $_POST["problem_description"];
    $findings = $_POST["findings"];
    $customerProduct = $_POST["customer_product"];
    
    // Now, you can save this data to a database or perform any other actions as needed
    // Example: Saving to a database
    $pdo = new PDO("mysql:host=localhost;dbname=qualitycontroldb", "root", "");
    $stmt = $pdo->prepare("INSERT INTO customer_service (customer_name, service_level, status, problem_description, findings, customer_product) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$customerName, $serviceLevel, $status, $problemDescription, $findings, $customerProduct]);

    header("Location: Employee.php");
    exit(); // Stop execution after redirect
}
?>
