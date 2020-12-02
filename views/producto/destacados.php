<h1>Algunos de nuestros productos</h1>
<?php while ($pro = $producto->fetch_object()): ?>
            <div class="product">
                <a href="<?=base_url?>Producto/ver&id=<?=$pro->id?>">
                    <img src="<?=base_url?>uploads/image/<?=$pro->imagen?>" alt="" class="image">
                    <h4><?=$pro->nombre?></h4>
                    </a>
                    <p>$<?=$pro->precio?></p>
                    <a href="<?=base_url?>Carrito/add&id=<?=$pro->id?>" class="button">comprar</a>
            </div>
          <?php endwhile;?>
        </div>
