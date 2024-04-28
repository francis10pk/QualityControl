<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        .container {
            display: flex;
        }
        .sidebar {
            flex: 0 0 200px;
            background-color: #333;
            color: #fff;
            padding: 20px;
        }
        .main-content {
            flex: 1;
            padding-left: 20px;
        }
        h1 {
            text-align: center;
            background-color: #f2f2f2;
            padding: 20px;
            margin-top: 0;
        }
        p {
            text-align: center;
            background-color: #f2f2f2;
            padding: 10px;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border: 1px solid black;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        
        
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 10px; /* Add space between each option */
        }

        .sidebar ul li a {
            display: block;
            padding: 10px; /* Increase padding to make the options appear bigger */
            text-decoration: none;
            color: #fff;
        }

        .sidebar ul li a:hover {
            background-color: #555;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>Processes</h2>
            <ul>
                <li><a href="#">Reception</a></li>
                <li><a href="#">Evaluating</a></li>
                <li><a href="#">Repairing</a></li>
                <li><a href="#">At Supplier</a></li>
                <li><a href="#">Dispatch</a></li>
                <li><a href="#">Generate Evaluation Report</a></li>
                <li><a href="#">Generate Repair Report</a></li>
                <li><a href="#">OC Client received</a></li>
                <li><a href="#">Completed spare parts</a></li>
                <li><a href="#">Generate Quality Control Report</a></li>
            </ul>
        </div>
        
          
        </div>
  
</body>
</html>
