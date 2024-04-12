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
        h2 {
            color: #333;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }
        input[type="text"],
        input[type="password"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 15px;
        }
        button {
            background-color: #007bff;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Create User Account</h2>
    <form action="../models/create_user_form.php" method="post">
        <div>
            <label for="select_option">User Type:</label>
            <select id="select_option"  name="user_type">
                <option value="client" >Client</option>
                <option value="employee" >Employee</option>
            </select>
        </div>

        <div>
            <label for="id_input">ID:</label>
            <input type="text" id="id_input" name="id" required>
        </div>

        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <label for="status_id">Status ID:</label>
            <input type="text" id="status_id" name="status_id" required>
        </div>

        <div>
            <label for="date_register">Date Registered:</label>
            <input type="date" id="date_register" name="date_register" value="<?php echo date('Y-m-d'); ?>" required>
        </div>

        <div>
            <button type="submit">Create User</button>
        </div>
    </form>
</body>
</html>
