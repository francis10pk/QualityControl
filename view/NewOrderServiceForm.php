
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
        <h1>Order Service Form</h1>
            <table border='1'>	
                <tr>
                    <th>Order Service Id</th> 				
                    <td><input type="text" name= "OrderService_Id" id="OrderService_Id" /></td>
                </tr>
                <tr>
                    <th>Client Id</th>				
                    <td><input type="text" name= "Client_Id"  id="Client_Id" /></td>
                </tr>
                <tr>
                    <th>Component Serial Id</th>		
                    <td><input type="text" name= "ComponentSerie_Id" id="ComponentSerie_Id" /></td>
                </tr>
                <tr>
                    <th>Status Id</th>
                    <td><input type="text" name= "Status_Id" id="Status_Id" /></td>
                </tr>
                <tr>
                    <th>Billing Id</th>
                    <td><input type="text" name= "Billing_Id" id="Billing_Id" /></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><input type="text" name= "Description" id="Description" /></td>
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
    	
    		<button type="submit" name="operation" value="Search">List Of Order Service</button>
    	</div>
    
    	<div class="button-searchById">   		
    	
    		<button type="submit" name="operation" value="SearchByID">Search Order by ID</button>
    	</div>
    		<hr>
    </div>
</div>	
</div>
</form>
<?php
require_once '../models/dbconfig.php';
use \class\OrderServiceClass;
require 'C:\xampp\htdocs\QualityControl\class\OrderServiceClass.php';

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
                    
                    //$OrderService_Id = $_POST["OrderService_Id"]; //variable = $post [name of the input]
                    $Client_Id = $_POST["Client_Id"];
                    $ComponentSerie_Id = $_POST["ComponentSerie_Id"];
                    $Status_Id = $_POST["Status_Id"];
                    $Billing_Id = $_POST["Billing_Id"];
                    $Description = $_POST["Description"];
                    $DateRegister = $_POST["DateRegister"];
                    
                    
                    $OrderService1 = new OrderServiceClass($Client_Id, $ComponentSerie_Id, $Status_Id, $Billing_Id, $Description, $DateRegister);
                    
                    $isInserted = $OrderService1->create($connection);
                    //si el metodo devuelve true
                    if ($isInserted == true) {
                        // mostramos un mensaje
                        echo "The Service Order" . $OrderService1->getOrderService_Id() . "has been added succesfully <br/>";
                    }
                    break;
                    
                case "Update":
                    
                    $OrderService_Id = $_POST["OrderService_Id"];
                    //$Client_Id = $_POST["Client_Id"];
                    $ComponentSerie_Id = $_POST["ComponentSerie_Id"];
                    $Status_Id = $_POST["Status_Id"];
                    $Billing_Id = $_POST["Billing_Id"];
                    $Description = $_POST["Description"];
                    //$DateRegister = $_POST["DateRegister"];
                    
                    $OS1 = new OrderServiceClass();
                    $OS1->setOrderService_Id($OrderService_Id);

                    //llamanos al metodo update de la clase OrderServiceClass
                    $result = $OS1->update("c", $connection);
                    if($result == true) {
                        echo "Component Serial updated <br/>";
                    }
                    
                    //--status_Id---//
                    
                    $OS1->setStatus_Id($Status_Id);
                    $result = $OS1->update("s", $connection);
                    if ($result == true) {
                        echo "Status updated <br/>";
                    }                                       
                    
                    //--Billin_Id---//
                    
                    $OS1->setBilling_Id($Billing_Id);
                    $result = $OS1->update("b", $connection);
                    if ($result == true) {
                        echo "Billing updated <br/>";
                    }
                    
                    //--Description---//
                    $OS1->setDescription($Description);
                    $result = $OS1->update("d", $connection);
                    if ($result == true) {
                        echo "Description updated <br/>";
                    }     
                    break;
                    
                case "Search":
                    
                    $OS2 = new OrderServiceClass();
                    $result = $OS2->getAllOrderService($connection);
                    $OS2->displayOrderService($result); 
                    break;
                    
                    
                case "SearchByID":
                    
                  
                    $OrderService_Id = $_POST["OrderService_Id"];  
                    $OS3 = new OrderServiceClass();
                    $OS3->setOrderService_Id($OrderService_Id);
                    $result = $OS3->getOrderServiceById($connection);
                    
                    if(!empty($result))
                    {
                        OrderServiceClass::displayOrderService($result);
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