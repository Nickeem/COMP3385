<?php
    $login_error = ''; 

    if (isset($isLoginValid)) {
       if(!$isLoginValid) {
            $login_error = 'Invalid email/password';
       }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/pico.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Login</title>
</head>
<body>
    <main class="container">
        <h1>Login</h1>
        <form action="./" method="post">

            <div class="grid">
                <div></div>
                <div>
                    <label for="email">Enter Email </label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div></div>
            </div>
        

            <div class="grid">
                <div></div>
                <div>
                    <label for="password">Enter password </label>
                    <input type="password"  name="password" id="password" required>   
                </div>
                <div></div>
            </div>

              
            <div class="grid">
                <div></div>
                <div><small class="login-error error"> <?php echo $login_error."<br>" ?></small></div>
                <div></div>
            </div>

            <div class="grid">
                <div></div>
                <div>
                    <input type="submit" value="Login">
                    <p>
                        <a href="../Registration/">Register</a>
                    </p>
                    
                </div>
                <div></div>
            </div>

        </form>
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