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
        <h1>Components Maintenance Form</h1>
            <table border='1'>	
                <tr>
                    <th>Serial Id</th> 				
                    <td><input type="text" name= "Serie_Id" id="Serie_Id" /></td>
                </tr>
                <tr>
                    <th>Component Code</th>				
                    <td><input type="text" name= "Component_code"  id="Component_code" /></td>
                </tr>
                <tr>
                    <th>Component Name</th>		
                    <td><input type="text" name= "ComponenteName" id="ComponenteName" /></td>
                </tr>
            </table>
        
        	
        	<div class="button">
        	    <button type="submit" name= "operation" value="Add">Add</button>
        		<button type="submit" name= "operation" value="Update">Update</button>
           		<button type="submit" name= "operation" value="Delete">Delete</button>
           	</div>  
           	
           	<div class = "column3">    	
    	
    	<div class="button-search">
    	
    		<button type="submit" name="operation" value="List">List Of Components</button>
    	</div>
    
    </div> 	
    </form>
<?php
//require_once 'C:\xampp\htdocs\QualityControl\Model\dbconfig.php';
use cls\ComponentClass;
//require 'C:\xampp\htdocs\QualityControl\cls\Com.php';
 
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
                case "Add":
                    
                    //$OrderService_Id = $_POST["OrderService_Id"]; //variable = $post [name of the input]
                    $Serie_Id = $_POST["Serie_Id"];
                    $Component_code = $_POST["Component_code"];
                    $ComponenteName = $_POST["ComponenteName"];
                    $component1 = new ComponentClass($Serie_Id, $Component_code, $ComponenteName);
                    $isAdded = $component1->create($connection);
                    if ($isAdded == true) {
                   
                        echo "New component " . $component1->getSerie_id() . "has been added succesfully <br/>";
                    }
                    break;
                    
                case "Update":
                    
                    $Serie_Id = $_POST["Serie_Id"];
                    $Component_code = $_POST["Component_code"];
                    $ComponenteName = $_POST["ComponenteName"];
                    $component2 = new ComponentClass();
                    $component2->setComponent_code($Component_code);
                    
                    //--ComponenteSerie_Id---//
                    
                    $component2->setSerie_id($Serie_Id);
                    //llamanos al metodo update de la clase OrderServiceClass
                    $result = $component2->update("c", $connection);
                    if($result == true) {
                        echo "Component code updated <br/>";
                    }
             
                    $component2->setComponentName($ComponenteName);
                    $result = $component2->update("s", $connection);
                    if ($result == true) {
                        echo "Component name updated <br/>";
                    }                                       
       
                    break;
                    
                case "Delete":
                    
                    $component3 = new ComponentClass();
                    $result = $component3->delete($connection);
                    $component3->displayComponent($result);
                    break;
                    
                case "List":
                    
                    $component3 = new ComponentClass();
                    $result = $component3->getAllComponents($connection);
                    $component3->displayComponents($result);
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