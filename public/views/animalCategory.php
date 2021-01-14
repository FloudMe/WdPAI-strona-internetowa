<!DOCTYPE html>
<html lang="en">
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
    <nav>
        <a href="projects" class="logo_a">
            <img src="public/img/logo.svg" class="svg_logo">
        </a>
        <ul>
            <li>
                <i class="fas fa-paw"></i>
                <a href="animalCategory" class="button">kategorie zwierzakow</a>
            </li>

            <li>
                <i class="fas fa-plus"></i>
                <a href="addProject" class="button">dodaj ogloszenie</a>
            </li>

            <li>
                <i class="fas fa-comments"></i>
                <a href="#" class="button">forum</a>
            </li>

            <li>
                <i class="fas fa-address-card"></i>
                <a href="#" class="button">profil</a>
            </li>
        </ul>
    </nav>
    <main>
        <header>
            Kategorie zwierzakow
        </header>
        <section class="category">
            <div class="category-1">
                <img src="../uploads/comment_1608609835eLDV4H3EmcT19LQhjcuB3s,w400.jpg">
                <div>

                    <h2>Nazwa zwierzeta</h2>
                    <p>opis</p>
                    <button>view</button>

                </div>
            </div>

<!--            --><?php //foreach ($animals_category as $category): ?>
<!--                <div id="--><?//= $category->getId(); ?><!--">-->
<!--                    <img src="public/uploads/--><?//= $category->getImage(); ?><!--">-->
<!--                    <div>-->
<!--                        <h2>--><?//= $category->getTitle(); ?><!--</h2>-->
<!--                        <p>--><?//= $category->getDescription(); ?><!--</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            --><?php //endforeach; ?>
        </section>
    </main>
</div>
</body>
</html>