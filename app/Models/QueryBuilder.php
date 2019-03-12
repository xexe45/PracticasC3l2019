<?php
/**
 * Dev Mode init : 08/03/2019
 * Dev: Cesar Lachira Cordova
 * Company: C3L
 */
namespace App\Models;

class QueryBuilder {

    private $table;

    public static function factory() {
        // The question is: How useful is this factory function. In fact: useless in
        // the current state, but it can be extended in any way
        return new self;
    }

    public function table($table)
    {
        $this->table = $table;
        return $this;
    }

    public function all(){
        
        $conn = Conexion::getConnection();
        $stmt = $conn->prepare("SELECT * FROM {$this->table}");
        $stmt->execute();
        $data = $stmt->fetchAll();
        $conn = null;
        $stmt = null;
        return $data;
        
    }

    public function create($data)
    {
        $conn = Conexion::getConnection();
        
        $count = count($data);
        
        $attrs = [];
        
        for ($i=0; $i < $count; $i++) { 
            $attrs[] = '?';
        }

        $desilachar = implode(",", $attrs);

        $sql = "INSERT INTO {$this->table} VALUES({$desilachar})";

        try{

            $stmt = $conn->prepare($sql);
            $stmt->execute($data);
            $id = $conn->lastInsertId();

        }catch( Exception $e ){

            $id = 0;

        }finally{

            $conn = null;
            $stmt = null;
            return $id;
            
        }
    
    }

}