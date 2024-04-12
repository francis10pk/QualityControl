<?php
namespace class;


class MachineClass
{
    private $MachineCode;
    private $Model;
    private $MachineLine;
    
    public function __construct($MachineCode,$Model,$MachineLine)
    {
        $this->MachineCode=$MachineCode;
        $this->Model=$Model;
        $this->MachineLine=$MachineLine;
        
    }
    
    /**
     * @return mixed
     */
    public function getMachineCode()
    {
        return $this->MachineCode;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->Model;
    }

    /**
     * @return mixed
     */
    public function getMachineLine()
    {
        return $this->MachineLine;
    }

    /**
     * @param mixed $MachineCode
     */
    public function setMachineCode($MachineCode)
    {
        $this->MachineCode = $MachineCode;
    }

    /**
     * @param mixed $Model
     */
    public function setModel($Model)
    {
        $this->Model = $Model;
    }

    /**
     * @param mixed $MachineLine
     */
    public function setMachineLine($MachineLine)
    {
        $this->MachineLine = $MachineLine;
    }

    
    
}