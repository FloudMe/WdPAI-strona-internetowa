<!DOCTYPE html>

<?php //if(isset($_COOKIE['user'])):?>

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
    <?php include 'nav.php'?>
    <main>
        <header>
            <div class="add-ad-text">
                Dodaj ogloszenie
            </div>
        </header>
        <hr width="100%" size="1" color="black">
        <section class="projects-form">
            <form action="addCategory" method="POST" enctype="multipart/form-data">
                <?php if(isset($messages))
                {
                    foreach ($messages as $message)
                    {
                        echo $message;
                    }
                }
                ?>
                <div>
                    <input name="name-animal-category" type="text" placeholder="nazwa zwierzecia">
                    <textarea name="description" rows="5" placeholder="opis"></textarea>

                    <input type="file" name="file">

                    <button type="subtmit">send</button>
                </div>

            </form>
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