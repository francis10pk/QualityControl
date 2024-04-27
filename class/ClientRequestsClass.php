<?php

require_once '../models/dbconfig.php';

class ClientRequestsClass
{
    private $Request_Id;
    private $Client_Id;
    private $Service_Level;
    private $Status_Id;
    private $Problem_Describtion;
    private $Findings;
    private $Client_Product;
    private $DateRegister;
    
    public function __construct($Request_Id,$Client_Id, $Service_Level,$Status_Id,
        $Problem_Describtion,$Findings,$Client_Product,$DateRegister)
    {
        $this->Request_Id=$Request_Id;
        $this->Client_Id=$Client_Id;
        $this->Service_Level=$Service_Level;
        $this->Status_Id=$Status_Id;
        $this->Problem_Describtion=$Problem_Describtion;
        $this->Status_Id=$Status_Id;
        $this->Problem_Describtion=$Problem_Describtion;
        $this->Findings=$Findings;
        $this->Client_Product=$Client_Product;
        $this->DateRegister=$DateRegister;
    }
    
    /**
     * @return mixed
     */
    public function getRequest_Id()
    {
        return $this->Request_Id;
    }

    /**
     * @return mixed
     */
    public function getClient_Id()
    {
        return $this->Client_Id;
    }

    /**
     * @return mixed
     */
    public function getService_Level()
    {
        return $this->Service_Level;
    }

    /**
     * @return mixed
     */
    public function getStatus_Id()
    {
        return $this->Status_Id;
    }

    /**
     * @return mixed
     */
    public function getProblem_Describtion()
    {
        return $this->Problem_Describtion;
    }

    /**
     * @return mixed
     */
    public function getFindings()
    {
        return $this->Findings;
    }

    /**
     * @return mixed
     */
    public function getClient_Product()
    {
        return $this->Client_Product;
    }

    /**
     * @return mixed
     */
    public function getDateRegister()
    {
        return $this->DateRegister;
    }

    /**
     * @param mixed $Request_Id
     */
    public function setRequest_Id($Request_Id)
    {
        $this->Request_Id = $Request_Id;
    }

    /**
     * @param mixed $Client_Id
     */
    public function setClient_Id($Client_Id)
    {
        $this->Client_Id = $Client_Id;
    }

    /**
     * @param mixed $Service_Level
     */
    public function setService_Level($Service_Level)
    {
        $this->Service_Level = $Service_Level;
    }

    /**
     * @param mixed $Status_Id
     */
    public function setStatus_Id($Status_Id)
    {
        $this->Status_Id = $Status_Id;
    }

    /**
     * @param mixed $Problem_Describtion
     */
    public function setProblem_Describtion($Problem_Describtion)
    {
        $this->Problem_Describtion = $Problem_Describtion;
    }

    /**
     * @param mixed $Findings
     */
    public function setFindings($Findings)
    {
        $this->Findings = $Findings;
    }

    /**
     * @param mixed $Client_Product
     */
    public function setClient_Product($Client_Product)
    {
        $this->Client_Product = $Client_Product;
    }

    /**
     * @param mixed $DateRegister
     */
    public function setDateRegister($DateRegister)
    {
        $this->DateRegister = $DateRegister;
    }

  
    

    
    function listAllRequest()
    {
        global $connection;
        $sqlStmt = "SELECT client_requests.*,clients.ClientName,status.State FROM client_requests
INNER JOIN clients on client_requests.Client_Id = clients.Client_Id
INNER JOIN status on client_requests.Status_Id = status.Status_Id;";
        $queryId = mysqli_query($connection, $sqlStmt);
        $count = mysqli_num_rows($queryId);
        $index=0;
        if ($count > 0) {
            echo "<table border='1' class=\"table\">";
            echo "<tr><th>Request Id</th><th>Client ID</th><th>Service Level</th><th>Status Id</th><th>Client Product</th></tr>";
            while ($rec = mysqli_fetch_assoc($queryId)) {
                $request_Id = $rec["Request_Id"];
                $client_Id = $rec["Client_Id"];
                $client_name = $rec["ClientName"];
                $service_Level = $rec["Service_Level"];
                $status_Id = $rec["State"];
                $client_Product = $rec["Client_Product"];
                $className=fmod($index,2)==0?"odd":"";
                echo "<tr class=\"$className\"><td style=\"width:10%;\">$request_Id</td><td style=\"width:30%;\">$client_name</td><td style=\"width:10%;\">$service_Level</td><td style=\"width:10%;\">$status_Id</td><td style=\"width:40%;\">$client_Product</td></tr>";
                $index=$index+1;
            }
            echo "</table>";
        } else {
            echo "No Request found<br/>";
        }
        mysqli_close($connection);
    }
    
    
    
    
}