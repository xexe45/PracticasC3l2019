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

if( isset($_POST['op']) ){
    switch ($_POST['add']) {
        case 'value':
            $id = QueryBuilder::factory()->table('producto')->create([NUll,'Pepino','10','20','2']);
            echo json_encode($id);
        break;
        
        default:
            # code...
            break;
    }
}

