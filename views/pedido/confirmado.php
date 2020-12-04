<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'completado'): ?>
		<h1>Tu pedido se a confirmado </h1>
		<p>tu pedido ha sido guardado con exito, una vez que realices el pago, sera despachado a la direccion que registraste</p>
<hr>
		<?php if (isset($pedidos)): ?>

		<h3>Datos del pedido</h3>

			Numero de pedido: <?=$pedidos->id?> <br>
			Total a pagar: $<?=$pedidos->costo?><br>
			<h4>Productos</h4>
			<?php while ($pro = $producto->fetch_object()): ?>
            <div class="product">
                <a href="<?=base_url?>Producto/ver&id=<?=$pro->id?>">
                    <img src="<?=base_url?>uploads/image/<?=$pro->imagen?>" alt="" class="image">
                    <h4><?=$pro->nombre?></h4>
                    </a>
                    <p>Unidades: <?=$pro->unidades?></p>
                    <p>Precio: $<?=$pro->precio?></p>
            </div>
          <?php endwhile;?>
      <?php endif;?>
<?php else: ?>
		<h1>Tu pedido se a confirmado </h1>
<?php endif;?>