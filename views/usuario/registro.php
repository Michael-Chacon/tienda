<h1>Registrarse</h1>
<?php

if (isset($_SESSION['register']) && $_SESSION['register'] == 'completado'): ?>
	<strong class="alert-green">Re a generado el registro correctamente</strong>
	<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'fallo'): ?>
		<strong class="alert-red">Registro fallido, intriduce bien los datos</strong>
	<?php endif;?>
	<?php Utils::deleteSession('register');?>
<form action="<?=base_url?>Usuario/save" method="POST">
	<label for="nombre">Nombre</label>
	<input type="text" name="nombre" required>

	<label for="apellidos">Apellidos</label>
	<input type="text" name="apellidos" required>

	<label for="email">Email</label>
	<input type="text" name="email" required>

	<label for="password">Contraseña</label>
	<input type="password" name="password" required>

	<input type="submit" value="Registrarse">
</form>
