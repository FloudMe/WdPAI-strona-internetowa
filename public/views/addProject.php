<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/83463c4962.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/addProject.css">
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
               <input name="imie-psa" type="text" placeholder="imie psa">
               <input name="addres" type="text" placeholder="adres">
               <input name="locality" type="text" placeholder="miejscowosc">
               <label for="coutry">Kraj</label>
               <select name="country" id="coutry">
                   <option value="polska">Polska</option>
                   <option value="niemcy">Niemcy</option>
                   <option value="francja">Francja</option>
               </select>
               <input name="phone-number" type="text" placeholder="numer telefonu">
               <textarea name="description" rows="5" placeholder="opis"></textarea>

               <input type="file" name="file">
               <button type="subtmit">send</button>
           </form>
        </section>
    </main>
</div>
</body>
</html>