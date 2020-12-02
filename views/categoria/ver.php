<?php if (isset($cat)): ?>
<h1>Categoria <?=$cat->nombre?></h1>
<?php else: ?>
    <h1>La categoria no existe</h1>
<?php endif;?>
<?php if ($productos->num_rows == 0): ?>
    <h2>No hay productos en la categoria</h2>
<?php else: ?>
<?php while ($pro = $productos->fetch_object()): ?>
     <div class="product">
        <a href="<?=base_url?>Producto/ver&id=<?=$pro->id?>">
                    <img src="<?=base_url?>uploads/image/<?=$pro->imagen?>" alt="" class="image">
                    <h4><?=$pro->nombre?></h4>
                    </a>
                    <p>$<?=$pro->precio?></p>
                    <a href="<?=base_url?>Carrito/add&id=<?=$pro->id?>" class="button">comprar</a>
            </div>
    <?php endwhile;?>

<?php endif;?>
