<?php
namespace class;

use PDO;

class BudgetRepairClass
{
    private $budget_Id;
    private $budgetDate;
    private $price;
    private $orderService_Id;   //composition   
    private $deliveryTerm;
    private $employee_Id;
    private $dateRegister;
    
    
    public function __construct(
        //$budget_Id = null,
        $budgetDate = null, 
        $price = null,
        $orderService_Id = null,     
        $deliveryTerm= null,
        $employee_Id = null,
        $dateRegister = null 
        ){
        //$this ->billing_Id = $budget_Id;
        $this ->budgetDate = $budgetDate;
        $this ->price = $price;
        $this ->orderService_Id = $orderService_Id;       
        $this ->deliveryTerm = $deliveryTerm;
        $this ->employee_Id = $employee_Id;
        $this ->dateRegister = $dateRegister;
    }
    /**
     * @return mixed
     */
    public function getBudget_Id()
    {
        return $this->budget_Id;
    }
    
    /**
     * @return mixed
     */
    public function getBudgetDate()
    {
        return $this->budgetDate;
    }
    
    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }
    
    /**
     * @return mixed
     */
    public function getOrderService_Id()
    {
        return $this->orderService_Id;
    }
    
   
    
    /**
     * @return mixed
     */
    public function getDeliveryTerm()
    {
        return $this->deliveryTerm;
    }
    
    /**
     * @return mixed
     */
    public function getEmployee_Id()
    {
        return $this->employee_Id;
    }
    
    /**
     * @return mixed
     */
    public function getDateRegister()
    {
        return $this->dateRegister;
    }
    
    /**
     * @param mixed $Budget_Id
     */
    public function setBudget_Id($budget_Id)
    {
        $this->budget_Id = $budget_Id;
    }
    
    /**
     * @param mixed $BudgetDate
     */
    public function setBudgetDate($budgetDate)
    {
        $this->budgetDate = $budgetDate;
    }
    
    /**
     * @param mixed $Price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
    
    /**
     * @param mixed $OrderService_Id
     */
    public function setOrderService_Id($orderService_Id)
    {
        $this->orderService_Id = $orderService_Id;
    }
    
        
    /**
     * @param mixed $DeliveryTerm
     */
    public function setDeliveryTerm($deliveryTerm)
    {
        $this->deliveryTerm = $deliveryTerm;
    }
    
    /**
     * @param mixed $Employee_Id
     */
    public function setEmployee_Id($employee_Id)
    {
        $this->employee_Id = $employee_Id;
    }
    
    /**
     * @param mixed $DateRegister
     */
    public function setDateRegister($dateRegister)
    {
        $this->dateRegister = $dateRegister;
    }
    
    public static function getHeader()
    {
        $str = "<table border='1'>";
        $str .= "<tr>
                    <th>Budget_Id</th>
                    <th>BudgetDate</th>
                    <th>Price</th>
                    <th>OrderService_Id</th>                   
                    <th>DeliveryTerm</th>
                    <th>Employee_Id</th>
                    <th>DateRegister</th>
                </tr>";
        return $str;
    }
    
    public static function getFooter()
    {
        $str = "</table>";
        return $str;
    }
    
    public function __toString()
    {
        $str = "<tr>
                    <td>$this->budget_Id</td>
                    <td>$this->budgetDate</td>
                    <td>$this->price</td>
                    <td>$this->orderService_Id</td>               
                    <td>$this->deliveryTerm</td>
                    <td>$this->employee_Id</td>
                    <td>$this->dateRegister</td>                   
                </tr>";
        return $str;
    }
    
    public function create($connection)
    {
        //$budget_Id = $this->budget_Id;  //autoincrement
       $budgetDate = $this->budgetDate;
       $price = $this->price;
       $orderService_Id = $this->orderService_Id;      
       $deliveryTerm = $this->deliveryTerm;
       $employee_Id = $this->employee_Id;
       $dateRegister = $this->dateRegister;
       
       $sqlStmt = "INSERT INTO budget_repair (BudgetDate, Price, OrderService_Id, DeliveryTerm, Employee_Id, DateRegister) VALUES ('$budgetDate', '$price', '$orderService_Id', '$deliveryTerm', '$employee_Id', '$dateRegister')";
       $result = $connection->query($sqlStmt);
       return $result;
    }
    
    public function __call($method, $args)
    {
        $result = null;
        
        if($method == "update") 
        {
            $budget_Id = $this->budget_Id;
            $opType = $args[0];
            $connection = $args[1];
            
            if($opType == "d")
            {
                $budgetDate = $this->budgetDate;
                $sqlStmt = "UPDATE budget_repair SET BudgetDate = '$budgetDate' WHERE Budget_Id = '$budget_Id'";
                $result = $connection->query($sqlStmt);
                
            }
            elseif ($opType == "p") {
                $price = $this->price;
                $sqlStmt = "UPDATE budget_repair SET Price = '$price' WHERE Budget_Id = '$budget_Id'";
                $result = $connection->query($sqlStmt);
            }
            
            elseif ($opType == "o") {
                $orderService_Id = $this->orderService_Id;
                $sqlStmt = "UPDATE budget_repair SET OrderService_Id = '$orderService_Id' WHERE Budget_Id = '$budget_Id'";
                $result = $connection->query($sqlStmt);
            }
            elseif ($opType == "t") {
                $deliveryTerm = $this->deliveryTerm;
                $sqlStmt = "UPDATE budget_repair SET DeliveryTerm = '$deliveryTerm' WHERE Budget_Id = '$budget_Id'";
                $result = $connection->query($sqlStmt);
            }
            else
            {
                $employee_Id = $this->employee_Id;
                $sqlStmt = "UPDATE budget_repair SET Employee_Id = '$employee_Id' WHERE Budget_Id = '$budget_Id'";
                $result = $connection->query($sqlStmt);
            }           
            
        }
        return $result;
    }
    
    public function getAllBudgetRepair($connection)
    {
        $count = 0;
        $sqlStmt = "SELECT * FROM budget_repair";
        $listRec = $connection->query($sqlStmt);
        
        foreach ($listRec as $oneRec)
        {
            
            $budget = new BudgetRepairClass();
            $budget->setBudget_Id($oneRec['Budget_Id']);
            $budget->setBudgetDate($oneRec['BudgetDate']);
            $budget->setPrice($oneRec['Price']);
            $budget->setOrderService_Id($oneRec['OrderService_Id']);            
            $budget->setDeliveryTerm($oneRec['DeliveryTerm']);
            $budget->setEmployee_Id($oneRec['Employee_Id']);
            $budget->setDateRegister($oneRec['DateRegister']);
            $listOfBudget[$count++] = $budget;
          
        }
        return serialize ($listOfBudget);
    }
    
    public static function displayBudgetRepair($result)
    {
       $listOfBudgets = unserialize($result); 
       
       echo BudgetRepairClass::getHeader();
       foreach ($listOfBudgets as $budget) 
            echo $budget;
            echo BudgetRepairClass::getFooter();  
    }
    
    public function getBudgetById($connection)
    {
        $budget_Id = $this->budget_Id;
        $sqlStmt = "SELECT * FROM budget_repair WHERE Budget_Id = '$budget_Id'";
        $prepStmt = $connection->prepare($sqlStmt);
        $prepStmt = bindParam(':Budget_Id', $budget_Id, PDO::PARAM_INT);
        $prepStmt->execute();
        $result = $prepStmt->fetchAll();
        $b = "";
        if (sizeof($result) > 0) {
            $b = new BudgetRepairClass();
            $b->setBudget_Id($result[0]['Budget_Id']);
            $b->setBudgetDate($result[0]['BudgetDate']);
            $b->setPrice($result[0]['Price']);
            $b->setOrderService_Id($result[0]['OrderService_Id']);          
            $b->setDeliveryTerm($result[0]['DeliveryTerm']);
            $b->setEmployee_Id($result[0]['Employee_Id']);
            $b->setDateRegister($result[0]['DateRegister']);
        }
        return serialize($b);
    }      
    
}