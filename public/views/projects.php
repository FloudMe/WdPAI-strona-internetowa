<!DOCTYPE html>
<?php if(isset($_COOKIE['user'])):?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/83463c4962.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">

    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <title>Projets</title>
</head>
<body>
    <div class="base-container">
        <?php include 'nav.php'?>
        <main>
            <header>
                <div class="text-why">
                    Dlaczego warto zaadaptować zwierzaka?
                </div>

            </header>
            <hr width="100%" size="1" color="black">
            <section class="projects">
                <div>Oto 10 powodów dlaczego warto adoptować psa ze schroniska:</div>

                <ol>
                    <li>zyskasz wiernego przyjaciela,
                        który nigdy Ciebie nie zawiedzie, nie zdradzi i będzie Ciebie kochał miłością bezwarunkową do końca swoich dni
                    </li>
                    <li>możesz ocalić mu życie,
                        całkiem dosłownie możesz uratować pieskie życie – ciągle bowiem zdarzają się przypadki „humanitarnej” eutanazji, która bywa jedynym
                        lekiem na przepełnione i niedofinansowane przytuliska
                    </li>
                    <li>poczujesz się dobrze,
                        zważywszy na wszystkie fizyczne, psychiczne i emocjonalne korzyści związane z posiadaniem psa – masz szanse spotęgować je wielokrotnie
                        - adoptując psiaka ze schroniska
                    </li>
                    <li>nie będziesz brał udziału w nieetycznej „produkcji” zwierząt,
                        może dzięki temu choć jedna pseudo hodowla zamknie swoje czarne podboje
                    </li>
                    <li>zaoszczędzisz pieniądze,
                        otrzymasz bowiem psiaka zupełnie za darmo, zaoszczędzając sporą kwotę, która zwykle wiąże się z zakupem psa u hodowcy
                    </li>
                    <li>otrzymasz zdrowego psiaka
                        z pewnością Twój przyjaciel będzie zaszczepiony, odrobaczony, zachipowany i przebadany pod kątem ewentualnych chorób, o których
                        dowiesz się przed adopcją - schroniska zwykle dbają o swoich podopiecznych - masz zatem gwarancje, że wszystkie
                        potrzebne i konieczne zabiegi są wykonywane na czas
                    </li>
                    <li>
                        // tekst z https://lalazoo.pl/blog/post/10-powodow-dla-ktorych-warto-adoptowa-psa-ze-schroniska
                    </li>
                </ol>

            </section>
        </main>
    </div>
</body>

<?php else: ?>
<?
$url = "http://$_SERVER[HTTP_HOST]";
header("Location: {$url}/");
return $this->render('login');?>
<?php endif; ?>