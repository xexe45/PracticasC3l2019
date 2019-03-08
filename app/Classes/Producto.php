<?php

namespace App\Classes;

class Producto {

    private $id;
    private $nombre;
    private $precio_venta;
    private $precio_compra;
    private $stock;

    public function __construct()
    {
        
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setPrecioVenta($precio_venta)
    {
        $this->precio_venta = $precio_venta;
    }

    public function getPrecioVenta()
    {
        return $this->precio_venta;
    }

    public function setPrecioCompra($precio_compra)
    {
        $this->precio_compra = $precio_compra;
    }

    public function getPrecioCompra()
    {
        return $this->precio_compra;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    public function getStock()
    {
        return $this->stock;
    }



    

}