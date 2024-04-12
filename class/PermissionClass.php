<?php
namespace class;


class PermissionClass
{
    private $Permission_Id;
    private $MenuAccess;
    private $Description;
    public function __construct($Permission_Id, $MenuAccess, $Description = null)
    {
        $this->Permission_Id = $Permission_Id;
        $this->MenuAccess = $MenuAccess;
        $this->Description = $Description;
    }
    /**
     * @return mixed
     */
    public function getPermission_Id()
    {
        return $this->Permission_Id;
    }

    /**
     * @return mixed
     */
    public function getMenuAccess()
    {
        return $this->MenuAccess;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @param mixed $Permission_Id
     */
    public function setPermission_Id($Permission_Id)
    {
        $this->Permission_Id = $Permission_Id;
    }

    /**
     * @param mixed $MenuAccess
     */
    public function setMenuAccess($MenuAccess)
    {
        $this->MenuAccess = $MenuAccess;
    }

    /**
     * @param mixed $Description
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;
    }

    
}

