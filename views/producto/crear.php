<?php if (isset($edit) && isset($pro) && is_object($pro)): ?>
<h1>Editar producto <?=$pro->nombre;?></h1>
<?php $url_action = base_url . "Producto/save&id=" . $pro->id;?>
<?php else: ?>
<h1>Crear nuevos productos</h1>
<?php $url_action = base_url . "Producto/save";?>
<?php endif;?>

<form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">


<label for="nombre">Nombre:</label>
<input type="text" name="nombre" value="<?=isset($pro) && is_object($pro) ? $pro->nombre : '';?>">

<label for="descripcion">Descripcion</label>
<textarea name="descripcion"><?=isset($pro) && is_object($pro) ? $pro->descripcion : '';?></textarea>

<label for="precio">precio</label>
<input type="text" name="precio" value="<?=isset($pro) && is_object($pro) ? $pro->precio : '';?>">

<label for="stock">Stock</label>
<input type="number" name="stock" value="<?=isset($pro) && is_object($pro) ? $pro->stock : '';?>">


<label for="img">Imagen</label>
<?php if (isset($pro) && is_object($pro) && !empty($pro->imagen)): ?>
<img src="<?=base_url?>uploads/image/<?=$pro->imagen?>">
<?php endif;?>
<input type="file" name="imagen">


<label for="categoria">Categoria: </label>
<select name="categoria">
<?php $categorias = Utils::showCategorias();
while ($categoria = $categorias->fetch_object()):
?>
	<option value="<?=$categoria->id;?>" <?=isset($pro) && is_object($pro) && $categoria->id == $pro->categoria_id ? 'selected' : '';?>>
		<?=$categoria->nombre;?>
	</option>
<?php endwhile;?>

<input type="submit" value="Registrar">
</select>
</form>
