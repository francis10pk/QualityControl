<?php
namespace class;

class StatusClass
{
    private $Status_Id;
    private $State;
    public function __construct($Status_Id, $State)
    {
        $this->Status_Id = $Status_Id;
        $this->State = $State;
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
    public function getState()
    {
        return $this->State;
    }

    /**
     * @param mixed $Status_Id
     */
    public function setStatus_Id($Status_Id)
    {
        $this->Status_Id = $Status_Id;
    }

    /**
     * @param mixed $State
     */
    public function setState($State)
    {
        $this->State = $State;
    }

}

