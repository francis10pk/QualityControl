<?php

namespace class;


use PDO;
use PDOException;

class RegistersMovementsClass
{
    private $mov_Id;  // autoincrement
    private $orderService_Id;
    private $process_Id;
    private $employee_Id;
    private $dateRegister;
    private $description;
    private $upload_Document;
    
    public  function __construct
    (
        //$Mov_Id,
        $orderService_Id = NULL,
        $process_Id = null,
        $employee_Id = null,
        $dateRegister = null,
        $description = null,
        $upload_Document = null
    )
    {
        //$this->Mov_Id=$Mov_Id;
        $this->orderService_Id=$orderService_Id;
        $this->process_Id=$process_Id;
        $this->employee_Id=$employee_Id;
        $this->dateRegister=$dateRegister;
        $this->description=$description;
        $this->upload_Document=$upload_Document;
    }
    
    
    /**
     * @return mixed
     */
    public function getMov_Id()
    {
        return $this->mov_Id;
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
    public function getProcess_Id()
    {
        return $this->process_Id;
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
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * @return mixed
     */
    public function getUpload_Document()
    {
        return $this->upload_Document;
    }
    
    /**
     * @param mixed $Mov_Id
     */
    public function setMov_Id($mov_Id)
    {
        $this->mov_Id = $mov_Id;
    }
    
    /**
     * @param mixed $OrderService_Id
     */
    public function setOrderService_Id($orderService_Id)
    {
        $this->orderService_Id = $orderService_Id;
    }
    
    /**
     * @param mixed $Process_Id
     */
    public function setProcess_Id($process_Id)
    {
        $this->process_Id = $process_Id;
    }
    
    /**
     * @param mixed $Employee_Id
     */
    public function setEmployee_Id($employee_Id)
    {
        $this->employee_Id = $employee_Id;
    }
    
    /**
     * @param mixed $dateRegister
     */
    public function setDateRegister($dateRegister)
    {
        $this->dateRegister = $dateRegister;
    }
    
    /**
     * @param mixed $Description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    /**
     * @param mixed $UploadReport
     */
    public function setUpload_Document($upload_Document)
    {
        $this->upload_Document = $upload_Document;
    }
    
    public static function getHeader()
    {
        $str = "<div style = 'margin-bottom: 20px'><table border='1'>";
        $str .= "<tr>
                    <th>Mov_Id</th>
                    <th>OrderService_Id</th>
                    <th>Process_Id</th>
                    <th>Employee_Id</th>
                    <th>DateRegister</th>
                    <th>Description</th>
                    <th>Upload_Document</th>
                </tr>";
        return $str;
    }
    
    
    public static function getFooter()
    {
        $str = "</table><div>";
        return $str;
    }
    
    public function __toString()
    {
        $str = "<table border='1'>";
        $str = "<tr>
                    <td>$this->mov_Id</td>
                    <td>$this->orderService_Id</td>
                    <td>$this->process_Id</td>
                    <td>$this->employee_Id</td>
                    <td>$this->dateRegister</td>
                    <td>$this->description</td>
                    <td>$this->upload_Document</td>

                </tr>";
        
        return $str;
    }
    
    public function create($connection)
    {
        $orderService_Id = $this->orderService_Id;
        $process_Id = $this->process_Id;
        $employee_Id = $this->employee_Id;
        $dateRegister = $this->dateRegister;
        $description = $this->description;
        $upload_Document = $this->upload_Document;
        
        $sqlStmt = "INSERT INTO registers_movements (OrderService_Id,Process_Id,Employee_Id,DateRegister,Description,Upload_Document) 
                                             VALUES ('$orderService_Id','$process_Id','$employee_Id','$dateRegister','$description','$upload_Document')";
        $result = $connection->exec($sqlStmt);
        return $result;
    }
      
    public function getAllMovements($connection)
    {
        $count= 0;
        $sqlStmt = "SELECT * FROM registers_movements";
        $listRec = $connection->query($sqlStmt);
        
        foreach ($listRec as $oneRec) {
            
            $movement = new RegistersMovementsClass();
            $movement->setMov_Id($oneRec["Mov_Id"]);
            $movement->setOrderService_Id($oneRec["OrderService_Id"]);
            $movement->setProcess_Id($oneRec["Process_Id"]);
            $movement->setEmployee_Id($oneRec["Employee_Id"]);
            $movement->setDateRegister($oneRec["DateRegister"]);
            $movement->setDescription($oneRec["Description"]);
            $movement->setUpload_Document($oneRec["Upload_Document"]);
            
            $listOfMovement[$count ++] = $movement;
            
        }
        return serialize($listOfMovement);
    }
    
    
    public static function displayMovements($result)
    {
        $listOfMovements = unserialize($result);
        echo RegistersMovementsClass::getHeader();
        foreach ($listOfMovements as $oneMovement)
            echo $oneMovement;
        echo RegistersMovementsClass::getFooter();
    }
    
 
    
    public function searchByOrderServiceId($connection, $orderServiceId)
    {
        try {
            // Preparar la consulta SQL
            $sql = "SELECT * FROM registers_movements WHERE orderService_Id = $orderServiceId";
            $statement = $connection->prepare($sql);
            
            // Ejecutar la consulta
            $statement->execute();
            
            // Obtener y devolver los resultados
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            $orders = [];
            foreach ($results as $result) {
                $mv = new RegistersMovementsClass();
                $mv->mov_Id = ($result['Mov_Id']);
                $mv->orderService_Id = ($result['OrderService_Id']);
                $mv->process_Id = ($result['Process_Id']);
                $mv->employee_Id = ($result['Employee_Id']);
                $mv->dateRegister = ($result['DateRegister']);
                $mv->description = ($result['Description']);
                $mv->Upload_Document = ($result['Upload_Document']);
                $orders[] = $mv;
            }
            return serialize($orders);
        
        } catch (PDOException $error) {
            // Manejar errores
            echo "Error : " . $error->getMessage();
            return false;
        }
    }
    
    
    
    
    
    
    
}
