
<div class="col-xs-12">
    <h1>Productos</h1>
    <?php if(!empty($this->session->flashdata())): ?>
		<div class="alert alert-<?php echo $this->session->flashdata('clase')?>">
			<?php echo $this->session->flashdata('mensaje') ?>
		</div>
	<?php endif; ?>
    <div>
        <a class="btn btn-success" href="<?php echo base_url() ?>index.php/productos/agregar">Nuevo <i class="fa fa-plus"></i></a>
    </div>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Producto</th>
                <th>Cantidad</th>
                <th>Categoria</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($productos as $producto){ ?>
            <tr>
                <td><?php echo $producto->id_producto ?></td>
                <td><?php echo $producto->nombre_producto ?></td>
                <td><?php echo $producto->cantidad?></td>
                <td><?php echo $producto->nombre_categoria?></td>
                <td><a class="btn btn-warning" href="<?php echo base_url() ."index.php/productos/editar/" . $producto->id_producto ?>">Editar<i class="fa fa-edit"></i></a></td>
                <td><a class="btn btn-danger" href="<?php echo base_url() ."index.php/productos/eliminar/" . $producto->id_producto ?>">Eliminar<i class="fa fa-trash"></i></a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>