
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

h2 {
	text-align: center;
	background-color: #f2f2f2;
	padding: 20px;
}

.section {
	border: 1px solid black;
	padding: 20px;
	background-color: #007bff;
}

a {
	color: white;
}

.column3 {
	padding: 0px;
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

<form action="NewEmployeeForm.php" method="post">
<div class ="container">
<div class = "column1">

</div>
    <div class = "column2">
        <h1>Employee Form</h1>
            <table border='1'>	
                <tr>
                    <th>Employee ID</th> 				
                    <td><input type="text" name= "Employee_Id" id="Employee_Id" /></td>
                </tr>
                <tr>
                    <th>First Name</th>				
                    <td><input type="text" name= "FirstName"  id="FirstName" /></td>
                </tr>
                <tr>
                    <th>Last Name</th>		
                    <td><input type="text" name= "LastName" id="LastName" /></td>
                </tr>
                <tr>
                    <th>Job Id</th>
                    <td><input type="text" name= "Job_Id" id="Job_Id" /></td>
                </tr>
                <tr>
                    <th>Status Id</th>
                    <td><input type="text" name= "Status_Id" id="Status_Id" /></td>
                </tr>                
                <tr>
                    <th>Date Register</th>
                    <td><input type="text" name= "DateRegister" id="DateRegister" value="<?php echo date('Y-m-d'); ?>"/></td> 
                </tr>
                <tr>
                    <th>Address</th>
                    <td><input type="text" name= "Address" id="Address"/></td> 
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input type="text" name= "Email" id="Email" /></td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td><input type="text" name= "PhoneNumber" id="PhoneNumber" /></td>
                </tr>                
            </table>
        
        	
        	<div class="button">
        		<button type="submit" name= "operation" value="Submit">Submit</button>	
           		<button type="submit" name= "operation" value="Update">Update</button>
    </div>   	
    <div class = "column3">    	
    	
    	<div class="button-search">
    	
    	
    		<button type="submit" name="operation" value="SearchAll">List of Employee</button>
    	</div>
    
    	<div class="button-searchById">   		
    	
    		<button type="submit" name="operation" value="SearchClient">Search Employee By ID</button>
    	</div>
    	<hr>
    </div>
</div>	
</div>
</form>
<?php
require_once '../models/dbconfig.php';
use \class\EmployeeClass;
require 'C:\xampp\htdocs\QualityControl\class\EmployeeClass.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    try{
        $connection = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
    
        if(isset($_POST["operation"])) 
        {
            $operation = $_POST["operation"];
            
            switch ($operation)
            {
                case "Submit":
                    
                   //$Employee_Id = $_POST["Employee_Id"];
                   $FirstName = $_POST["FirstName"];
                   $LastName = $_POST["LastName"];
                   $Job_Id = $_POST["Job_Id"];
                   $Status_Id = $_POST["Status_Id"];                  
                   $DateRegister = $_POST["DateRegister"];
                   $Address = $_POST["Address"];
                   $Email = $_POST["Email"];
                   $PhoneNumber = $_POST["PhoneNumber"];                 
                   
                   
                                       
                   $employee1 = new EmployeeClass($FirstName, $LastName, $Job_Id, $Status_Id, $DateRegister, $Address, $Email, $PhoneNumber);
                    
                   $isInserted = $employee1->create($connection);
                   if($isInserted == true) 
                   {
                       echo "Employee inserted successfully";
                   }
                   break;
                   
                case "Update":
                    
                    $Employee_Id = $_POST["Employee_Id"];
                    $FirstName = $_POST["FirstName"];
                    $LastName = $_POST["LastName"];
                    $Job_Id = $_POST["Job_Id"];
                    $Status_Id = $_POST["Status_Id"];
                    //$User_Id = $_POST["User_Id"];
                    //$DateRegister = $_POST["DateRegister"];
                    $Address = $_POST["Address"];
                    $Email = $_POST["Email"];
                    $PhoneNumber = $_POST["PhoneNumber"];
                

                    $E1 = new EmployeeClass();
                    $E1->setEmployee_Id($Employee_Id);
                    
                      //--FirstName--//
                    $E1->setFirstName($FirstName);
                    $result = $E1->update("f", $connection);
                    if ($result == true) {
                        echo "First Name updated successfully";
                    }
                    //--LastName--//
                    $E1->setLastName($LastName);
                    $result = $E1->update("l", $connection);
                    if ($result == true) {
                        echo "Last Name updated successfully";
                    }
                    //--Job_Id--//
                    $E1->setJob_Id($Job_Id);
                    $result = $E1->update("j", $connection);
                    if ($result == true) {
                        echo "Job Id updated successfully";
                    }
                    //--Status_Id--//
                    $E1->setStatus_Id($Status_Id);
                    $result = $E1->update("s", $connection);
                    if ($result == true) {
                        echo "Status Id updated successfully";
                    }
                    //--Address--//
                    $E1->setAddress($Address);
                    $result = $E1->update("a", $connection);
                    if ($result == true) {
                        echo "Address updated successfully";
                    }
                    //--Email--//
                    $E1->setEmail($Email);
                    $result = $E1->update("e", $connection);
                    if ($result == true) {
                        echo "Email updated successfully";
                    }
                    //--PhoneNumber--//
                    $E1->setPhoneNumber($PhoneNumber);
                    $result = $E1->update("p", $connection);
                    if ($result == true) {
                        echo "Phone Number updated successfully";
                    }
                    break;
                                                            
                    
                case "SearchAll":
                    
                    $E2 = new EmployeeClass();
                    $result = $E2->getAllEmployees($connection);
                    $E2->displayEmployees($result);
                    break;                    
                
                    
                default:
                    break;                                      
                   
            }
            
            }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    
    
    }
    
}


echo '<a  class="bottom-left" href="dashboard.php" class="button">Back</a>';
  
?>

</body>
</html>



