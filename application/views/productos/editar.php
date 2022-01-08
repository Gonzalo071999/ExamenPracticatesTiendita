<div class="col-xs-12">
	<h1>Editar producto</h1>
	<form method="post" action="<?php echo base_url() ?>index.php/productos/guardarCambios">
        <input name="id_producto" type="hidden" value="<?php echo $producto->id_producto?>">
		<label for="nombre_producto">Nombre del producto:</label>
		<input value="<?php echo $producto->nombre_producto ?>" class="form-control" name="nombre_producto" required type="text" id="nombre_producto" placeholder="Escribe nombre del Producto">

		<label for="catidad">Cantidad:</label>
		<input value="<?php echo $producto->cantidad ?>" class="form-control" name="cantidad" required type="number" id="cantidad" placeholder="Cantidad">
		
		<label for="precioVenta">Cantegoria:</label>
		<select name="id_categoria" id="id_categoria" class="form-control" >
            <option value="">Seleccione...</option>
            <?php foreach ($categoria as $categorias): ?>
                    <option value="<?php echo $categorias->id_categoria;?>"><?php echo $categorias->nombre_categoria; ?></option>
            <?php endforeach;?>
        </select>

		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>