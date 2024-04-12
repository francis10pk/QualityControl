<?php
namespace class;

class Machines_componentsClass
{
    private $Serie_id;
    private $MachineCode;
    
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
    public function getMachineCode()
    {
        return $this->MachineCode;
    }

    /**
     * @param mixed $Serie_id
     */
    public function setSerie_id($Serie_id)
    {
        $this->Serie_id = $Serie_id;
    }

    /**
     * @param mixed $MachineCode
     */
    public function setMachineCode($MachineCode)
    {
        $this->MachineCode = $MachineCode;
    }

    public function __construct($Serie_id,$MachineCode)
    {
        $this->Serie_id=$Serie_id;
        $this->MachineCode=$MachineCode;
    }

}
