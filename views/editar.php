<?php require_once('layouts/header.php'); ?>
	<title>Editar registro</title>
</head>
<body class="m">
	<form action="" method="GET" class="form-css">
        <?php
            foreach($menu_item as $key=>$value){
                foreach($value as $menu_item){
                    echo '<div class="form-element">
                        <label for="padre_menu">Menú Padre</label>
                        <select name="padre_menu" id="padre_menu" value=1>
                            <option>-- Seleccione una opcion --</option>
                            <option value="padre">Menú padre</option>';
                            if(!empty($padre_class)){
                                foreach($padre_class as $k => $val){
                                    foreach($val as $padre_item){
                                        echo '<option value="'.$padre_item['iditem'].'"';
                                        if($menu_item['categoria']==2 && ($padre_item['iditem'] == $id_padre_class[1][0]['id_menu_padre'])){
                                            echo ' selected';
                                        }
                                        echo '>'.$padre_item['nombre'].'</option>';
                                    }
                                }
                            }
                        echo '</select>
                    </div>
                    <div class="form-element">
                        <label for="item">Nombre</label>
                        <input type="text" id="item" name="item" placeholder="Ingrese nombre de item" value='.$menu_item['nombre'].'>
                    </div>
                    <div class="form-element">
                        <label for="descripcion">Descripcion</label>
                        <input name="id" hidden type="text" value="'.$menu_item['iditem'].'">
                        <textarea name="descripcion" id="" cols="30" rows="10" placeholder="Inserte descripcion de item">'.$menu_item['descripcion'].'</textarea>
                    </div>';
                }
            }
        ?>
		<input class="btn btn-add" type="submit" name="act" id="button-confirm" value="Actualizar" disabled>
	</form>
<?php require_once('layouts/header.php'); ?>