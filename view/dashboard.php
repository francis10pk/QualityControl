<?php
session_start(); // Start or resume the session

// Check if 'username' is set in the session
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Get username from session
$username = $_SESSION['username'];
$permission = $_SESSION['permission'];

function displayDashboardFeatures($permission)
{
    switch ($permission) {
        case 1: // Admin
            echo "<h3>Admin Options:</h3>";
            echo "<ul>";
            echo "<li><a href='user.php'>Manage User Account</a></li>";
            echo "<li><a href='NewEmployeeForm.php'>Manage Employee</a></li>";
            echo "<li><a href='MainPanel.php'>Employee Access</a></li>";
            echo "<li><a href='ClientPanelUpdate.php'>Client Access</a></li>";
            echo "</ul>";
            break;
        case 2: // Client
            echo "<h3>Client Options:</h3>";
            echo "<ul>";
            echo "<li><a href='ClientPanelUpdate.php'>Check Status</a></li>";
            echo "</ul>";
            break;
        case 3: // Employee (or other permission levels)
            echo "<h3>Employee Options:</h3>";
            echo "<ul>";
            echo "<li><a href='MainPanel.php'>Manage Clients</a></li>";
            echo "</ul>";
            break;
        default:
            // Default message or error handling for unknown permission
            echo "<p>Unknown permission level.</p>";

            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .welcome-msg {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .dashboard-features {
            border: 1px solid #ccc;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
        }
        .dashboard-features h3 {
            margin-top: 0;
            color: #333;
        }
        .dashboard-features ul {
            list-style-type: none;
            padding: 0;
        }
        .dashboard-features li {
            margin-bottom: 10px;
        }
        .dashboard-features li a {
            text-decoration: none;
            color: #007bff;
        }
        .dashboard-features li a:hover {
            text-decoration: underline;
        }
        .logout-link {
            display: inline-block;
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .logout-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="welcome-msg">Welcome, <?php echo $username; ?>!</div>

<div class="dashboard-features">
    <?php
    // Display dashboard features based on user's permission
    displayDashboardFeatures($permission);
    ?>
</div>
<a href="login.php" class="logout-link">Logout</a>
</body>
</html>
