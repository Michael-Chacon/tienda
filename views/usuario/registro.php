<h1>Registrarse</h1>
<?php

if (isset($_SESSION['register']) && $_SESSION['register'] == 'completado'): ?>
	<strong>se a generado el registro correctamente</strong>
	<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'fallo'): ?>
		<strong>Registro fallido, intriduce bien los datos</strong>
	<?php endif;?>
	<?php Utils::deleteSession('register');?>
<form action="<?=base_url?>Usuario/save" method="POST">
	<label for="nombre">Nombre</label>
	<input type="text" name="nombre" >

	<label for="apellidos">Apellidos</label>
	<input type="text" name="apellidos" >

	<label for="email">Email</label>
	<input type="text" name="email" >

	<label for="password">Contraseña</label>
	<input type="password" name="password" >

	<input type="submit" value="Registrarse">
</form>
