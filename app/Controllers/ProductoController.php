<?php

require '../bootstrap.php';

use App\Models\QueryBuilder;

if( isset($_GET['op']) ){

    switch ($_GET['op']) {
        case 'all':
            $productos = QueryBuilder::factory()->table('producto')->all();
            echo json_encode($productos);
        break;

        case 'find':
            $producto = QueryBuilder::factory()->table('producto')->find($_GET['id']);
            echo json_encode($producto);
        break;
        
        default:
            # code...
        break;
    }

}

if( isset($_POST['op']) ){
    switch ($_POST['op']) {
        case 'add':
            $id = QueryBuilder::factory()->table('producto')->create(array(
                "id" => NULL,
                "nombre" => "tv samsung",
                "precio_venta" => 100.00,
                "pecio_compra" => 200.00,
                "stock" => 20
            ));
            echo json_encode($id);
        break;

        case 'update':
            $ok = QueryBuilder::factory()->table('producto')->update(2,array(
                "nombre" => "tv samsung 1",
                "precio_venta" => 100.00,
                "pecio_compra" => 200.00,
                "stock" => 20
            ));
            echo json_encode($ok);
        break;

        case 'delete':
            $count = QueryBuilder::factory()->table('producto')->delete($_POST['id']);
            echo json_encode($count);
        break;
        
        default:
            # code...
            break;
    }
}

