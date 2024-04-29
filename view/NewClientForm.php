
<html>
<head>
<style>

 body, html {
            height: 100%;
            margin: 0;
        }
        .container {
            display: grid;
            grid-template-rows: 1fr 3fr;
            height: 100%;
        }
        .section {
            border: 1px solid black;
            padding: 20px;
        }
.column1 {
    grid-row: 1/2;
    grid-column: 1/2;
    color: #fff;
   
}
table, th, td {
	border: 1px solid black;
	padding: 8px;
	text-align: left;
}

h1 {
	text-align: center;
}

table {
	margin-left: auto;
	margin-right: auto;
}

div {
	margin: 0 auto;
	width: 100%;
}

h1 {
	text-align: center;
	background-color: #f2f2f2;
	padding: 20px;
}

table {
	text-align: center;
	background-color: #f2f2f2;
	padding: 20px;
}

.button {
	display: flex;
	justify-content: center;
	align-items: center;
}

.button button, .button-search button, .button-searchById button {
	background-color: #4CAF50;
	color: white;
	border: none;
	padding: 10px 20px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 16px;
	margin: 4px 2px;
	cursor: pointer;
	border-radius: 5px;
}

.button-search, .button-searchById {
	display: flex;
	justify-content: center;
	align-items: center;
	
}

.table {
	justify-content: center;
	align-items: center;
}
.section {
	border: 1px solid black;
	padding: 20px;
	background-color: #007bff;
}

a {
	color: white;
	
}
.bottom-left {
    position: fixed;
    bottom: 0;
    left: 0;
    padding: 10px; /* Adjust padding as needed */
    background-color: #4CAF50;
    color: white;
    text-decoration: none;
}
</style>
</head>
<body>

<form action="NewClientForm.php" method="post">
<div class ="container">
<div class = "column1">



<hr>
<div class="section">
<a href="MainPanel.php">Go Main Panel</a>
</div>
<hr>




</div>
    <div class = "column2">
        <h1>Client Form</h1>
            <table border='1'>	
                <tr>
                    <th>Client Id</th> 				
                    <td><input type="text" name= "Client_Id" id="Client_Id" /></td>
                </tr>
                <tr>
                    <th>Client Code</th>				
                    <td><input type="text" name= "ClientCode"  id="ClientCode" /></td>
                </tr>
                <tr>
                    <th>Client Name</th>		
                    <td><input type="text" name= "ClientName" id="ClientName" /></td>
                </tr>
                <tr>
                    <th>Status Id</th>
                    <td><input type="text" name= "Status_Id" id="Status_Id" /></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><input type="text" name= "Address" id="Address" /></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input type="text" name= "Email" id="Email" /></td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td><input type="text" name= "PhoneNumber" id="PhoneNumber" /></td>
                </tr>
                <tr>
                    <th>Date Register</th>
                    <td><input type="text" name= "DateRegister" id="DateRegister" value="<?php echo date('Y-m-d'); ?>"/></td> 
                </tr>
            </table>
        
        	
        	<div class="button">
        		<button type="submit" name= "operation" value="Submit">Submit</button>	
           		<button type="submit" name= "operation" value="Update">Update</button>
    </div>   	
    <div class = "column3">    	
    	
    	<div class="button-search">
    	
    	
    		<button type="submit" name="operation" value="SearchAll">List of Client</button>
    	</div>
    
    	<div class="button-searchById">
    		
    	
    		<button type="submit" name="operation" value="SearchClient">Search Client By ID</button>
    	</div>
    	<hr>
    </div>
</div>	
</div>
</form>
<?php
require_once '../models/dbconfig.php';
use \class\ClientClass;
require 'C:\xampp\htdocs\QualityControl\class\ClientClass.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    try{
        $connection = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
    
        if(isset($_POST["operation"])) 
        {
            $operation = $_POST["operation"];
            
            switch ($operation)
            {
                case "Submit":
                    
                   $Client_Id = $_POST["Client_Id"];
                   $ClientCode = $_POST["ClientCode"];
                   $ClientName = $_POST["ClientName"];
                   $Status_Id = $_POST["Status_Id"];
                   $Address = $_POST["Address"];
                   $Email = $_POST["Email"];
                   $PhoneNumber = $_POST["PhoneNumber"];
                   $DateRegister = $_POST["DateRegister"];
                                       
                   $client1 = new ClientClass($Client_Id, $ClientCode, $ClientName, $Status_Id, $Address, $Email, $PhoneNumber, $DateRegister);
                    
                   $isInserted = $client1->create($connection);
                   if($isInserted == true) 
                   {
                       echo "Client inserted successfully";
                   }
                   break;
                   
                case "Update":
                    
                    $Client_Id = $_POST["Client_Id"];
                    $ClientCode = $_POST["ClientCode"];
                    $ClientName = $_POST["ClientName"];
                    $Status_Id = $_POST["Status_Id"];
                    $Address = $_POST["Address"];
                    $Email = $_POST["Email"];
                    $PhoneNumber = $_POST["PhoneNumber"];
                    //$DateRegister = $_POST["DateRegister"];

                    $C1 = new ClientClass();
                    $C1->setClient_Id($Client_Id);
                    
                    //--ClientCode--//
                    $C1->setClientCode($ClientCode);
                    $result = $C1->update("c", $connection);
                    if ($result == true) {
                        echo "Client Code updated successfully";
                    }
                    //--ClientName--//
                    $C1->setClientName($ClientName);
                    $result = $C1->update("n", $connection);
                    if ($result == true) {
                        echo "Client Name updated successfully";
                    }
                    //--Status_Id--//
                    $C1->setStatus_Id($Status_Id);
                    $result = $C1->update("s", $connection);
                    if ($result == true) {
                        echo "Status Id updated successfully";
                    }
                    //--Address--//
                    $C1->setAddress($Address);
                    $result = $C1->update("a", $connection);
                    if ($result == true) {
                        echo "Address updated successfully";
                    }
                    //--Email--//
                    $C1->setEmail($Email);
                    $result = $C1->update("e", $connection);
                    if ($result == true) {
                        echo "Email updated successfully";
                    }
                    //--PhoneNumber--//
                    $C1->setPhoneNumber($PhoneNumber);
                    $result = $C1->update("p", $connection);
                    if ($result == true) {
                        echo "Phone Number updated successfully";
                    }   
                    break;
                    
                case "SearchAll":
                    $C2 = new ClientClass();
                    $result = $C2->getAllClients($connection);
                    $C2->displayClients($result);
                    break;
                    
                case "SearchClient":
                    $Client_Id = $_POST["Client_Id"];
                    $C3 = new ClientClass();
                    $C3->setClient_Id($Client_Id);
                    $result = $C3->getClientById($connection);
                    $C3->displayClients($result);
                    
                    break;
                    
                default:
                    break;
                                       
                   
            }
            
            }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    
    
    }
    
}
?>
<?php
    echo '<a  class="bottom-left" href="dashboard.php" class="button">Back</a>';
?>
</body>
</html>









