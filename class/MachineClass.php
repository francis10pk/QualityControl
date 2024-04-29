<?php
namespace class;


class MachineClass
{
    private $MachineCode;
    private $Model;
    private $MachineLine;
    
    public function __construct($MachineCode = null,$Model = null ,$MachineLine= null)
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
    public function __toString(){
        $data = "<tr><td>$this->MachineCode</td><td>$this->Model</td><td>$this->MachineLine</td></tr>";
        return $data;
    }
    /**
     * @param mixed $MachineLine
     */
    public function setMachineLine($MachineLine)
    {
        $this->MachineLine = $MachineLine;
    }
    public static function getHeader()
    {
        $header = "<table border='1'>";
        $header .= "<tr><th>Machine code </th><th>Model </th><th>Machine Linme</th></tr>";
        return $header;
    }
    public static function getFooter()
    {
        return "</table>";
    }
    
   
    
    public function __call($method, $args)
    {
        if ($method == "update") {
           
            $machinecode = $this->MachineCode;
            $opType = $args[0];
            $connection = $args[1];
            
            if ($opType == "p") {
                
          
                $model = $this->Model;
                $sqlStmt = "update machines set Model='$model' where MachineCode=$machinecode";
                $result = $connection->exec($sqlStmt);
            } else {
                $machineline = $this->MachineLine;
                $sqlStmt = "update machines set MachineLine='$machineline' where MachineCode=$machinecode";
                $result = $connection->exec($sqlStmt);
            }
            
            return $result;
        }
    }
    
    public  function create($connection)
    {
        // processing  : Add a new machine
        // sql stmt : insert....
        
        $machinecode = $this->MachineCode;
        $model = $this->Model;
        $machineline = $this->MachineLine;
       
        $sqlStmt="insert into machines values($machinecode,'$model','$machineline')";
        $result = $connection->exec($sqlStmt);
        return $result;
        // connection
    }
    
    public  function delete($connection)
    {
        // processing  : delete a  machine
        // sql stmt : delete....
        
        $machinecode = $this->MachineCode;
        $sqlStmt="delete from machines where MachineCode=$machinecode";
        $result = $connection->exec($sqlStmt);
        return $result;
        // connection
    }
    
    public static function getAllMachines($connection)
    {
        $count=0;
        $sqlStmt = "Select * from machines";
        $listRec = $connection->query($sqlStmt);
        
        foreach ($listRec as $oneRec)
        {
            $machine = new MachineClass();
            
            $machine->setMachineCode($oneRec['MachineCode']);
            $machine->setModel($oneRec['Model']);
            $machine->setMachineLine($oneRec['MachineLine']);
           
            
            $listOfMachines[$count++]=$machine;
            
        }
        return serialize($listOfMachines);
    }
    
    public static function displayMachine($result)
    {
        $listMachines = unserialize($result);
        //display all order service
        echo MachineClass::getHeader();
        foreach ($listMachines as $machine)
            echo $machine;
        echo MachineClass::getFooter();
    }
    
}