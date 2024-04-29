<?php

require_once 'C:\xampp\htdocs\QualityControl\models\dbconfig.php';


class NewRequestClass
{
        private $Request_Id;
        private $Client_Id;
        private $Select_Part;
        private $Description;
        private $Quantity;
        private $Client_Product;
        
        
    
        public function __construct($Request_Id, $Client_Id, $Select_Part, $Description,
            $Quantity, $Client_Product)
        {
            $this->Request_Id = $Request_Id;
            $this->Client_Id = $Client_Id;
            $this->Select_Part = $Select_Part;
            $this->Description = $Description;
            $this->Quantity = $Quantity;
            $this->Client_Product = $Client_Product;
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
        public function getSelect_Part()
        {
            return $this->Select_Part;
        }
        
        /**
         * @return mixed
         */
        public function getDescription()
        {
            return $this->Description;
        }
        
        /**
         * @return mixed
         */
        public function getQuantity()
        {
            return $this->Quantity;
        }
        
        /**
         * @return mixed
         */
        public function getClient_Product()
        {
            return $this->Client_Product;
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
         * @param mixed $Select_Part
         */
        public function setSelect_Part($Select_Part)
        {
            $this->Select_Part = $Select_Part;
        }
        
        /**
         * @param mixed $Description
         */
        public function setDescription($Description)
        {
            $this->Description = $Description;
        }
        
        /**
         * @param mixed $Quantity
         */
        public function setQuantity($Quantity)
        {
            $this->Quantity = $Quantity;
        }
        
        /**
         * @param mixed $Client_Product
         */
        public function setClient_Product($Client_Product)
        {
            $this->Client_Product = $Client_Product;
        }
        
        function listAllRequest()
        {
            global $connection;
            $sqlStmt = "SELECT * FROM New_Request";
            $queryId = mysqli_query($connection, $sqlStmt);
            $count = mysqli_num_rows($queryId);
            $index = 0;
            if ($count > 0) {
                echo "<table border='1' class=\"table\">";
                echo "<tr><th>Request Id</th><th>Client ID</th><th>Select Part</th><th>Description</th><th>Quantity</th><th>Client Product</th></tr>";
                while ($rec = mysqli_fetch_assoc($queryId)) {
                    $request_Id = $rec["id"];
                    $client_Id = $rec["customer_name"];
                    $select_Part = $rec["select_part"];
                    $description = $rec["description"];
                    $quantity = $rec["quantity"];
                    $client_Product = $rec["customer_product"];
                    
                    $className = fmod($index, 2) == 0 ? "odd" : "";
                    echo "<tr class=\"$className\"><td>$request_Id</td><td>$client_Id</td><td>$select_Part</td><td>$description</td><td>$quantity</td><td>$client_Product</td></tr>";
                    $index = $index + 1;
                }
                echo "</table>";
            } else {
                echo "No requests found<br/>";
            }
            mysqli_close($connection);
        }
        
        
//      function listAllRequest()
// {
//          global $connection;
//              $sqlStmt = "SELECT client_requests.*,clients.ClientName,status.State FROM client_requests
//  INNER JOIN clients on client_requests.Client_Id = clients.Client_Id
//  INNER JOIN status on client_requests.Status_Id = status.Status_Id;";
//              $queryId = mysqli_query($connection, $sqlStmt);
//              $count = mysqli_num_rows($queryId);
//              $index=0;
//              if ($count > 0) {
//                  echo "<table border='1' class=\"table\">";
//                  echo "<tr><th>Request Id</th><th>Client ID</th><th>Service Level</th><th>Status Id</th><th>Client Product</th></tr>";
//                  while ($rec = mysqli_fetch_assoc($queryId)) {
//                      $request_Id = $rec["Request_Id"];
//                      $client_Id = $rec["Client_Id"];
//                      $client_name = $rec["ClientName"];
//                      $service_Level = $rec["Service_Level"];
//                      $status_Id = $rec["State"];
//                      $client_Product = $rec["Client_Product"];
//                      $className=fmod($index,2)==0?"odd":"";
//                      echo "<tr class=\"$className\"><td style=\"width:10%;\">$request_Id</td><td style=\"width:30%;\">$client_name</td><td style=\"width:10%;\">$service_Level</td><td style=\"width:10%;\">$status_Id</td><td style=\"width:40%;\">$client_Product</td></tr>";
//                      $index=$index+1;
//                  }
//                echo "</table>";
//              } else {
//                  echo "No Request found<br/>";
//              }
//            mysqli_close($connection);
     
//     }
}
    