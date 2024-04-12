<?php
namespace class;

class JobClass
{
    private $Job_Id;
    private $Job_Description;
    
    
    
    public function __construct($Job_Id,$Job_Description)
    {
        $this->Job_Id=$Job_Id;
        $this->Job_Description=$Job_Description;
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
    public function getJob_Description()
    {
        return $this->Job_Description;
    }

    /**
     * @param mixed $Job_Id
     */
    public function setJob_Id($Job_Id)
    {
        $this->Job_Id = $Job_Id;
    }

    /**
     * @param mixed $Job_Description
     */
    public function setJob_Description($Job_Description)
    {
        $this->Job_Description = $Job_Description;
    }
   
}
