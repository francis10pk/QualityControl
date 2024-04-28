<?php
namespace class;
use PDO;



class OrderServiceClass
{
    private $orderService_Id;
    private $client_Id;
    private $componentSerie_Id;
    private $status_Id;
    private $billing_Id;
    private $description;
    private $dateRegister;
   
    
    public function __construct(
        //$orderService_Id,
        $client_Id = null,
        $componentSerie_Id = null,        
        $status_Id = null,
        $billing_Id= null, 
        $description=null, 
        $dateRegister = null
        ){   
            //this->OrderService_Id = $OrderService_Id;
            $this ->client_Id = $client_Id;
            $this ->componentSerie_Id = $componentSerie_Id;
            $this ->status_Id = $status_Id;
            $this ->billing_Id = $billing_Id;
            $this ->description = $description;
            $this ->dateRegister = $dateRegister;       
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
    public function getClient_Id()
    {
        return $this->client_Id;
    }

    /**
     * @return mixed
     */
    public function getComponentSerie_Id()
    {
        return $this->componentSerie_Id;
    }

    /**
     * @return mixed
     */
    public function getStatus_Id()
    {
        return $this->status_Id;
    }

    /**
     * @return mixed
     */
    public function getBilling_Id()
    {
        return $this->billing_Id;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getDateRegister()
    {
        return $this->dateRegister;
    }
    
    public function setOrderService_Id($orderService_Id)
    {
        $this->orderService_Id = $orderService_Id;
    }

    /**
     * @param mixed $client_Id
     */
    public function setClient_Id($client_Id)
    {
        $this->client_Id = $client_Id;
    }

    /**
     * @param mixed $ComponentSerie_Id
     */
    public function setComponentSerie_Id($componentSerie_Id)
    {
        $this->componentSerie_Id = $componentSerie_Id;
    }

    /**
     * @param mixed $status_Id
     */
    public function setStatus_Id($status_Id)
    {
        $this->status_Id = $status_Id;
    }

    /**
     * @param mixed $Billing_Id
     */
    public function setBilling_Id($billing_Id)
    {
        $this->billing_Id = $billing_Id;
    }

    /**
     * @param mixed $Description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
        $str="<table border='1'>";
        $str.="<tr>
                    <th>OrderService_Id</th>
                    <th>Client_Id</th>
                    <th>ComponentSerie_Id</th>
                    <th>Status_Id</th>
                    <th>Billing_Id</th>
                    <th>Description</th>
                    <th>DateRegister</th>                  
             </tr>";
        return $str;
    }     
    
    // footer
    public static function getFooter()
    {
        $str = "</table>";
        return $str;
    }
    
    public function __toString()
    {
        $str = "<tr>
                    <td>$this->orderService_Id</td>
                    <td>$this->client_Id</td>
                    <td>$this->componentSerie_Id</td>
                    <td>$this->status_Id</td>
                    <td>$this->billing_Id</td>
                    <td>$this->description</td>
                    <td>$this->dateRegister</td>
                 
                </tr>";
        return $str;
    }
    
    public function create($connection)
    {
        //add new order service
        //$orderService_Id = $this->orderService_Id;  //auotincrement
        $client_Id = $this->client_Id;
        $componentSerie_Id = $this->componentSerie_Id;
        $status_Id = $this->status_Id;
        $billing_Id = $this->billing_Id;
        $description = $this->description;
        $dateRegister = $this->dateRegister;  // default current date
        
        $sqlStmt = "INSERT INTO order_service (Client_Id, ComponenteSerie_Id, Status_Id, Billing_Id, Description, DateRegister)
                    VALUES ('$client_Id', '$componentSerie_Id', '$status_Id', '$billing_Id', '$description', '$dateRegister')";
        $result = $connection->exec($sqlStmt);
        return $result;
    }    
    
    public function __call($method, $args)
    {   
        $result = null;
        
        if ($method == "update")
        {           
            $orderService_Id = $this->orderService_Id;
            $opType = $args[0];
            $connection = $args[1];
            
            if ($opType == "c")
            {
                $componentSerie_Id=$this->componentSerie_Id;
                $sqlStmt = "UPDATE order_service SET ComponenteSerie_Id = '$componentSerie_Id' WHERE OrderService_Id = '$orderService_Id'";
                $result = $connection->exec($sqlStmt);
            }
            else if ($opType == "s")
            {
                $status_Id = $this->status_Id;
                $sqlStmt = "UPDATE order_service SET Status_Id = '$status_Id' WHERE OrderService_Id = '$orderService_Id'";
                $result = $connection->exec($sqlStmt);
                
            }
            else if($opType == "b")
            {
                $billing_Id = $this->billing_Id;
                $sqlStmt = "UPDATE order_service SET billing_Id = '$billing_Id' WHERE OrderService_Id = '$orderService_Id'";
                $result = $connection->exec($sqlStmt);
            }
            else
            {
                $description = $this->description;
                $sqlStmt = "UPDATE order_service SET Description = '$description' WHERE OrderService_Id = '$orderService_Id'";
                $result = $connection->exec($sqlStmt);
            }
            
        }
        return $result;
        
    }
    
    
    public function getAllOrderService($connection)
    {
        $count=0;
        $sqlStmt = "Select * from order_service";
        $listRec = $connection->query($sqlStmt);
        
        foreach ($listRec as $oneRec)
        {
            $orderService = new OrderServiceClass();
            //Luego, se utilizan los métodos set de esta clase 
            //para establecer los valores de las propiedades de 
            //cada instancia con los valores del registro actual.
            $orderService->setOrderService_Id($oneRec['OrderService_Id']);
            $orderService->setClient_Id($oneRec['Client_Id']);
            $orderService->setComponentSerie_Id($oneRec['ComponenteSerie_Id']);
            $orderService->setStatus_Id($oneRec['Status_Id']);
            $orderService->setBilling_Id($oneRec['Billing_Id']);
            $orderService->setDescription($oneRec['Description']);
            $orderService->setDateRegister($oneRec['DateRegister']);
            
            $listOfOrderService[$count++]=$orderService;
            
        }
        return serialize($listOfOrderService);        
    }
    
    public static function displayOrderService($result)
    {
        $listOrderServices = unserialize($result);
        //display all order service
        echo OrderServiceClass::getHeader();
        foreach ($listOrderServices as $orderService) 
            echo $orderService;
            echo OrderServiceClass::getFooter();      
    }

    public function getOrderServiceById($connection)
    {
        $OrderService_Id = $this->orderService_Id;
        $sqlStmt = "Select * from order_service where OrderService_Id = '$OrderService_Id'";
        $prepStmt = $connection->prepare($sqlStmt);
        $prepStmt->bindParam(":Id", $Id, PDO::PARAM_INT);
        $prepStmt->execute();
        $result = $prepStmt->fetchAll();
        $os="";
        if (sizeof($result) > 0) 
        {   
            $os = new OrderServiceClass();
            $os->getOrderService_Id($result[0]['OrderService_Id']);
            $os->getClient_Id($result[0]['Client_Id']);
            $os->getComponentSerie_Id($result[0]['ComponenteSerie_Id']);
            $os->getStatus_Id($result[0]['Status_Id']);
            $os->getBilling_Id($result[0]['Billing_Id']);
            $os->getDescription($result[0]['Description']);
            $os->getDateRegister($result[0]['DateRegister']);
        }
        return serialize($os);
    }
    
    


}