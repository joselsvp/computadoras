<?php
$getCategories = $categories;
$getProducts = $products;
$nameProduct = $nameProduct;

require_once 'sidebar.php'
?>


<section class="home">
    <div class="text"> <?= ucfirst($nameProduct['nombre']) ?></div>

    <div class="container">
        <div class="container-cards">
            <?php
            if (!empty($getProducts)){
                foreach ($getProducts as $key => $product){
                    ?>
                    <a href="<?=base_url?>producto/show?id=<?=base64_encode($product['id'])?>" title="Ver <?= $product['modelo'] ?>">
                        <div class="card">
                            <?php
                            if(isset($product['destacado'])){
                                if ($product['destacado']){?>
                                    <div class="product-famous"><i class="fas fa-star"></i> Producto destacado</div>
                                    <?php
                                }
                            }

                            if(isset($product['vendido'])){
                                if ($product['vendido']){?>
                                    <div class="product-famous" style="color: #2b9f06"><i class="fas fa-star"></i> Producto más vendido</div>
                                    <?php
                                }
                            }
                            ?>
                            <div class="card-header" style="text-align: center">
                                <img src="<?= $product['url_image'] ?>" alt="<?= $product['modelo'] ?>" style="background-position: center; background-size: cover; background-repeat: no-repeat; background-attachment: fixed; width: 200px">
                            </div>
                            <div class="card-body">
                                <span class="tag tag-color"><?= $product['categoria'] ?></span>
                                <p class="content-product"><?= $product['modelo'] ?></p>
                                <span class="price-product">$ <?= number_format($product['precio'], 2) ?> MXN</span>

                                <div class="user">
                                    <i class="fas fa-users"></i>
                                    <div class="user-info">
                                        <h5>Comentarios <span style="color: #5018da"><?= $product['cantidad_comentarios']?></span></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php
                }
            }else{
                echo  "<strong>Lo sentimos, por el momento no hay registro de productos. </strong>";
            }
            ?>
        </div>
    </div>
</section>
<script>
    const category = document.querySelectorAll('.category');
    for (let i = 0; i < category.length; i++) {
        category[i].addEventListener("click", e => {
            console.log(category[i].id)
            subcategories('subcategorias_'+parseInt(category[i].id), 'block'); // Shows
        })
    }

    function subcategories(className, displayState){
        var elements = document.getElementsByClassName(className)
        for (var i = 0; i < elements.length; i++){
            elements[i].style.display = displayState;
        }
    }
</script>
</body>
