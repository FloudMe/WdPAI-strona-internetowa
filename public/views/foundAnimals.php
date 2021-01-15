<!DOCTYPE html>
<?php if(isset($_COOKIE['user'])):?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/83463c4962.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/foundAnimals.css">
    <script type="text/javascript" src="./public/js/search.js" defer></script>

    <title>Category</title>
</head>
<body>
    <div class="base-container">
        <?php include 'nav.php'?>
        <main>
            <header>
                <div class="search-bar">
                    <input placeholder="search animal">
                </div>
            </header>
            <hr width="100%" size="1" color="black">
            <section class="animals">
<!--                <div class="animal-1">-->
<!--                    <img src="../uploads/comment_1608609835eLDV4H3EmcT19LQhjcuB3s,w400.jpg">-->
<!--                    <div>-->
<!---->
<!--                        <h2>Nazwa zwierzeta</h2>-->
<!--                        <p>opis</p>-->
<!--                        <div class="button-view">-->
<!--                            <button>view</button>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!--                </div>-->
                <?php foreach ($animals as $animal): ?>
                    <div id="<?= $animal->getId(); ?>">
                        <img src="public/uploads/<?= $animal->getImage(); ?>">
                        <div>
                            <h2><?= $animal->getTitle(); ?></h2>
                            <p><?= $animal->getDescription(); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>

            </section>
        </main>
    </div>
</body>

<template id="animal-template">
    <div id="">
        <img src="">
        <div>
            <h2>title</h2>
            <p>description</p>
        </div>
    </div>
</template>

<?php else: ?>
<?
$url = "http://$_SERVER[HTTP_HOST]";
header("Location: {$url}/");
return $this->render('login');?>
<?php endif; ?>