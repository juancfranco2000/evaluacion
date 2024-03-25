<?php require_once('layouts/header.php'); ?>
	<title>Menú principal</title>
</head>
<body>
    <nav>
        <ul>
            <?php
                //Guardamos los submenus en un arreglo para comparativa
                $data = array(); $y=0;
                if(!empty($submenu)){
                    foreach($submenu as $key => $value){
                        foreach($value as $submenu){
                            $data[$y] = $submenu;
                            $y++;
                        }
                    }
                }
                //Imprimimos los datos de items de menú
                if(!empty($menu)){
                    foreach($menu as $key => $value){
                        foreach($value as $items){
                            //Si la categoria es 1 (item padre), entonces se imprimirá dentro de una estructura li
                            if($items['categoria']==1){
                                //imprimimos items padre
                                echo '<li>
                                <label class="description" href="#" id="'.$items['iditem'].'">'.$items['nombre'].'</label>
                                <div>
                                    <ul>';
                                    for($x=0; $x<sizeof($data); $x++){
                                        //Si el id padre es igual a la estructura, entonces imprimiremos todas las clases hijas del item
                                        if($items['iditem']==$data[$x]['id_menu_padre']){
                                            echo '<li><label class="description" id="'.$data[$x]['id_menu'].'">'.$data[$x]['nombre'].'</label></li>';
                                        }
                                    }
                                    echo '</ul>
                                    </div>';
                                echo '</li>';
                            }
                        }
                    }
                }
            ?>
        </ul>
    </nav>
    <div class="m-5" id="text-description">  </div>
<?php require_once('layouts/header.php'); ?>