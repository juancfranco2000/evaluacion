<?php require_once('layouts/header.php'); ?>
	<title>Admin panel</title>
</head>
<body class="ms">
    <a class="btn btn-add" href="index.php?act=menu">Ver estructura de menú</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Menu Padre</th>
                <th>Descripcion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!--Anexamos botón de nuevo-->
            <a class="btn btn-add" href="index.php?act=registro">Nuevo</a>
            <?php
                //Validación de registro de datos
                if(!empty($items)){
                    foreach($items as $key => $value){
                        foreach($value as $items){
                            echo '<tr>
                                <td>'.$items['iditem'].'</td>
                                <td>'.$items['nombre'].'</td>
                                <td>'.$items['categoria'].'</td>
                                <td>'.$items['descripcion'].'</td>
                                <td><a class="btn btn-edit" href="index.php?act=editItem&id='.$items['iditem'].'">Editar</a><a class="btn btn-delete" href="index.php?act=deleteItem&id='.$items['iditem'].'">Eliminar</a></td>
                            </tr>';
                        }
                    }
                }else{
                    echo '<td colspan="5">NO HAY ITEMS</td>';
                }
            ?>
        </tbody>
    </table>
<?php require_once('layouts/header.php'); ?>