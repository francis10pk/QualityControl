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

.button-searchById {
	margen-button: 10px;
}
</style>
</head>
<body>

<form action="NewBudgetForm.php" method="post">
<div class ="container">
<div class = "column1">

   	<hr>
    <div class="section">
    <a href="MainPanel.php">Go Main Panel</a>
    </div>
    <hr>


</div>
<div class = "column2">
        <h1>Budget Repair Form</h1>
            <table border='1'>	
                <tr>
                    <th>Budget Id</th> 				
                    <td><input type="text" name= "Budget_Id" id="Budget_Id" /></td>
                </tr>
                <tr>
                    <th>Budget Date</th>				
                    <td><input type="text" name= "BudgetDate"  id="BudgetDate" /></td>
                </tr>
                <tr>
                    <th>Price</th>		
                    <td><input type="text" name= "Price" id="Price" /></td>
                </tr>
                <tr>
                    <th>Order Service</th>
                    <td><input type="text" name= "OrderService_Id" id="OrderService_Id" /></td>
					
                </tr>               
                <tr>
                    <th>Delivery Term</th>
                    <td><input type="text" name= "DeliveryTerm" id="DeliveryTerm" /></td>
                </tr>
                <tr>
                    <th>Employee ID</th>
                    <td><input type="text" name= "Employee_Id" id="Employee_Id" /></td>
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
    	
    		<button type="submit" name="operation" value="SearchAll">List of Budget</button>
    	</div>
    
    	<div class="button-searchById">   		
    	
    		<button type="submit" name="operation" value="SearchClient">Search Budget ID</button>
    	</div>
    		<hr>
    </div>
</div>	
</div>
</form>
<?php
require_once '../models/dbconfig.php';
use \class\BudgetRepairClass;
require 'C:\xampp\htdocs\QualityControl\class\BudgetRepairClass.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    try{
        $connection = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
    
        if(isset($_POST["operation"])) 
        {
            $operation = $_POST["operation"];
            
            switch ($operation)
            {
                case "Submit":
                    
                    //$Budget_Id = $_POST["Budget_Id"];
                    $BudgetDate = $_POST["BudgetDate"];
                    $Price = $_POST["Price"];
                    $OrderService_Id = $_POST["OrderService_Id"];                    
                    $DeliveryTerm = $_POST["DeliveryTerm"];
                    $Employee_Id = $_POST["Employee_Id"];
                    $DateRegister = $_POST["DateRegister"];
                  
                                       
                   $budget1 = new BudgetRepairClass($BudgetDate, $Price, $OrderService_Id, $DeliveryTerm, $Employee_Id, $DateRegister);
                   
                   $isInserted = $budget1->create($connection);
                   if ($isInserted == true)
                   {
                        echo "Budget inserted successfully";
                   }                   
                   break;
                   
                case "Update":
                    
                    $Budget_Id = $_POST["Budget_Id"];
                    $BudgetDate = $_POST["BudgetDate"];
                    $Price = $_POST["Price"];
                    $OrderService_Id = $_POST["OrderService_Id"];                   
                    $DeliveryTerm = $_POST["DeliveryTerm"];
                    $Employee_Id = $_POST["Employee_Id"];
                    //$DateRegister = $_POST["DateRegister"];
                    
                    
                    $B1 = new BudgetRepairClass();
                    $B1->setBudget_Id($Budget_Id);
                    
                    //---budgetdate --//
                    $B1->setBudgetDate($BudgetDate);
                    $result = $B1->update("d", $connection);
                    if ($result == true) {
                        echo "Budget date updated successfully";
                    }
                    
                    //---price --//
                    $B1->setPrice($Price);
                    $result = $B1->update("p", $connection);
                    if ($result == true) {
                        echo "Price updated successfully";
                    }
                    
                    //---OrderService_Id --//
                    $B1->setOrderService_Id($OrderService_Id);
                    $result = $B1->update("o", $connection);
                    if ($result == true) {
                        echo "Order Service Id updated successfully";
                    }
                    
                    //---DeliveryTerm --//
                    $B1->setDeliveryTerm($DeliveryTerm);
                    $result = $B1->update("t", $connection);
                    if ($result == true) {
                        echo "Delivery Term updated successfully";
                    }
                    //---Employee_Id --//
                    $B1->setEmployee_Id($Employee_Id);
                    $result = $B1->update("e", $connection);
                    if ($result == true) {
                        echo "Employee Id updated successfully";
                    }
                    break;
                    
                case "SearchAll":
                    $B2 = new BudgetRepairClass();
                    $result = $B2->getAllBudgetRepair($connection);
                    $B2->displayBudgetRepair($result);
                    break;
                case "SearchClient":
                    $B3 = new BudgetRepairClass();
                    break;   
                default:
                    break;                                      
                   
            }
            
       }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();    
    
    }
    
}
/*
function listOS() {
    // Realiza la conexión a la base de datos (asegúrate de configurar los detalles de conexión correctamente)
    $connection = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
    
    // Prepara la consulta SQL para obtener las órdenes de servicio
    $consulta = $connection->prepare("SELECT OrderService_Id FROM order_service");
    
    // Ejecuta la consulta
    $consulta->execute();
    
    // Obtiene todas las filas de resultados
    $OrderService = $consulta->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($OrderService as $os) {
        echo "<option value='" . $os['OrderService_Id'] . "'</option>";
    }
    
    // Devuelve el resultado
    return $os;
}

*/

?>
</body>
</html>










