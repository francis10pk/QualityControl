<?php
namespace class;

include 'Job.php';
include 'UserAccount.php';
include 'Status';

class EmployeeClass
{
    private $Employee_Id;
    private $FirstName;
    private $LastName;
    private $Job_Id;
    private $Status_Id;
    private $User_Id;
    private $DateRegister;
    private $Address;
    private $Email;
    private $PhoneNumber;
    
    
    public function __construct($Employee_Id,$FirstName,$LastName,$Job_Id,$Status_Id,$User_Id,
        $DateRegister,$Address,$Email,$PhoneNumber)
    {
        $this->Employee_Id=$Employee_Id;
        $this->FirstName=$FirstName;
        $this->LastName=$LastName;
        $this->Job_Id=$Job_Id;
        $this->Status_Id=$Status_Id;
        $this->User_Id=$User_Id;
        $this->DateRegister=$DateRegister;
        $this->Address=$Address;
        $this->Email=$Email;$PhoneNumber;
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
    public function getFirstName()
    {
        return $this->FirstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->LastName;
    }

    /**
     * @return mixed
     */
    public function getJob_Id()
    {
        return $this->Job_Id;
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
    public function getUser_Id()
    {
        return $this->User_Id;
    }

    /**
     * @return mixed
     */
    public function getDateRegister()
    {
        return $this->DateRegister;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->Address;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->PhoneNumber;
    }

    /**
     * @param mixed $Employee_Id
     */
    public function setEmployee_Id($Employee_Id)
    {
        $this->Employee_Id = $Employee_Id;
    }

    /**
     * @param mixed $FirstName
     */
    public function setFirstName($FirstName)
    {
        $this->FirstName = $FirstName;
    }

    /**
     * @param mixed $LastName
     */
    public function setLastName($LastName)
    {
        $this->LastName = $LastName;
    }

    /**
     * @param mixed $Job_Id
     */
    public function setJob_Id($Job_Id)
    {
        $this->Job_Id = $Job_Id;
    }

    /**
     * @param mixed $Status_Id
     */
    public function setStatus_Id($Status_Id)
    {
        $this->Status_Id = $Status_Id;
    }

    /**
     * @param mixed $User_Id
     */
    public function setUser_Id($User_Id)
    {
        $this->User_Id = $User_Id;
    }

    /**
     * @param mixed $DateRegister
     */
    public function setDateRegister($DateRegister)
    {
        $this->DateRegister = $DateRegister;
    }

    /**
     * @param mixed $Address
     */
    public function setAddress($Address)
    {
        $this->Address = $Address;
    }

    /**
     * @param mixed $Email
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
    }

    /**
     * @param mixed $PhoneNumber
     */
    public function setPhoneNumber($PhoneNumber)
    {
        $this->PhoneNumber = $PhoneNumber;
    }

    
    
}