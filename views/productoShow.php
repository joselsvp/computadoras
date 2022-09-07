<?php
$getCategories = $categories;
$getProducts = $products;
$product = $product_content;

?>

<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="/assets/main.css">
    <link rel="stylesheet" href="/assets/show.css">
    <script src="/assets/app.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

    <title>LightStore</title>
</head>

<body>
<nav class="sidebar close">
    <header>
        <div class="image-text">
            <div class="text logo-text">
                <h1 class="">Light<span style="color:#ebce00;">Store</span></h1>
            </div>
        </div>

        <i class="fas fa-chevron-right toggle"></i>
    </header>

    <div class="menu-bar">
        <div class="menu">
            <?php
            if (!empty($getCategories)) {
                foreach ($getCategories as $categories) {
                    if ($categories['categoria_hija'] == 0) { ?>
                        <ul class="menu-links">
                            <li class="nav-link">
                                <a href="#" class="category text nav-tex" id="<?= $categories['id'] ?>">
                                    <?= $categories['icon'] ?> &nbsp; <?= ucfirst($categories['nombre']) ?>
                                    <i class="fas fa-caret-down" style="margin-left: 10px"></i>
                                </a>
                            </li>
                        </ul>
                        <?php
                    } else { ?>
                        <ul class="menu-links subcategorias_<?= $categories['categoria_hija'] ?>"
                            style="display: none; margin-left: 8px; font-size: 14px">
                            <li class="nav-link">
                                <a href="#">
                                    <?= $categories['icon']; ?>
                                    <span class="text nav-text"
                                          style="font-size: 14px"><?= ucfirst($categories['nombre']) ?></span>
                                </a>
                            </li>
                        </ul>
                        <?php
                    } ?>
                    <?php
                }
            } else {
                echo "<strong>Lo sentimos, por el momento no hay categor&iacute;as. </strong>";
            } ?>
        </div>
</nav>

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

        <div class="card" style="width: 800px">
            <div class="" style="padding: 20px">
                <span class="tag tag-color">Bueno</span>

                <span class="clasificacion" style="text-align: right">
                    <input id="radio1" type="radio" name="estrellas" value="5"><!--
                    --><label for="radio1">★</label><!--
                    --><input id="radio2" type="radio" name="estrellas" value="4"><!--
                    --><label for="radio2">★</label><!--
                    --><input id="radio3" type="radio" name="estrellas" value="3" checked><!--
                    --><label for="radio3">★</label><!--
                    --><input id="radio4" type="radio" name="estrellas" value="2"><!--
                    --><label for="radio4">★</label><!--
                    --><input id="radio5" type="radio" name="estrellas" value="1"><!--
                    --><label for="radio5">★</label>
                </span>
                <p class="content-product"><strong><?= $product['modelo'] ?></strong></p>

            </div>
        </div>
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
