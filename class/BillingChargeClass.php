<?php

namespace cls;

class BillingChargeClass
{
   private $billing_Id;
   private $billing_Type;
      
   
   public function __construct($billing_Id,$billing_Type )
   {
       $this ->billing_Id = $billing_Id;
       $this ->billing_Type= $billing_Type;
   }
   
   /**
     * @return mixed
     */
    public function getBilling_Id()
    {
        return $this->billing_Id;
    }

/**
     * @return mixed
     */
    public function getBilling_Type()
    {
        return $this->billing_Type;
    }

/**
     * @param mixed $Billing_Id
     */
    public function setBilling_Id($billing_Id)
    {
        $this->Billing_Id = $billing_Id;
    }

/**
     * @param mixed $Billing_Type
     */
    public function setBilling_Type($billing_Type)
    {
        $this->Billing_Type = $billing_Type;
    }   
    
    
}