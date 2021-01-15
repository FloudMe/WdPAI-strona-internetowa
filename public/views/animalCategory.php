<!DOCTYPE html>

<?php //if(isset($_COOKIE['user'])):?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/83463c4962.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/project.css">
    <title>Category</title>
</head>
<body>
<div class="base-container">
    <?php include 'nav.php'?>
    <main>
        <header>
            Kategorie zwierzakow
        </header>
        <hr width="100%" size="1" color="black">
        <section class="category">
<!--            <div class="category-1">-->
<!--                <img src="../uploads/comment_1608609835eLDV4H3EmcT19LQhjcuB3s,w400.jpg">-->
<!--                <div>-->
<!---->
<!--                    <h2>Nazwa zwierzeta</h2>-->
<!--                    <p>opis</p>-->
<!--                    <button>view</button>-->
<!---->
<!--                </div>-->
<!--            </div>-->

            <?php foreach ($animals_category as $category): ?>
                <div id="<?= $category->getId(); ?>">
                    <img src="public/uploads/<?= $category->getImage(); ?>">
                    <div>
                        <h2><?= $category->getName(); ?></h2>
                        <p><?= $category->getDescription(); ?></p>

                        <button>view</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    </main>
</div>
</body>

<?php //else: ?>
<?//
//$url = "http://$_SERVER[HTTP_HOST]";
//header("Location: {$url}/");
//return $this->render('login');?>
<?php //endif; ?>