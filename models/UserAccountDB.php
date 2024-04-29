<?php
    //require_once 'Service_OrderClass.php';
    use \class\UsersAccountsClass;
    use \class\UserAccountPermissionClass;

    require_once '../models/dbconfig.php';
    require 'C:\xampp\htdocs\QualityControl\class\UserAccountPermissionClass.php';
    require '../class/UsersAccountsClass.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            $connection = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

            if (isset($_POST["operation"])) {
                $operation = $_POST["operation"];

                switch ($operation) {
                    case "Submit":
                        // Retrieve form data
                        $userID = $_POST['user_id'];
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
                            $userTofind = $user->getClientbyUsername($connection);
                            $permission = new UserAccountPermissionClass($userTofind->getUser_Id(), 2);
                            $permission->create($connection);
                            if ($isInserted) {
                                
                                $notificationMessage = "The User with the Username $username has been added successfully.";
                            } else {
                                $notificationMessage = "Failed to add the user. Please try again.";
                            }
                        } elseif ($userType === 'employee') {
                            $user = new UsersAccountsClass(null, $id, $username, $password, $status_id, $data_register);
                            $isInserted = $user->create("e",$connection);
                            $userTofind = $user->getClientbyUsername($connection);
                            $permission = new UserAccountPermissionClass($userTofind->getUser_Id(), 2);
                            $permission->create($connection);
                            if ($isInserted) {
                                $notificationMessage = "The User with the Username $username has been added successfully.";
                            } else {
                                $notificationMessage = "Failed to add the user. Please try again.";
                            }
                        } else {
                            $notificationMessage = "Invalid user type";
                        }
                        
                        if (!empty($notificationMessage)) {
                            echo '<div style="padding: 10px; background-color: #dff0d8; border: 1px solid #3c763d; color: #3c763d; margin-bottom: 10px;">';
                            echo "<p>$notificationMessage</p>";
                            echo '<a href="' . $_SERVER['HTTP_REFERER'] . '" class="button">Back</a>'; // Back button as a link
                            echo '</div>';
                        }
                        break;

                    case "Update":
                        $userID = $_POST['user_id'];
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $status_id = $_POST['status_id'];
                        $data_register = $_POST['date_register'];
                        $userType = $_POST['user_type'];
                        $id = $_POST['id'];
                        $notificationMessage = "";
                        if ($userType === 'client') {
                            $user = new UsersAccountsClass($id, null, $username, $password, $status_id, $data_register);
                            $user->setUser_Id($userID);
                            $isUpdated = $user->update($connection);
                            if ($isUpdated) {
                                $notificationMessage = "The User with the ID $userID has been Updated successfully.";
                            } else {
                                $notificationMessage = "Failed to Update the user. Please try again.";
                            }
                        } elseif ($userType === 'employee') {
                            $user = new UsersAccountsClass(null, $id, $username, $password, $status_id, $data_register);
                            $user->setUser_Id($userID);
                            $isUpdated = $user->update($connection);
                            if ($isUpdated) {
                                $notificationMessage = "The User with the ID $userID has been Updated successfully.";
                            } else {
                                $notificationMessage = "Failed to Update the user. Please try again.";
                            }
                        } else {
                            $notificationMessage = "Invalid user type";
                        }
                        if (!empty($notificationMessage)) {
                            echo '<div style="padding: 10px; background-color: #dff0d8; border: 1px solid #3c763d; color: #3c763d; margin-bottom: 10px;">';
                            echo "<p>$notificationMessage</p>";
                            echo '<a href="' . $_SERVER['HTTP_REFERER'] . '" class="button">Back</a>'; // Back button as a link
                            echo '</div>';
                        }
                        break;

                    case "Delete":
                        
                        $userID = $_POST['user_id'];
                       
                        $notificationMessage = "";
                        
                        $user = new UsersAccountsClass();
                        $user->setUser_Id($userID);
                        $isUpdated = $user->delete($connection);
                        if ($isUpdated) {
                            $notificationMessage = "The User with the ID $userID has been Delete successfully.";
                        } else {
                            $notificationMessage = "Failed to Delete the user. Please try again.";
                        }
                       
                        
                        if (!empty($notificationMessage)) {
                            echo '<div style="padding: 10px; background-color: #dff0d8; border: 1px solid #3c763d; color: #3c763d; margin-bottom: 10px;">';
                            echo "<p>$notificationMessage</p>";
                            echo '<a href="' . $_SERVER['HTTP_REFERER'] . '" class="button">Back</a>'; 
                            echo '</div>';
                        }
                        break;

                    default:
                        break;
                }
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    