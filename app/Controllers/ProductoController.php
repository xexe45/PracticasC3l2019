<?php

require '../bootstrap.php';

use App\Models\Producto;

if( isset($_GET['op']) ){

    switch ($_GET['op']) {
        case 'all':
            $productos = Producto::all();
            echo json_encode($productos);
        break;
        
        default:
            # code...
        break;
    }

}

