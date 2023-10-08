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
        <form action="">
            <label for="email">Enter Email </label>
            <input type="email" name="email" required>


            <label for="password">Enter password </label>
            <input type="password"  name="password" required>     

            <small class="error password "> <?php echo $login_error ?></small>

            <div class="grid">
                <div></div>
                <input type="submit" value="Login">
                <div></div>
            </div>
        </form>
    </main>
    


            
        
    </form>
</body>
</html>