<h1>Gestion de  productos</h1>

	<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == 'completado'): ?>
		<strong class="alert-green">Registro exitoso</strong>
		<?php elseif (isset($_SESSION['producto']) && $_SESSION['producto'] == 'fallido'): ?>
		<strong class="alert-red">Error, no se registró  el producto</strong>
	<?php endif;?>
	<?php Utils::deleteSession('producto');?>
	<a href="<?=base_url?>Producto/crear" class="button button-small">
		Crear Productos
	</a>
	<?php if (isset($_SESSION['borrado']) && $_SESSION['borrado'] == 'exito'): ?>
		<strong class="alert-green">Eliminacion  exitosa</strong>
		<?php elseif (isset($_SESSION['borrado']) && $_SESSION['borrado'] == 'fallido'): ?>
		<strong class="alert-red">Error, no se borrado el producto</strong>
	<?php endif;?>
	<?php Utils::deleteSession('borrado');?>
<table>
	<tr>
		<th>Id</th>
		<th>Nombre</th>
		<th>Precio</th>
		<th>Stock</th>
		<th>Acciones</th>
	</tr>
<?php while ($prod = $producto->fetch_object()): ?>
	<tr>
		<td><?=$prod->id;?></td>
		<td><?=$prod->nombre;?></td>
		<td><?=$prod->precio;?></td>
		<td><?=$prod->stock;?></td>
		<td>
			<a href="<?=base_url?>Producto/editar&id=<?=$prod->id?>" class="button button-gestion">Editar</a>
			<a href="<?=base_url?>Producto/eliminar&id=<?=$prod->id?>" class="button button-gestion button-naranja">Eliminar</a>
		</td>
	</tr>
<?php endwhile;?>

</table>