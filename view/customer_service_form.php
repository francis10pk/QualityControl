<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Customer Service Form</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #E0EDF2;
        max-width:800px; /* Set a maximum width for the body */
        margin: 0 auto; /* Center the content horizontally */
       
    }

    .container {
        margin: 50px auto;
    width: 100%;
    max-width: 550px; /* Limiting width to make it smaller */
}
    }

    h1 {
        text-align: center;
    }

    form {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>
    <div id="customer-service-form" class="container">
        <h1>Customer Service Form</h1>
        <form action="process_customer_service_form.php" method="post">
            <label for="customer_name">Customer Name:</label>
            <input type="text" id="customer_name" name="customer_name"><br>
            
            <label for="service_level">Service Level:</label>
            <input type="text" id="service_level" name="service_level"><br>
            
            <label for="status">Status:</label>
            <input type="text" id="status" name="status"><br>
            
            <label for="problem_description">Problem Description:</label><br>
            <textarea id="problem_description" name="problem_description" rows="4" cols="50"></textarea><br>
            
            <label for="findings">Findings:</label><br>
            <textarea id="findings" name="findings" rows="4" cols="50"></textarea><br>
            
            <label for="customer_product">Customer Product:</label>
            <input type="text" id="customer_product" name="customer_product"><br>
            
            <input type="submit" value="Save Report">
        </form>
    </div>
</body>
</html>
