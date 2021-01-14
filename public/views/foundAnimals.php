<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/83463c4962.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/foundAnimals.css">
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
                <div>
                Znalezione zwierzeta
                </div>
            </header>
            <section class="animals">
                <div class="animal-1">
                    <img src="../uploads/comment_1608609835eLDV4H3EmcT19LQhjcuB3s,w400.jpg">
                    <div>

                        <h2>Nazwa zwierzeta</h2>
                        <p>opis</p>
                        <div class="button-view">
                            <button>view</button>
                        </div>

                    </div>
                </div>
<!--                --><?php //foreach ($animals as $animal): ?>
<!--                    <div id="--><?//= $animal->getId(); ?><!--">-->
<!--                        <img src="public/uploads/--><?//= $animal->getImage(); ?><!--">-->
<!--                        <div>-->
<!--                            <h2>--><?//= $animal->getTitle(); ?><!--</h2>-->
<!--                            <p>--><?//= $animal->getDescription(); ?><!--</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                --><?php //endforeach; ?>

            </section>
        </main>
    </div>
</body>
</html>