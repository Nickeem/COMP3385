<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$CSS_DIR ?>/pico.min.css">
    <link rel="stylesheet" href="<?=$CSS_DIR ?>/style.css">
    <title>Login</title>
</head>
<body>
    <main class="container">
        <h1>Login</h1>

        <?= $form ?>
        <div class="error"><?= $login_error ?></div>
    </main>
    
    <script>
        document.querySelectorAll('input').forEach(element => {
            element.addEventListener('input', (event) => {
                document.querySelector('.login-error').innerHTML = '';
            })
        });
    </script>

</body>
</html>