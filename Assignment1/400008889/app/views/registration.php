<?php
    // $username_error = ''; 
    // $email_error = ''; 
    // $password_error = '';

    // if (isset($validation_results)) {
    //    if(!$validation_results['username']) {
    //         $username_error = 'Username is not unique. Choose another username.';
    //    }

    //    if(!$validation_results['email']) {
    //         $email_error = 'Email address is invalid.';
    //    }
       
    //    if(!$validation_results['password']) {
    //         $password_error = 'The password must be at least 10 characters, contain a number and uppercase character';
    //    }
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/pico.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Registration</title>
</head>
<body>
    <main class="container">
        <h1>Registration</h1>
    <form action="./" method="post">
        
        <div class="grid">
            <div></div>
            <div>
                <label for="username">
                    Enter Username: 
                    <input type="text" id="username" name="username" placeholder="Username" required  <?php if ($username_error != '') {echo "aria-invalid=\"true\"";} ?>>
                    <small class="error-username error"> <?php echo $username_error ?> </small>
                </label>
            </div>
            <div></div>
        </div>
        
        
        <div class="grid">
            <div></div>
            <div>
                <label for="email">
                    Enter Email: 
                    <input type="email" id="email" name="email" placeholder="Email" required <?php if ($email_error != '') {echo "aria-invalid=\"true\"";}?>  >
                    <small class="error-email error"> <?php echo $email_error ?></small>
                </label>
            </div>
            <div></div>
        </div>
        
     
        
        <div class="grid">
            <div></div>
            <div>
                <label for="password">
                    Enter password:
                    <input type="password" id="password" name="password" placeholder="Password" required <?php if ($password_error != '') {echo "aria-invalid=\"true\"";}?>>
                    <small class="error-password error"> <?php echo $password_error ?></small>
                </label>
            </div>
            <div></div>
        </div>
       
       
        <div class="grid">
        <div></div>
        <div>
            <input type="submit"  value="Register" role="button">
            <p><a href="../Login/">Login</a></p>
        </div>
        
        <div></div>
        </div>
     
        <!--<label for="confirm_password"><input type="text" id="confirm_password"></label> -->
        
   
</form>
    </main>
    

    <script>
        document.querySelectorAll('input').forEach(element => {
            element.addEventListener('input', (event) => {
                let id = event.target.id;
                document.querySelector(`.error-${id}`).innerHTML = '';
                event.target.setAttribute('aria-invalid', '');
            })
        });
        
    </script>
</body>
</html>

<!--
    There  needs to be a model that checks if the username is unique
-->