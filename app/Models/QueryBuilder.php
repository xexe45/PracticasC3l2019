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

    public function all()
    {
        
        $conn = Conexion::getConnection();
        $stmt = $conn->prepare("SELECT * FROM {$this->table}");
        $stmt->execute();
        $data = $stmt->fetchAll();
        $conn = null;
        $stmt = null;
        return $data;
        
    }

    public function find($id)
    {
        $conn = Conexion::getConnection();
        $stmt = $conn->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch();
        $conn = null;
        $stmt = null;
        return $data;
    }

    public function create($data)
    {
        $conn = Conexion::getConnection();
        
        $attrs = [];
        $values = [];
        $keys = [];
        
        foreach ($data as $key => $value) {
            $attrs[] = '?';
            $values[] = $value;
            $keys[] = $key;
        }
        
        $desilachar = implode(",", $attrs);
        $columns = implode(",",$keys);

        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES({$desilachar})";
    
        try{

            $conn->prepare($sql)->execute($values);
            $id = $conn->lastInsertId();

        }catch( Exception $e ){
            //echo $e->getMessage();
            $id = 0;

        }finally{

            $conn = null;
            $stmt = null;
            return $id;
            
        }
    
    }

    public function update($id,$data)
    {
        $conn = Conexion::getConnection();
        
        $attrs = [];
        $values = [];

        foreach ($data as $key => $value) {
            $attrs[] = "{$key} = ?";
            $values[] = $value;
        }
        
        $desilachar = implode(",", $attrs);

        $sql = "UPDATE {$this->table} SET {$desilachar} WHERE id = ?";

        array_push($values,$id);

        $ok = false;
        
        try{

            $conn->prepare($sql)->execute($values);
            $ok = true;

        }catch( Exception $e ){
            //echo $e->getMessage();
            $ok = false;

        }finally{

            $conn = null;
            $stmt = null;
            return $ok;
            
        }
    
    }

    public function delete($id)
    {
        $conn = Conexion::getConnection();
        $stmt = $conn->prepare("DELETE FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        $deleted = $stmt->rowCount();
        $conn = null;
        $stmt = null;
        return $deleted;
    }

}