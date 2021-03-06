<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Login page</title>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="public/img/logo.svg">
        </div>
        <div class="login-container">
            <form class="login" action="login" method="POST">
                <div class=""message>
                    <?php if(isset($messages))
                        {
                            foreach ($messages as $message)
                            {
                                echo $message;
                            }
                        }
                        ?>
                </div>
                <input name="email" type="text" placeholder="email@email.com">
                <input name="password" type="password" placeholder="password">
                <div class="button-access">
                    <button class="login" type="submit">LOGIN</button>
                    <button class="register" onclick="location.href='register'" type="button">REGISTER</button>
                </div>

            </form>
        </div>
        
    </div>
</body>
</html>