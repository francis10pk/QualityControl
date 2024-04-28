<?php
namespace class;


class ClientClass
{
    private $client_Id;
    private $clientCode;
    private $clientName;
    private $status_Id;
    private $address;
    private $email;
    private $phoneNumber;
    private $dateRegister;
    
    
    public function __construct(
        $client_Id = null,
        $clientCode = null,
        $clientName = null,        
        $status_Id = null,
        $address = null, 
        $email = null,
        $phoneNumber = null,
        $dateRegister = NULL
        ){
    
        $this ->client_Id = $client_Id;
        $this ->clientCode = $clientCode;
        $this ->clientName = $clientName;
        $this ->status_Id= $status_Id;
        $this ->email = $email;
        $this ->phoneNumber = $phoneNumber;
        $this ->dateRegister = $dateRegister;
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
    public function getClientCode()
    {
        return $this->clientCode;
    }

    /**
     * @return mixed
     */
    public function getClientName()
    {
        return $this->clientName;
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
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @return mixed
     */
    public function getDateRegister()
    {
        return $this->dateRegister;
    }

    /**
     * @param mixed $Client_Id
     */
    public function setClient_Id($client_Id)
    {
        $this->client_Id = $client_Id;
    }

    /**
     * @param mixed $ClientCode
     */
    public function setClientCode($clientCode)
    {
        $this->clientCode = $clientCode;
    }

    /**
     * @param mixed $ClientName
     */
    public function setClientName($clientName)
    {
        $this->clientName = $clientName;
    }

    /**
     * @param mixed $Status_Id
     */
    public function setStatus_Id($status_Id)
    {
        $this->status_Id = $status_Id;
    }

    /**
     * @param mixed $Address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @param mixed $Email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $PhoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
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
                    <th>Client_Id</th>
                    <th>ClientCode</th>
                    <th>ClientName</th>
                    <th>Status_Id</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>PhoneNumber</th>
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
                    <td>$this->client_Id</td>
                    <td>$this->clientCode</td>
                    <td>$this->clientName</td>
                    <td>$this->status_Id</td>
                    <td>$this->address</td>
                    <td>$this->email</td>
                    <td>$this->phoneNumber</td>
                    <td>$this->dateRegister</td>
                </tr>";
        return $str;
    }
    
    public function create($connection)
    {
        $client_Id = $this->client_Id;
        $clientCode = $this->clientCode;
        $clientName = $this->clientName;
        $status_Id = $this->status_Id;
        $address = $this->address;
        $email = $this->email;
        $phoneNumber = $this->phoneNumber;
        $dateRegister = $this->dateRegister;
        
        $sqlStmt = "INSERT INTO clients (Client_Id, ClientCode, ClientName, Status_Id, Address, Email, PhoneNumber, DateRegister)
                    VALUES ('$client_Id', '$clientCode', '$clientName', '$status_Id', '$address', '$email', '$phoneNumber', '$dateRegister')";
        $result = $connection->exec($sqlStmt);
        return $result;    
    }
    
    public function __call($method, $args)
    {
        $result = null;
        
        if($method == "update") 
        {   
            $client_Id = $this->client_Id;
            $opType = $args[0];
            $connection = $args[1];
            
            if($opType == "c") 
            {
                $clientCode = $this->clientCode;
                $sqlStmt = "UPDATE clients SET clientCode = '$clientCode' WHERE client_Id = '$client_Id'";
                $result = $connection->exec($sqlStmt);
            }
            elseif ($opType == "n") {
                $clientName = $this->clientName;
                $sqlStmt = "UPDATE clients SET clientName = '$clientName' WHERE client_Id = '$client_Id'";
                $result = $connection->exec($sqlStmt);
            }
            elseif ($opType == "s") {
                $status_Id = $this->status_Id;
                $sqlStmt = "UPDATE clients SET status_Id = '$status_Id' WHERE client_Id = '$client_Id'";
                $result = $connection->exec($sqlStmt);
            }
            elseif ($opType == "a") {
                $address = $this->address;
                $sqlStmt = "UPDATE clients SET address = '$address' WHERE client_Id = '$client_Id'";
                $result = $connection->exec($sqlStmt);
            }
            elseif ($opType == "e") {
                $email = $this->email;
                $sqlStmt = "UPDATE clients SET email = '$email' WHERE client_Id = '$client_Id'";
                $result = $connection->exec($sqlStmt);
            }
            else 
            {
                $phoneNumber = $this->phoneNumber;
                $sqlStmt = "UPDATE clients SET phoneNumber = '$phoneNumber' WHERE client_Id = '$client_Id'";
                $result = $connection->exec($sqlStmt);
            }
            
        }
        return $result;
    }
      
    public function getAllClients($connection)
    {
        $count=0;
        $sqlStmt = "SELECT * FROM clients";
        $listRec = $connection->query($sqlStmt);
        
        foreach ($listRec as $oneRec)
        {
            $client = new ClientClass();
            $client->client_Id = $oneRec["Client_Id"];
            $client->clientCode = $oneRec["ClientCode"];
            $client->clientName = $oneRec["ClientName"];
            $client->status_Id = $oneRec["Status_Id"];
            $client->address = $oneRec["Address"];
            $client->email = $oneRec["Email"];
            $client->phoneNumber = $oneRec["PhoneNumber"];
            $client->dateRegister = $oneRec["DateRegister"];
            
            $listOfClients[$count++] = $client;           
            
        }
        return serialize($listOfClients);
    }
    
    public static function displayClients($result)
    {
        $listOfClients = unserialize($result);
        
        echo ClientClass::getHeader();
        foreach ($listOfClients as $client) 
            echo $client;        
            echo ClientClass::getFooter();
    }
    public function getClientById($connection)
    {
        $client_Id = $this->client_Id;
        $sqlStmt = "SELECT * FROM clients WHERE client_Id = '$client_Id'";
        $query = $connection->query($sqlStmt);
        $oneRec = $query->fetch();
        $client = new ClientClass();
        $client->client_Id = $oneRec["Client_Id"];
        $client->clientCode = $oneRec["ClientCode"];
        $client->clientName = $oneRec["ClientName"];
        $client->status_Id = $oneRec["Status_Id"];
        $client->address = $oneRec["Address"];
        $client->email = $oneRec["Email"];
        $client->phoneNumber = $oneRec["PhoneNumber"];
        $client->dateRegister = $oneRec["DateRegister"];

        return serialize($client);
    }
  
    

 
    
    
}