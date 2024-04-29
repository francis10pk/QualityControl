<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>New Part Reqest Form</title>
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
    <div id="New_Request_form" class="container">
        <h1>New Request Form</h1>
        <form action="process_Newparts_Request.php" method="post">
            <label for="customer_name">Customer Name:</label>
            <input type="text" id="customer_name" name="customer_name"><br>
            
            <label for="select_part">Select_part:</label>
            <input type="text" id="select_Part" name="select_part"><br>
            
            <label for="discription">Discription:</label>
            <textarea type="text" id="discription" name="discription"></textarea><br>
            
            <label for="quantity">Quantity:</label>
            <input  type="text" id="quantity" name="quantity" ><br>
            
         
            
            <label for="customer_product">Customer Product:</label>
            <input type="text" id="customer_product" name="customer_product"><br>
            
            <input type="submit" value="Send Requesnt">
        </form>
    </div>
</body>
</html>
