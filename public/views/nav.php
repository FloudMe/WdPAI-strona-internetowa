<nav>
    <a href="projects" class="logo_a">
        <img src="public/img/logo.svg" class="svg_logo">
        <i class="fas fa-bars"></i>
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

        <?php if(isset($_COOKIE['user'])):?>
            <?php
            $userRepository = new UserRepository();
            $user = $userRepository->getUser($_COOKIE['user']);
            if($user->getEnable() == 1) :?>
                <li>
                    <i class="fas fa-plus"></i>
                    <a href="addCategory" class="button">Dodaj kategorie</a>
                </li>
            <?php endif;?>
        <?php endif;?>

        <form class="logout_form" method="get" action="logout">
            <button name="logout" value="true" class="logout-button">Log off</button>
        </form>

        <li class="end-text">
            <i class="fas fa-address-card"></i>
            <a href="#" class="button">profil</a>
        </li>
    </ul>

</nav>
