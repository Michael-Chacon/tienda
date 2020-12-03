<h1>Carrito de la compra</h1>
<div class="carrito">
<?php $stats = Utils::statsCarrito();?>
<h3>Total = $<?=$stats['total']?></h3>
<a href="" class="button button-pedido">Hacer pedido</a>
</div>
<br>
<table>
	<tr>
		<th>Imagen</th>
		<th>Nombre</th>
		<th>Precio</th>
		<th>Unidades</th>
	</tr>
	<?php foreach ($carrito as $ndice => $elemento):
          $producto = $elemento['producto'];
          ?>
																				<tr>
																					<td><img src="<?=base_url?>/uploads/image/<?=$producto->imagen?>" alt="" class="logo"></td>
																					<td><a href="<?=base_url?>/Producto/ver&id=<?=$producto->id?>"><?=$producto->nombre?></a></td>
																					<td><?=$producto->precio?></td>
																					<td><?=$elemento['unidades']?></td>
																				</tr>
																			<?php endforeach;?>
</table>
