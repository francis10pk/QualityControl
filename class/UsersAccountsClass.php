<?php
namespace class;
class UsersAccountsClass
{
    private $User_Id;
    private $Client_Id;
    private $Employee_Id;
    private $UserName;
    private $Password;
    private $Status_Id;
    private $DataRegister;
    public function __construct(
        //$User_Id ,
        $Client_Id = null,
        $Employee_Id = null,
        $UserName,
        $Password,
        $Status_Id,
        $DataRegister
        ) {
            //$this->User_Id = $User_Id;
            $this->Client_Id = $Client_Id;
            $this->Employee_Id = $Employee_Id;
            $this->UserName = $UserName;
            $this->Password = $Password;
            $this->Status_Id = $Status_Id;
            $this->DataRegister = $DataRegister;
    }
    /**
     * @return mixed
     */
    public function getUser_Id()
    {
        return $this->User_Id;
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
    public function getEmployee_Id()
    {
        return $this->Employee_Id;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->UserName;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->Password;
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
    public function getDataRegister()
    {
        return $this->DataRegister;
    }

    /**
     * @param mixed $User_Id
     */
    public function setUser_Id($User_Id)
    {
        $this->User_Id = $User_Id;
    }

    /**
     * @param mixed $Client_Id
     */
    public function setClient_Id($Client_Id)
    {
        $this->Client_Id = $Client_Id;
    }

    /**
     * @param mixed $Employee_Id
     */
    public function setEmployee_Id($Employee_Id)
    {
        $this->Employee_Id = $Employee_Id;
    }

    /**
     * @param mixed $UserName
     */
    public function setUserName($UserName)
    {
        $this->UserName = $UserName;
    }

    /**
     * @param mixed $Password
     */
    public function setPassword($Password)
    {
        $this->Password = $Password;
    }

    /**
     * @param mixed $Status_Id
     */
    public function setStatus_Id($Status_Id)
    {
        $this->Status_Id = $Status_Id;
    }

    /**
     * @param mixed $DataRegister
     */
    public function setDataRegister($DataRegister)
    {
        $this->DataRegister = $DataRegister;
    }
    public function __call($method, $args) {
        if ($method == "create") 
        {
            
            $username = $this->UserName;
            $password = $this->Password;
            $status_id = $this->Status_Id;
            $data_register = $this->DataRegister;
            
            $opType = $args[0];
            $connection = $args[1];
            
            if ($opType == "c") {
                $client_id = $this->Client_Id;
                // Construct SQL statement to update phone
                $sqlStmt = "INSERT INTO users_account (Client_ID, UserName, Password, Status_Id, DataRegister)
          VALUES ('$client_id', '$username', '$password', '$status_id', '$data_register')";
                
                $result = $connection->exec($sqlStmt);
                return $result;
            } elseif ($opType == "e") {
                $employee_id = $this->Employee_Id;
                // Construct SQL statement to update email
                $sqlStmt = "INSERT INTO users_account (Employee_Id, UserName, Password, Status_Id, DataRegister)
          VALUES ('$employee_id', '$username', '$password', '$status_id', '$data_register')";
                
                $result = $connection->exec($sqlStmt);
                return $result;
            }
            
        }
        elseif ($method == "update") 
        {
            
        }
    }
    /*
    public function create($connection) {
        $client_id = $this->Client_Id;
        $employee_id = $this->Employee_Id;
        $username = $this->UserName;
        $password = $this->Password;
        $status_id = $this->Status_Id;
        $data_register = $this->DataRegister;
        
        $sqlStmt = "INSERT INTO users_account (Client_Id, Employee_Id, UserName, Password, Status_Id, DataRegister)
          VALUES ('$client_id', '$employee_id', '$username', '$password', '$status_id', '$data_register')";
        
        
        $result = $connection->exec($sqlStmt);
        return $result;
    }
    */
}

