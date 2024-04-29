<?php
namespace cls;


class ComponentClass
{
    private $serie_id;
    private $component_code;
    private $componenteName;
    
    
    public function __construct
    ($serie_id = null,
     $component_code = null, 
     $componenteName = null)
    {
        $this->serie_id=$serie_id;
        $this->somponent_code=$component_code;
        $this->componenteName=$componenteName;
        
    }
    
    
    /**
     * @return mixed
     */
    public function getSerie_id()
    {
        return $this->serie_id;
    }

    /**
     * @return mixed
     */
    public function getComponent_code()
    {
        return $this->component_code;
    }

    /**
     * @return mixed
     */
    public function getComponentName()
    {
        return $this->componentName;
    }

    /**
     * @param mixed $Serie_id
     */
    public function setSerie_id($serie_id)
    {
        $this->serie_id = $serie_id;
    }

    /**
     * @param mixed $Component_code
     */
    public function setComponent_code($component_code)
    {
        $this->component_code = $component_code;
    }

    /**
     * @param mixed $ComponentName
     */
    public function setComponenteName($componenteName)
    {
        $this->componenteName = $componenteName;
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
        
        $data = "<tr><td>$this->Serie_id</td><td>$this->Component_code</td><td>$this->ComponenteName</td></tr>";
        return $data;
    }
    
    public function __call($method, $args)
    {
        if ($method == "update") {
            
            $serie_id = $this ->serie_id;
            $opType = $args[0];
            $connection = $args[1];
            
            if ($opType == "p") {
 
                $component_code = $this ->component_code;
                $sqlStmt = "update components set Component_code='$component_code' where Serie_id=$serie_id";
                $result = $connection->exec($sqlStmt);
            } else {
                $componenteName = $this ->componentName;
                $sqlStmt = "update components set ComponenteName='$componenteName' where Serie_id=$serie_id";
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
        $component_code = $this ->component_code;
        $componenteName = $this ->componenteName;
        
        $sqlStmt="insert into components values($serie_id,'$component_code','$componenteName')";
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
            $component->setComponent_code($oneRec['$Component_code']);
            $component->setComponenteName($oneRec['ComponenteName']);
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