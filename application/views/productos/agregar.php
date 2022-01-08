<div class="col-xs-12">
	<h1>Nuevo producto</h1>
	<?php if(!empty($this->session->flashdata())): ?>
		<div class="alert alert-<?php echo $this->session->flashdata('clase')?>">
			<?php echo $this->session->flashdata('mensaje') ?>
		</div>
	<?php endif; ?>
	<form method="post" action="<?php echo base_url() ?>index.php/productos/guardar">
		<label for="codigo">Nombre dle Producto:</label>
		<input class="form-control" name="nombre_producto" required type="text" id="nombre_producto" placeholder="Escribe Nombre">

		<label for="precioVenta">Cantidad:</label>
		<input class="form-control" name="cantidad" required type="number" id="cantidad" placeholder="Catidad">

		<label for="precioCompra">Categoria:</label>
		<input class="form-control" name="id_categoria" required type="text" id="id_categoria" placeholder="Categoria">


		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>