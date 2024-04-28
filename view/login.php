<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .login-container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .login-container h2 {
            text-align: center;
            color: #333333;
        }
        .login-form {
            margin-top: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .login-btn {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .login-btn:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: #ff0000;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form class="login-form" action="#" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <button type="submit" class="login-btn">Login</button>
            </div>
            <?php
            session_start();
            require_once '../models/dbconfig.php';

            global $connection;
            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST['username'];
                $password = $_POST['password'];
                
                $query = "SELECT * FROM users_account WHERE username='$username' AND password='$password'";
                
                $result = mysqli_query($connection, $query);

                if (mysqli_num_rows($result) == 1) {
                    // Login successful
                    $user = mysqli_fetch_assoc($result);
                    $id = $user['User_Id'];
                    $perm_query = "SElECT Permission_Id from users_account_permission where User_Id = $id";
                    $resultP = mysqli_query($connection, $perm_query);
                    
                    
                    if ($resultP) {
                        $user_permission = mysqli_fetch_assoc($resultP);
                        $permission_id = $user_permission['Permission_Id'];
                        
                        // Store username and permission_id in session
                        $_SESSION['username'] = $username;
                        $_SESSION['permission'] = $permission_id;
                        
                        
                        
                        // Redirect to dashboard upon successful login
                        header("Location: dashboard.php");
                        exit();
                    } else {
                        // Error fetching permission
                        echo "<p class='error-message'>Error fetching permission.</p>";
                    }
                } else {
                    // Login failed
                    echo "<p class='error-message'>Invalid username or password</p>";
                }
            }
            
            mysqli_close($connection);
            ?>
        </form>
    </div>
</body>
</html>
