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
</style>
</head>
<body>
 
<form action="NewOrderServiceForm.php" method="post">
<div class ="container">
    <div class = "column1">
    <hr>
    <div class="section">
    <a href="MainPanel.php">Go Main Panel</a>
    </div>
    <hr>
     
    </div>
        <div class = "column2">
            <h1>Machine Maintenance Form</h1>
                <table border='1'>	
                    <tr>
                        <th>Machine code</th> 				
                        <td><input type="text" name= "Machine code" id="Machine_code" /></td>
                    </tr>
                    <tr>
                        <th>Model</th>				
                        <td><input type="text" name= "Model"  id="Model" /></td>
                    </tr>
                    <tr>
                        <th>MachineLine</th>		
                        <td><input type="text" name= "MachineLine" id="MachineLine" /></td>
                    </tr>
                </table>
            
            	
            	<div class="button">
            	    <button type="submit" name= "operation" value="Add">Add</button>
            		<button type="submit" name= "operation" value="Update">Update</button>
               		<button type="submit" name= "operation" value="Delete">Delete</button>
               	</div>  
               	
               	<div class = "column3">    	
        	
        	<div class="button-search">
        	
        		<button type="submit" name="operation" value="List">List Of Machines</button>
        	</div>
        
        </div> 	
     </div>
     </div>
</form>

	


<?php
require_once 'C:\xampp\htdocs\QualityControl\models\dbconfig.php';
use \class\MachineClass;
require 'C:\xampp\htdocs\QualityControl\class\OrderServiceClass.php';
 

 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    try {
        $connection = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
       
        
        
        if(isset($_POST["operation"]))
        {            
            $operation = $_POST["operation"];
           
            switch($operation)
            {
                case "Add":
                    
                    //$OrderService_Id = $_POST["OrderService_Id"]; //variable = $post [name of the input]
                    $Machine_code = $_POST["Machine_code"];
                    $Model = $_POST["Model"];
                    $MachineLine = $_POST["MachineLine"];
                    $Machine1 = new MachineClass($Machine_code, $Model, $MachineLine);
                    $isAdded = $Machine1->create($connection);
                    
                    if ($isAdded == true) {
                   
                        echo "New machine " . $Machine1->getMachineCode() . "has been added succesfully <br/>";
                    }
                    break;
                    
                case "Update":
                    
                    $Machine_code = $_POST["Machine_code"];
                    $Model = $_POST["Model"];
                    $MachineLine = $_POST["MachineLine"];
                    $machine2 = new MachineClass();
                    $machine2->setMachineCode($Machine_code);
                    
                    //--ComponenteSerie_Id---//
                    
                    $machine2->setMachineLine($MachineLine);
                    //llamanos al metodo update de la clase OrderServiceClass
                    $result = $MachineLine->update("c", $connection);
                    if($result == true) {
                        echo "Machine Line updated <br/>";
                    }
             
                    $machine2->setModel($Model);
                    $result = $OS1->update("s", $connection);
                    if ($result == true) {
                        echo "Model updated <br/>";
                    }                                       
       
                    break;
                    
                case "Delete":
                    
                    $Machine3 = new MachineClass();
                    $result = $Machine3->de($connection);
                    $Machine3->displayOrderService($result);
                    break;
                    
                case "List":
                    
                    $OS2 = new MachineClass();
                    $result = $OS2->getAllMachines($connection);
                    $OS2->displayMachine($result);
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
</body>
</html>     