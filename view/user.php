<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User Account</title>
    <style>
          body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        h1 {
            text-align: center;
            background-color: #f2f2f2;
            padding: 20px;
        }
        p {
            text-align: center;
            background-color: #f2f2f2;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid black;
            border-radius: 8px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            text-align: left;
            background-color: #f2f2f2;
        }
        input[type="text"],
        input[type="password"],
        input[type="date"],
        select {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            
            display: inline-block;
            width: calc(32% - 12px);
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin: 5px;
            
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Create User Account</h1>
    <form action="../models/UserAccountDB.php" method="post">
        <table>
            <tr>
                <th >User ID:</th>
                <td style="text-align: center;">

                    <?php
                    require_once '../models/dbconfig.php';
                    session_start();
                    
                    $query = "SELECT User_Id FROM users_account";
                    
                    // Execute the query
                    $result = mysqli_query($connection, $query);
                    
                    // Check if query was successful
                    if ($result) {
                        
                        echo '<select name="user_id">';
                    
                        // Loop through the result set to fetch IDs and create options
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['User_Id'];
                            echo '<option value="' . $id . '">' . $id . '</option>';
                        }
                    
                        echo '</select>';
                        
                    } else {
                        // Query failed, handle the error (e.g., display an error message)
                        echo '<td>Error fetching IDs</td>';
                    }
                    ?>
                    
                </td>
            </tr>
			<tr>
                <th>User Type:</th>
                <td>
                    <select name="user_type">
                        <option value="client">Client</option>
                        <option value="employee">Employee</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>ID:</th>
                <td><input type="text" name="id" ></td>
            </tr>
            <tr>
                <th>Username:</th>
                <td><input type="text" name="username" ></td>
            </tr>
            <tr>
                <th>Password:</th>
                <td><input type="password" name="password" ></td>
            </tr>
            <tr>
                <th>Status ID:</th>
                <td><input type="text" name="status_id" ></td>
            </tr>
            <tr>
                <th>Date Registered:</th>
                <td><input type="date" name="date_register" value="<?php echo date('Y-m-d'); ?>" required></td>
            </tr>
        </table>
        <button type="submit" name="operation" value="Submit">Create*</button>
        <button type="submit" name="operation" value="Update">Update**</button>
        <button type="submit" name="operation" value="Delete">Delete**</button>
    </form>
    <p>*To Create User select: type,id-type, username, password, status-id and date</p>
	<p>**Select User ID to Update OR Delete</p>
</body>
</html>
