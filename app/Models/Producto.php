<?php

namespace App\Models;

class Producto {

    public static function all(){
        
        $conn = Conexion::getConnection();
        $stmt = $conn->prepare('SELECT * FROM producto');
        $stmt->execute();
        $products = $stmt->fetchAll();
        $conn = null;
        $stmt = null;
        return $products;
        
    }

}
