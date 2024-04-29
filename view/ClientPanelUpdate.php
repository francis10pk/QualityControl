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

h1 {
	text-align: center;
	background-color: #f2f2f2;
	padding: 20px;
	color: black;
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

<form action="ClientPanelUpdate.php" method="post">
<div class ="container">
<div class = "column1">
<hr>
<div class="section">
<h1> DASHBOARD CLIENT</h1>
</div>
<hr>

</div>
    <div class = "column2">
        <h1>Update Movements Order Service Associated </h1>
            <table border='1'>	
                
                <tr>
                    <th>Order Service Id</th>				
                    <td><input type="text" name= "OrderService_Id"  id="OrderService_Id"/></tr>
                <tr>
                <tr>
                    <th>Process Id</th>				
                    <td>
                    <select name="Process_Id" id="Process_Id">
                        <option value="8">OC aproved</option>                  
                       
        			</select>
        			</td>
                </tr>
                <tr>
                    <th>Client </th>
                    <td>
                    <select name="Employee_Id" id="Employee_Id">
                        <option value="3">Client</option>                
                       
        			</select>
        			</td>
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
                    <td><div><input type="text" name= "Upload_Document" id="Upload_Document" /><input type="file"/></div></td>
                </tr>                
                
            </table>        
        	
        	<div class="button">
        		<button type="submit" name= "operation" value="Submit">Submit</button>	
           		
           		
    </div>   	
    <div class = "column3">    	
    	
    	<div class="button-search">    		
    	
    		<button type="submit" name="operation" value="Search">List Of Order Service</button>
    	</div>
    
    	<div class="button-searchBy">  		
    		
    		<button type="submit" name="operation" value="SearchByID">Search Order by OSID</button>
    	</div>
    		<hr>
    </div>
</div>	
</div>
</form>
<?php
require_once 'C:\xampp\htdocs\QualityControl\models\dbconfig.php';
require 'C:\xampp\htdocs\QualityControl\class\RegistersMovementsClass.php';
use \class\RegistersMovementsClass;


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
                                       
                
                case "Search":
                    
                    $RM2 = new RegistersMovementsClass();
                    $result = $RM2->getAllMovements($connection);
                    $RM2->displayMovements($result);
                    break;
                                      
                    
                case "SearchByID":                   

                    $OrderService_Id = $_POST["OrderService_Id"];  
                    
                    $OS3 = new RegistersMovementsClass();
                    $OS3->setOrderService_Id($OrderService_Id);
                    $result = $OS3->searchByOrderServiceId($connection,$OrderService_Id);
                    if(!empty($result))
                    {
                        RegistersMovementsClass::displayMovements($result);
                    }
                    else
                        echo "<p>The Order Service number: ".$OS3->getOrderService_Id()." doesn't exist</p>";
                    
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
