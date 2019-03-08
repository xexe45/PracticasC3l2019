<?php

namespace App\Models;
use PDO;

class Conexion{

    public static $connection = null;

    public static $host = 'localhost';
    public static $db = 'practicas2019';
    public static $user = 'root';
    public static $pass = '';
    public static $charset = 'utf8';

    private function __construct(){}

    public static function getConnection(){

        /*
        Singleton Pattern
        */
        
        if( !self::$connection ){

            self::$connection = new PDO("mysql:host=".self::$host.";dbname=".self::$db.";charset=".self::$charset."", self::$user, self::$pass,[
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
        
        }

        return self::$connection;
    
    }

}