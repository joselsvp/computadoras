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
                <h1 class=""><a href="<?= base_url ?>">Light<span style="color:#ebce00;">Store</span></a></h1>
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
                                <a href="<?=base_url?>producto/index?id=<?=base64_encode($categories['id'])?>">
                                    <?= $categories['icon']; ?>
                                    <span class="text nav-text" style="font-size: 14px"><?= ucfirst($categories['nombre']) ?></span>
                                </a>
                            </li>
                        </ul>
                        <?php
                    } ?>
                    <?php
                }
            }else{
                echo  "<strong>Lo sentimos, por el momento no hay categor&iacute;as. </strong>";
            }?>
        </div>
</nav>