<?php
namespace class;


class ComponentClass
{
    private $Serie_id;
    private $Component_code;
    private $ComponentName;
    
    
    public function __construct($Serie_id,$Component_code,$ComponentName)
    {
        $this->Serie_id=$Serie_id;
        $this->Component_code=$Component_code;
        $this->ComponentName=$ComponentName;
        
    }
    
    
    /**
     * @return mixed
     */
    public function getSerie_id()
    {
        return $this->Serie_id;
    }

    /**
     * @return mixed
     */
    public function getComponent_code()
    {
        return $this->Component_code;
    }

    /**
     * @return mixed
     */
    public function getComponentName()
    {
        return $this->ComponentName;
    }

    /**
     * @param mixed $Serie_id
     */
    public function setSerie_id($Serie_id)
    {
        $this->Serie_id = $Serie_id;
    }

    /**
     * @param mixed $Component_code
     */
    public function setComponent_code($Component_code)
    {
        $this->Component_code = $Component_code;
    }

    /**
     * @param mixed $ComponentName
     */
    public function setComponentName($ComponentName)
    {
        $this->ComponentName = $ComponentName;
    }

    
}