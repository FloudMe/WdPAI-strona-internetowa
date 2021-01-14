<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/83463c4962.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/addProject.css">
    <title>addProjects</title>
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
            <div class="add-ad-text">
                    Dodaj ogloszenie
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
               <div>
                   <input name="imie-psa" type="text" placeholder="imie zwierzecia">
                   <input name="addres" type="text" placeholder="adres">
                   <input name="locality" type="text" placeholder="miejscowosc">
                   <div class="select-country">
                       <label for="coutry">Kraj</label>
                       <select name="country" id="coutry">
                           <option value="polska">Polska</option>
                           <option value="niemcy">Niemcy</option>
                           <option value="francja">Francja</option>
                       </select>
                   </div>
                   <input name="phone-number" type="text" placeholder="numer telefonu">
               </div>
               <div>
                   <textarea name="description" rows="5" placeholder="opis"></textarea>

                   <input type="file" name="file">

                   <button type="subtmit">send</button>
               </div>

           </form>
        </section>
    </main>
</div>
</body>
</html>