<?php if (isset($_SESSION['usuario'])): ?>
<h1>Hacer  pedido</h1>

<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'completado'): ?>
		<strong class="alert-green">Pedido registrado con exito</strong>
		<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'fallido'): ?>
		<strong class="alert-red">Error, no se registró  el pedido</strong>
	<?php endif;?>
	<?php Utils::deleteSession('pedido');?>
<h3>Direccion para el pedido</h3>
<form action="<?=base_url?>Pedido/add"method="POST">
	<label for="ciudad">Ciudad:</label>
	<input type="text" name="ciudad">

	<label for="barrio">Barrio</label>
	<input type="text" name="barrio" required>

	<label for="direccion">Direccion</label>
	<input type="text" name="direccion" required>

<input type="submit" value="confirmar" required>
</form>


<?php else: ?>
<h1>Necesitas iniciar sesion  para hacer el pedido</h1>
<?php endif;?>
