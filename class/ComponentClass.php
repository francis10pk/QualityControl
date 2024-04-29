<?php
namespace cls;


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
    public static function getHeader()
    {
        $header = "<table border='1'>";
        $header .= "<tr><th>Serie Id </th><th>Component code </th><th>Componente Name</th></tr>";
        return $header;
    }
    public static function getFooter()
    {
        return "</table>";
    }
    
    public function __toString()
    {
        
        $data = "<tr><td>$this->studentid</td><td>$this->Serie_id</td><td>$this->Component_code</td><td>$this->ComponentName</td></tr>";
        return $data;
    }
    
    public function __call($method, $args)
    {
        if ($method == "update") {
            
            $serie_id = $this ->Serie_id;
            $opType = $args[0];
            $connection = $args[1];
            
            if ($opType == "p") {
 
                $component_code = $this ->Component_code;
                $sqlStmt = "update components set Component_code='$component_code' where Serie_id=$serie_id";
                $result = $connection->exec($sqlStmt);
            } else {
                $ComponenteName = $this ->ComponentName;
                $sqlStmt = "update components set ComponenteName='$ComponenteName' where Serie_id=$serie_id";
                $result = $connection->exec($sqlStmt);
            }
            
            return $result;
        }
    }
    
    public  function create($connection)
    {
        // processing  : Add a new component
        // sql stmt : insert....
        
        $serie_id = $this ->Serie_id;
        $component_code = $this ->Component_code;
        $ComponenteName = $this ->ComponentName;
        
        $sqlStmt="insert into components values($serie_id,'$component_code','$ComponenteName')";
        $result = $connection->exec($sqlStmt);
        return $result;
        // connection
    }
    
    public  function delete($connection)
    {
        // processing  : delete a  component
        // sql stmt : delete....
        
        $serie_id = $this ->Serie_id;
        $sqlStmt="delete from components where Serie_Id=$serie_id";
        $result = $connection->exec($sqlStmt);
        return $result;
        // connection
    }
    
    public function getAllComponents($connection)
    {
        $count=0;
        $sqlStmt = "Select * from components";
        $listRec = $connection->query($sqlStmt);
        
        foreach ($listRec as $oneRec)
        {
            $component = new ComponentClass();
            $component->setSerie_id($oneRec['Serie_Id']);
            $component->setComponent_code($oneRec['$component_code']);
            $component->setComponentName($oneRec['ComponenteName']);
            $listOfComponents[$count++]=$component;
            
        }
        return serialize($listOfComponents);
    }
    
    public static function displayComponent($result)
    {
        $listComponents = unserialize($result);
       
        echo ComponentClass::getHeader();
        foreach ($listComponents as $component)
            echo $component;
            echo ComponentClass::getFooter();
    }
    
}