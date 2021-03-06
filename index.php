<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practicas 2019</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body{
            background: #efefef;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Practicas 2019</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                
            </div>
        </nav>
    </header>
    <main class="container mt-3">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        This is some text within a card body.
                        <button type="button" id="crear" class="btn btn-primary">Crear Producto</button>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NOMBRE</th>
                                        <th>PRECIO VENTA</th>
                                        <th>PRECIO COMPRA</th>
                                        <th>STOCK</th>
                                        <th>OPCIONES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $(function(){
            getProducts();
            $('#crear').on('click', function(){
                $.post('app/Controllers/ProductoController.php', {op: 'update'}, function(response){
                    console.log(response);
                },'json')
            })
        });

        function getProducts(){
            $.get('app/Controllers/ProductoController.php', {op: 'all'}, function(response){

                let html = '';

                $.each(response, function(index, value){
                    html += '<tr>';
                    html += '<td>'+value['id']+'</td>';
                    html += '<td>'+value['nombre']+'</td>';
                    html += '<td>'+value['precio_venta']+'</td>';
                    html += '<td>'+value['pecio_compra']+'</td>';
                    html += '<td>'+value['stock']+'</td>';
                    html += "<td><button onclick='editar("+value['id']+")' class='btn btn-info btn-sm'>Editar</button>";
                    html += "<button onclick='borrar("+value['id']+")' class='btn btn-danger btn-sm'>Borrar</button></td>";
                    html += '</tr>';
                });

                $('table > tbody').html(html);


            },'json')
        }

        function editar(id){
            $.get('app/Controllers/ProductoController.php', {op: 'find', id:id}, function(response){
                console.log(response);
            }, 'json');
        }

        function borrar(id){
            $.post('app/Controllers/ProductoController.php', {op: 'delete', id:id}, function(response){
                console.log(response);
            }, 'json');
        }
    </script>
</body>
</html>