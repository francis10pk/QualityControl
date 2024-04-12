<?php
namespace class;


class Registering_movementsClass
{
    private $Mov_Id;
    private $OrderService_Id;
    private $Process_Id;
    private $Employee_Id;
    private $dateRegister;
    private $Description;
    private $UploadReport;
    
    public  function __construct($Mov_Id,$OrderService_Id,$Process_Id,$Employee_Id,
        $dateRegister,$Description,$UploadReport)
    {
        $this->Mov_Id=$Mov_Id;
        $this->OrderService_Id=$OrderService_Id;
        $this->Process_Id=$Process_Id;
        $this->Employee_Id=$Employee_Id;
        $this->dateRegister=$dateRegister;
        $this->Description=$Description;
        $this->UploadReport=$UploadReport;
    }
    
    
    /**
     * @return mixed
     */
    public function getMov_Id()
    {
        return $this->Mov_Id;
    }

    /**
     * @return mixed
     */
    public function getOrderService_Id()
    {
        return $this->OrderService_Id;
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
    public function getEmployee_Id()
    {
        return $this->Employee_Id;
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
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @return mixed
     */
    public function getUploadReport()
    {
        return $this->UploadReport;
    }

    /**
     * @param mixed $Mov_Id
     */
    public function setMov_Id($Mov_Id)
    {
        $this->Mov_Id = $Mov_Id;
    }

    /**
     * @param mixed $OrderService_Id
     */
    public function setOrderService_Id($OrderService_Id)
    {
        $this->OrderService_Id = $OrderService_Id;
    }

    /**
     * @param mixed $Process_Id
     */
    public function setProcess_Id($Process_Id)
    {
        $this->Process_Id = $Process_Id;
    }

    /**
     * @param mixed $Employee_Id
     */
    public function setEmployee_Id($Employee_Id)
    {
        $this->Employee_Id = $Employee_Id;
    }

    /**
     * @param mixed $dateRegister
     */
    public function setDateRegister($dateRegister)
    {
        $this->dateRegister = $dateRegister;
    }

    /**
     * @param mixed $Description
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;
    }

    /**
     * @param mixed $UploadReport
     */
    public function setUploadReport($UploadReport)
    {
        $this->UploadReport = $UploadReport;
    }

}
