<h1>Crear nuevos productos</h1>

<form action="<?=base_url?>Producto/save" method="POST">


<label for="nombre">Nombre:</label>
<input type="text" name="nombre">

<label for="descripcion">Descripcion</label>
<textarea name="descripcion"></textarea>

<label for="precio">precio</label>
<input type="text" name="precio">

<label for="stock">Stock</label>
<input type="number" name="stock">


<label for="img">imagen</label>
<input type="text" name="imagen">
<label for="categoria">Categoria: </label>

<select name="categoria">
<?php $categorias = Utils::showCategorias();
while ($categoria = $categorias->fetch_object()):
?>
	<option value="<?=$categoria->id;?>">
		<?=$categoria->nombre;?>
	</option>
<?php endwhile;?>

<input type="submit" value="Registrar">
</select>
</form>
