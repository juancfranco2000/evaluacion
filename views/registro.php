<?php require_once('layouts/header.php'); ?>
	<title>Nuevo registro</title>
</head>
<body class="m">
	<form action="" method="GET" class="form-css">
		<div class="form-element">
			<label for="padre_menu">Menú Padre</label>
			<select name="padre_menu" id="padre_menu">
				<option selected>-- Seleccione una opcion --</option>
				<option value="padre">Menú padre</option>
				<?php 
					if(!empty($padre_class)){
						foreach($padre_class as $key => $value){
							foreach($value as $padre_item){
								echo '<option value="'.$padre_item['iditem'].'">'.$padre_item['nombre'].'</option>';
							}
						}
					}
				?>
			</select>
		</div>
		<div class="form-element">
			<label for="item">Nombre</label>
			<input type="text" id="item" name="item" placeholder="Ingrese nombre de item">
		</div>
		<div class="form-element">
			<label for="descripcion">Descripcion</label>
			<textarea name="descripcion" id="" cols="30" rows="10" placeholder="Inserte descripcion de item"></textarea>
		</div>
		<input class="btn btn-add" type="submit" name="act" id="button-confirm" value="Guardar" disabled>
	</form>
<?php require_once('layouts/header.php'); ?>