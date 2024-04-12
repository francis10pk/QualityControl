<?php
use class\UsersAccountsClass;
require_once '../models/dbconfig.php';
require '../class/UsersAccountsClass.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connection = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status_id = $_POST['status_id'];
    $data_register = $_POST['date_register'];
    $userType = $_POST['user_type'];
    $id = $_POST['id'];
    
    $notificationMessage = ""; // Initialize notification message variable
    
    if ($userType === 'client') {
        $user = new UsersAccountsClass($id, null, $username, $password, $status_id, $data_register);
        $isInserted = $user->create("c",$connection);
        if ($isInserted) {
            $clientId = $user->getClient_Id();
            $notificationMessage = "The User with the ID $clientId has been added successfully.";
        } else {
            $notificationMessage = "Failed to add the user. Please try again.";
        }
    } elseif ($userType === 'employee') {
        $user = new UsersAccountsClass(null, $id, $username, $password, $status_id, $data_register);
        $isInserted = $user->create("e",$connection);
        if ($isInserted) {
            $clientId = $user->getClient_Id();
            $notificationMessage = "The User with the ID $clientId has been added successfully.";
        } else {
            $notificationMessage = "Failed to add the user. Please try again.";
        }
    } else {
        $notificationMessage = "Invalid user type";
    }
    /*
    if (isset($user)) {
        $isInserted = $user->create($connection);
        if ($isInserted) {
            $clientId = $user->getClient_Id();
            $notificationMessage = "The User with the ID $clientId has been added successfully.";
        } else {
            $notificationMessage = "Failed to add the user. Please try again.";
        }
    }
    */
    // Display the notification message
    if (!empty($notificationMessage)) {
        echo '<div style="padding: 10px; background-color: #dff0d8; border: 1px solid #3c763d; color: #3c763d; margin-bottom: 10px;">';
        echo "<p>$notificationMessage</p>";
        echo '<a href="' . $_SERVER['HTTP_REFERER'] . '" class="button">Back</a>'; // Back button as a link
        echo '</div>';
    }
}
?>
