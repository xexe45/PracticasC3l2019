<?php

require '../bootstrap.php';

use App\Models\QueryBuilder;

if( isset($_GET['op']) ){

    switch ($_GET['op']) {
        case 'all':
            $productos = QueryBuilder::factory()->table('producto')->all();
            echo json_encode($productos);
        break;
        
        default:
            # code...
        break;
    }

}

