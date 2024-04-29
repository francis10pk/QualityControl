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

.button button, .button-search button, .button-searchBy button {
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

.button-search, .button-searchBy {
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

<form action="NewRegisterMovement.php" method="post">
<div class ="container">
<div class = "column1">
<hr>
<div class="section">
<a href="MainPanel.php">Go Main Panel</a>
</div>
<hr>

</div>
    <div class = "column2">
        <h1>Register Movements Form</h1>
            <table border='1'>	
                <tr>
                    <th>Movimiento Id</th> 				
                    <td><input type="text" name= "Mov_Id" id="Mov_Id" /></td>
                </tr>
                <tr>
                    <th>Order Service Id</th>				
                    <td><input type="text" name= "OrderService_Id"  id="OrderService_Id"/></tr>
                <tr>
                <tr>
                    <th>Process Id</th>				
                    <td><input type="text" name= "Process_Id"  id="Process_Id"/></tr>
                <tr>
                    <th>Employee Id</th>		
                    <td><input type="text" name= "Employee_Id" id="Employee_Id" /></td>
                </tr>
                <tr>
                    <th>Date Register</th>
                    <td><input type="text" name= "DateRegister" id="DateRegister" value="<?php echo date('Y-m-d'); ?>"/></td> 
                </tr>
                <tr>
                    <th>Description</th>
                    <td><input type="text" name= "Description" id="Description" /></td>
                </tr>
                <tr>
                    <th>Upload Document</th>
                    <td><input type="text" name= "Upload_Document" id="Upload_Document" /></td>
                </tr>                
                
            </table>        
        	
        	<div class="button">
        		<button type="submit" name= "operation" value="Submit">Submit</button>	
           		<button type="submit" name= "operation" value="Update">Update</button>
           		
    </div>   	
    <div class = "column3">    	
    	
    	<div class="button-search">    		
    	
    		<button type="submit" name="operation" value="Search">List Of Order Service</button>
    	</div>
    
    	<div class="button-searchBy">   		
    	
    		<button type="submit" name="operation" value="SearchByID">Search Order by OS</button>
    	</div>
    		<hr>
    </div>
</div>	
</div>
</form>
<?php
require_once 'C:\xampp\htdocs\QualityControl\models\dbconfig.php';
use \class\RegistersMovementsClass;
require 'C:\xampp\htdocs\QualityControl\cls\RegistersMovementsClass.php';

/*
 spl_autoload_register(function ($class) {
 if (file_exists(str_replace('\\', '/', $class) . '.php')) {
 require_once str_replace('\\', '/', $class) . '.php';
 }
 });
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    try {
        $connection = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
       
        if(isset($_POST["operation"]))
        {            
            $operation = $_POST["operation"];
           
            switch($operation)
            {
                case "Submit":
                    
                    //$Mov_Id = $_POST["Mov_Id"];
                    $OrderService_Id = $_POST["OrderService_Id"];
                    $Process_Id = $_POST["Process_Id"];
                    $Employee_Id = $_POST["Employee_Id"];                    
                    $DateRegister = $_POST["DateRegister"];   
                    $Description = $_POST["Description"];
                    $Upload_Document = $_POST["Upload_Document"];
                    
                    $RM1 = new RegistersMovementsClass($OrderService_Id,$Process_Id, $Employee_Id, $DateRegister, $Description, $Upload_Document);
                    $isInserted = $RM1->create($connection);
                    if ($isInserted == true) {
                        echo "Register Movement inserted successfully";
                    }
                    break;                    
                                       
                case "Update":
                    
                    $Mov_Id = $_POST["Mov_Id"];
                    $OrderService_Id = $_POST["OrderService_Id"];
                    $Process_Id = $_POST["Process_Id"];
                    $Employee_Id = $_POST["Employee_Id"];
                    $Description = $_POST["Description"];
                    $Upload_Document = $_POST["Upload_Document"];
                    //$DateRegister = $_POST["DateRegister"];
                        
                    $RM1 = new RegistersMovementsClass();
                    $RM1->setMov_Id($Mov_Id);
                    
                    //--OrderService_Id--//
                    $RM1->setOrderService_Id($OrderService_Id);
                    $result = $RM1->update("o", $connection);
                    if ($result == true) {
                        echo "Order Service updated";                        
                    }
                    
                    //--Process_Id--//
                    $RM1->setProcess_Id($Process_Id);
                    $result = $RM1->update("p", $connection);
                    if ($result == true) {
                        echo "Process updated";
                    }
                    //--Employee_Id--//
                    $RM1->setEmployee_Id($Employee_Id);
                    $result = $RM1->update("e", $connection);
                    if ($result == true) {
                        echo "Employee updated";
                    }
                    
                    //--Description--//
                    $RM1->setDescription($Description);
                    $result = $RM1->update("d", $connection);
                    if ($result == true) {
                        echo "Description updated";
                    }
                    
                    //--Upload Document--//
                    $RM1->setUpload_Document($Upload_Document);
                    $result = $RM1->update("u", $connection);
                    if ($result == true) {
                        echo " Document updated <br/>";
                    }
                    break;                    
                    
                case "Search":
                    
                    $RM2 = new RegistersMovementsClass();
                    $result = $RM2->getAllMovements($connection);
                    $RM2->displayMovements($result);
                    break;
                                      
                    
                case "SearchByOS":                   
                    
                  
                    $OrderService_Id = $_POST["OrderService_Id"];  
                    $OS3 = new RegistersMovementsClass();
                    $OS3->setOrderService_Id($OrderService_Id);
                    $result = $OS3->getOrderServiceById($connection);
                    
                    if(!empty($result))
                    {
                        RegistersMovementsClass::displayOrderService($result);
                    }
                    else
                        echo "The Order Service number:".$OS3->getOrderService_Id()." doesn't exist<br/>";
                    
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
