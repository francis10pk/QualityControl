<?php
namespace class;

class EmployeeClass
{
    private $employee_Id;
    private $firstName;
    private $lastName;
    private $job_Id;
    private $status_Id;
    private $dateRegister;
    private $address;
    private $email;
    private $phoneNumber;
    
    
    public function __construct
    (
        //$employee_Id = null,
        $firstName = null,
        $lastName = null,
        $job_Id = null,
        $status_Id = null,
        $dateRegister = null,
        $address = null,
        $email = null,
        $phoneNumber = null
        ){
            //$this->employee_Id=$employee_Id;
            $this->firstName=$firstName;
            $this->lastName=$lastName;
            $this->job_Id=$job_Id;
            $this->status_Id=$status_Id;
            $this->dateRegister=$dateRegister;
            $this->address=$address;
            $this->email=$email;
            $this->phoneNumber= $phoneNumber;
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
    public function getFirstName()
    {
        return $this->firstName;
    }
    
    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }
    
    /**
     * @return mixed
     */
    public function getJob_Id()
    {
        return $this->job_Id;
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
    public function getDateRegister()
    {
        return $this->dateRegister;
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
     * @param mixed $Employee_Id
     */
    public function setEmployee_Id($employee_Id)
    {
        $this->employee_Id = $employee_Id;
    }
    
    /**
     * @param mixed $FirstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
    
    /**
     * @param mixed $LastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
    
    /**
     * @param mixed $Job_Id
     */
    public function setJob_Id($job_Id)
    {
        $this->job_Id = $job_Id;
    }
    
    public function setStatus_Id($status_Id)
    {
        $this->status_Id = $status_Id;
    }
    
    /**
     * @param mixed $DateRegister
     */
    public function setDateRegister($dateRegister)
    {
        $this->dateRegister = $dateRegister;
    }
    
    /**
     * @param mixed $address
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
    
    public static function getHeader()
    {
        $str = "<table border='1'>";
        $str .= "<tr>
                    <th>Employee_Id</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Job_Id</th>
                    <th>Status_Id</th>
                    <th>DateRegister</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>PhoneNumber</th>
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
                    <td>$this->employee_Id</td>
                    <td>$this->firstName</td>
                    <td>$this->lastName</td>
                    <td>$this->job_Id</td>
                    <td>$this->status_Id</td>
                    <td>$this->dateRegister</td>
                    <td>$this->address</td>
                    <td>$this->email</td>
                    <td>$this->phoneNumber</td>
                </tr>";
        return $str;
    }
    
    public function create($connection)
    
    {
        //$employee_Id = $this->employee_Id;      autoincrement
        $firstName = $this->firstName;
        $lastName = $this->lastName;
        $job_Id = $this->job_Id;
        $status_Id = $this->status_Id;
        $dateRegister = $this->dateRegister;
        $address = $this->address;
        $email = $this->email;
        $phoneNumber = $this->phoneNumber;
        
        $sqlStmt = "INSERT INTO employees (firstName,lastName,job_Id,status_Id,dateRegister,address,email,phoneNumber)
                    VALUES ('$firstName','$lastName','$job_Id','$status_Id','$dateRegister','$address','$email','$phoneNumber')";
        $result = $connection->exec($sqlStmt);
        return $result;
        
    }
    
    public function __call($method, $args)
    {
        $result = null;
        if($method == "update")
        {
            $employee_Id = $this->employee_Id;
            $opType = $args[0];
            $connection = $args[1];
            
            if($opType == "j")
            {
                $job_Id = $this->job_Id;
                $sqlStmt = "UPDATE employees SET job_Id='$job_Id' WHERE employee_Id='$employee_Id'";
                $result = $connection->exec($sqlStmt);
            } else if ($opType == "s") {
                $status_Id = $this->status_Id;
                $sqlStmt = "UPDATE employees SET status_Id='$status_Id' WHERE employee_Id='$employee_Id'";
                $result = $connection->exec($sqlStmt);
            } else if ($opType == "f") {
                $firstName = $this->firstName;
                $sqlStmt = "UPDATE employees SET firstName='$firstName' WHERE employee_Id='$employee_Id'";
                $result = $connection->exec($sqlStmt);
            } else if ($opType == "l") {
                $lastName = $this->lastName;
                $sqlStmt = "UPDATE employees SET lastName='$lastName' WHERE employee_Id='$employee_Id'";
                $result = $connection->exec($sqlStmt);
            } else if ($opType == "a") {
                $address = $this->address;
                $sqlStmt = "UPDATE employees SET address='$address' WHERE employee_Id='$employee_Id'";
                $result = $connection->exec($sqlStmt);
            } else if ($opType == "e") {
                $email = $this->email;
                $sqlStmt = "UPDATE employees SET email='$email' WHERE employee_Id='$employee_Id'";
                $result = $connection->exec($sqlStmt);
            } else {
                $phoneNumber = $this->phoneNumber;
                $sqlStmt = "UPDATE employees SET phoneNumber='$phoneNumber' WHERE employee_Id='$employee_Id'";
                $result = $connection->exec($sqlStmt);
            }
            
        }return $result;
    }
    
    public function getAllEmployees($connection)
    {
        $count =0;
        $sqlStmt = "SELECT * FROM employees";
        $listRec = $connection->query($sqlStmt);
        
        foreach ($listRec as $oneRec)
        {
            $employee = new EmployeeClass();
            $employee->setEmployee_Id($oneRec["Employee_Id"]);
            $employee->setFirstName($oneRec["FirstName"]);
            $employee->setLastName($oneRec["LastName"]);
            $employee->setJob_Id($oneRec["Job_Id"]);
            $employee->setStatus_Id($oneRec["Status_Id"]);
            $employee->setDateRegister($oneRec["DateRegister"]);
            $employee->setAddress($oneRec["Address"]);
            $employee->setEmail($oneRec["Email"]);
            $employee->setPhoneNumber($oneRec["PhoneNumber"]);
            
            $listOfEmployee[$count ++] = $employee;
            
        }
        return serialize($listOfEmployee);
        
    }
    
    public static function displayEmployees($result)
    {
        $listOfEmployees = unserialize($result);
        
        echo EmployeeClass::getHeader();
        foreach ($listOfEmployees as $oneEmployee)
            echo $oneEmployee;
        echo EmployeeClass::getFooter();
    }
    
    
}