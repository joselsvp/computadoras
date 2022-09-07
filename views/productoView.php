<?php
$getCategories = $categories;
$getProducts = $products;

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
            if (!empty($getCategories)){
                foreach ($getCategories as $categories){
                    if($categories['categoria_hija'] == 0 ){ ?>
                        <ul class="menu-links">
                            <li class="nav-link">
                                <a href="#" class="category text nav-tex" id="<?=$categories['id'] ?>">
                                    <?= $categories['icon']?> &nbsp; <?= ucfirst($categories['nombre']) ?>
                                    <i class="fas fa-caret-down" style="margin-left: 10px"></i>
                                </a>
                            </li>
                        </ul>
                        <?php
                    }else{ ?>
                        <ul class="menu-links subcategorias_<?=$categories['categoria_hija'] ?>" style="display: none; margin-left: 8px; font-size: 14px">
                            <li class="nav-link">
                                <a href="#">
                                    <?= $categories['icon']; ?>
                                    <span class="text nav-text" style="font-size: 14px"><?= ucfirst($categories['nombre']) ?></span>
                                </a>
                            </li>
                        </ul>
                        <?php
                    } ?>
                    <?php
                }
            }?>
        </div>
</nav>

<section class="home">
    <div class="text"><i class="fas fa-star"></i> Productos destacados</div>

    <div class="container">
        <div class="container-cards">
            <?php
            if (!empty($getProducts)){
                foreach ($getProducts as $key => $product){ ?>
                    <a href="" title="Ver <?= $product['modelo'] ?>">
                        <div class="card">
                            <div class="card-header" style="text-align: center">
                                <img src="<?= $product['url_image'] ?>" alt="<?= $product['modelo'] ?>" style="background-position: center; background-size: cover; background-repeat: no-repeat; background-attachment: fixed; width: 200px">
                            </div>
                            <div class="card-body">
                                <span class="tag tag-color"><?= $product['categoria'] ?></span>
                                <p class="content-product"><?= $product['modelo'] ?></p>
                                <div class="user">
                                    <i class="fas fa-users"></i>
                                    <div class="user-info">
                                        <h5>Comentarios</h5>
                                        <small>Ninguno</small>
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
