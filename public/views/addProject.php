<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/83463c4962.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/project.css">
    <title>Projets</title>
</head>
<body>
<div class="base-container">
    <nav>
        <img src="public/img/logo.svg">
        <ul>
            <li>
                <i class="fas fa-paw"></i>
                <a href="#" class="button">kategorie zwierzakow</a>
            </li>

            <li>
                <i class="fas fa-plus"></i>
                <a href="#" class="button">dodaj ogloszenie</a>
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
            <div class="search-bar">
                <form>
                    <input placeholder="search project">
                </form>
            </div>
            <div class="add-project">
                Dlaczego warto zaadaptować zwierzaka?
            </div>
        </header>
        <section class="projects-form">
           <form action="addProject" method="POST" enctype="multipart/form-data">
               <?php if(isset($messages))
               {
                   foreach ($messages as $message)
                   {
                       echo $message;
                   }
               }
               ?>
               <input name="title" type="text" placeholder="title">
               <textarea name="description" rows="5" placeholder="description"></textarea>

               <input type="file" name="file">
               <button type="subtmit">send</button>
           </form>
        </section>
    </main>
</div>
</body>
</html>