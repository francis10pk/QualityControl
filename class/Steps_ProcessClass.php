<?php
namespace class;


class Steps_ProcessClass
{
    private $Process_Id;
    private $NameProcess;
    
    public function __construct($Process_Id,$NameProcess)
    {
        $this->Process_Id=$Process_Id;
        $this->NameProcess=$NameProcess;
    }
    
    /**
     * @return mixed
     */
    public function getProcess_Id()
    {
        return $this->Process_Id;
    }

    /**
     * @return mixed
     */
    public function getNameProcess()
    {
        return $this->NameProcess;
    }

    /**
     * @param mixed $Process_Id
     */
    public function setProcess_Id($Process_Id)
    {
        $this->Process_Id = $Process_Id;
    }

    /**
     * @param mixed $NameProcess
     */
    public function setNameProcess($NameProcess)
    {
        $this->NameProcess = $NameProcess;
    }

}
