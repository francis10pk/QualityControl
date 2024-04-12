<?php
namespace class;


class UserAccountPermissionClass
{
    private $User_Id;
    private $Permission_Id;
    public function __construct($User_Id, $Permission_Id)
    {
        $this->User_Id = $User_Id;
        $this->Permission_Id = $Permission_Id;
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
    public function getPermission_Id()
    {
        return $this->Permission_Id;
    }

    /**
     * @param mixed $User_Id
     */
    public function setUser_Id($User_Id)
    {
        $this->User_Id = $User_Id;
    }

    /**
     * @param mixed $Permission_Id
     */
    public function setPermission_Id($Permission_Id)
    {
        $this->Permission_Id = $Permission_Id;
    }

    
    
}

