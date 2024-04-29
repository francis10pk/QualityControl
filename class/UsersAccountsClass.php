<?php
namespace class;
use Exception;
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
        $UserName = null ,
        $Password = null,
        $Status_Id = null,
        $DataRegister = null
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
            if (count($args) < 2) {
                throw new Exception("Insufficient arguments for create operation");
            }
            $opType = $args[0];
            $connection = $args[1];

            if (!in_array($opType, ["c", "e"])) {
                throw new Exception("Invalid operation type");
            }
            $username = $this->UserName;
            $password = $this->Password;
            $status_id = $this->Status_Id;
            $data_register = $this->DataRegister;
            
            
            
            if ($opType == "c") {
                $client_id = $this->Client_Id;
                // Construct SQL statement to update phone
                $sqlStmt = "INSERT INTO users_account (Client_ID, UserName, Password, Status_Id, DataRegister)
                VALUES ('$client_id', '$username', '$password', '$status_id', '$data_register')";

            } elseif ($opType == "e") {
                $employee_id = $this->Employee_Id;
                $sqlStmt = "INSERT INTO users_account (Employee_Id, UserName, Password, Status_Id, DataRegister)
                VALUES ('$employee_id', '$username', '$password', '$status_id', '$data_register')";
                
            }
            try{
                $result = $connection->exec($sqlStmt);
                return $result;
            }catch (\PDOException $e) {
                if ($e->getCode() == '23000') {
                    if(isset($_SERVER['HTTP_REFERER'])) {
                        echo '<form style="text-align: center; margin-top: 20px;" action="' . $_SERVER['HTTP_REFERER'] . '" method="get">';
                        echo '<input type="submit" style="padding: 10px 20px; font-size: 16px;" value="Go Back">';
                        echo '</form>';
                    } else {
                        echo '<p>Unable to determine previous page.</p>';
                    }
                    throw new Exception("Unique constraint violation: " . $e->getMessage());
                } else {

                    throw $e;
                }
            }
            
        }
        elseif ($method == "update") 
        {
            $userID = $this->User_Id;
            $username = $this->UserName;
            $password = $this->Password;
            $status_id = $this->Status_Id;
            $data_register = $this->DataRegister;
            $connection = $args[0];
            $sqlStmt = "UPDATE users_account SET
                    UserName = '$username',
                    Password = '$password',
                    Status_Id = '$status_id',
                    DataRegister = '$data_register'
                    WHERE User_Id = '$userID'";
            $result = $connection->exec($sqlStmt);
            return $result;
        }
        elseif ($method == "delete"){
            $userID = $this->User_Id;
            $connection = $args[0]; 
            
            $sqlStmt = "DELETE FROM users_account WHERE User_Id = '$userID'";
            $result = $connection->exec($sqlStmt);
            return $result;
        }
    }
    public function getClientbyUsername($connection){
        $username = $this->UserName;
        
        $sqlStmt = "SELECT User_Id FROM users_account WHERE UserName = '$username'";
        $prepStmt = $connection->prepare($sqlStmt);
        $prepStmt->execute();
        $result = $prepStmt->fetch();
        if (sizeof($result) > 0) {
            $c = new UsersAccountsClass();
            $c->setUser_Id($result['User_Id']);
        }
        return $c;
    } 
    
}

