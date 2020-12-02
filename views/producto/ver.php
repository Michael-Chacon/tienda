<?php if (isset($pro)): ?>
<h1><?=$pro->nombre?></h1>
<div class="detalles-product">

		 <img src="<?=base_url?>uploads/image/<?=$pro->imagen?>" alt="" >

	<div class="datos">
		 <h2><?=$pro->descripcion?></h2>
		 <p>$<?=$pro->precio?></p>
		 <a href="<?=base_url?>Carrito/add&id=<?=$pro->id?>" class="button">Comprar</a>
	</div>
 </div>
<?php else: ?>
	<h1>El producto no existe </h1>
	<?php endif;?>