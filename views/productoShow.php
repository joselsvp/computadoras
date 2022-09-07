<?php
$getCategories = $categories;
$getProducts = $products;
$product = $product_content;
$getComments = $comments;
require_once 'sidebar.php'
?>

<section class="home">
    <div class="container-cards">
        <ul class="breadcrumb">
            <li class="breadcrumb__item breadcrumb__item-firstChild">
                <span class="breadcrumb__inner">
                <span class="breadcrumb__title"><?= $product['categoria']?></span>
                </span>
            </li>
        </ul>

        <div class="card">
            <div class="card-header" style="text-align: center">
                <img src="<?= $product['url_image'] ?>" alt="<?= $product['modelo'] ?>" style="background-position: center; background-size: cover; background-repeat: no-repeat; background-attachment: fixed; width: 200px">
            </div>
        </div>

        <div class="" style="width: 500px">
            <div class="card-body">
                <p class=""><?= $product['modelo'] ?></p>
                <p class="" style="margin-top: 10px"><strong>Especificaciones </strong><?= $product['especificaciones'] ?></p>

                <span style="font-size: 45px; font-weight: bold; color: #4016a5">$ <?= number_format($product['precio'], 2 ) ?> MXN</span>
            </div>
        </div>

    </div>
    <h2 style="text-align: center">Comentarios</h2>

    <div class="container-cards">
        <?php
        if(!empty($comments)){
            foreach ($comments as $comment){?>
                <div class="card" style="width: 100%; font-size: 12px; margin: 10px 40px;">
                    <div class="" style="padding: 20px">
                        <?php
                        switch ($comment['calificacion']){
                            case 1: ?>
                                <span class="tag tag-color-red">Malo</span> 1 estrella
                                <?php
                                break;
                            case 2:?>
                                <span class="tag tag-color-orange">Regular</span> 2 estrellas
                                <?php
                                break;
                            case 3:?>
                                <span class="tag tag-color-orange">Regular</span> 3 estrellas
                                <?php
                                break;
                            case 4:?>
                                <span class="tag tag-color-green">Bueno</span> 4 estrellas
                                <?php
                                break;
                            case 5:?>
                                <span class="tag tag-color-green">Excelente</span> 5 estrellas
                                <?php
                                break;
                            default:?> <span class="tag tag-color-green">Muy malo</span> 0 estrellas<?php
                                break;
                        }
                        ?>
                        <p class="content-product" style="font-size: 12px"><strong><?= $comment['nombre'] ?></strong></p>
                        <p><?= $comment['texto'] ?></p>
                    </div>
                </div>
            <?php
            }?>
        <?php
        }else{
            echo "<strong>Por el momento no hay comentarios.</strong>";
        }
        ?>
    </div>

</section>
<script>
    const category = document.querySelectorAll('.category');
    for (let i = 0; i < category.length; i++) {
        category[i].addEventListener("click", e => {
            console.log(category[i].id)
            subcategories('subcategorias_' + parseInt(category[i].id), 'block'); // Shows
        })
    }

    function subcategories(className, displayState) {
        var elements = document.getElementsByClassName(className)
        for (var i = 0; i < elements.length; i++) {
            elements[i].style.display = displayState;
        }
    }
</script>
</body>
