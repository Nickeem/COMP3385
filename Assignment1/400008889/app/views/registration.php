<?php
    $username_error = ''; 
    $email_error = ''; 
    $password_error = '';

    if (isset($validation_results)) {
       if(!$validation_results['username']) {
            $username_error = 'Username is not unique. Choose another username.';
       }

       if(!$validation_results['email']) {
            $email_error = 'Email address is invalid.';
       }
       
       if(!$validation_results['password']) {
            $password_error = 'The passord must be at least 10 characters, contain a number and uppercase character';
       }
    }
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pico.min.css">
    <title>Registration</title>
</head>
<body>
    <main class="container">
    <form action="index.php" method="post">
        

        <fieldset>
            <label for="username">
                Enter Username: 
                <input type="text" id="username" name="username" placeholder="Username" required  <?php if ($username_error != '') {echo "aria-invalid=\"true\"";} ?>>
                <small class="error username <?php if ($username_error != '') {echo 'show';}?>"> <?php echo $username_error ?> </small>
            </label>
        </fieldset>
            
            <label for="email">
                Enter Email: 
                <input type="email" id="email" name="email" placeholder="Email" required <?php if ($email_error != '') {echo "aria-invalid=\"true\"";}?>  >
                <small class="error email <?php if ($email_error != '') {echo 'show';}?>"> <?php echo $email_error ?></small>
            </label>

        
    
        <label for="password">
            Enter password:
            <input type="password" id="password" name="password" placeholder="Password" required <?php if ($email_error != '') {echo "aria-invalid=\"true\"";}?>>
            <small class="error password <?php if ($email_error != '') {echo 'show';}?>"> <?php echo $password_error ?></small>
        </label>
       
     
     
        <!--<label for="confirm_password"><input type="text" id="confirm_password"></label> -->
        <input type="submit"  value="Register">
   
</form>
    </main>
    

    
</body>
</html>

<!--
    There  needs to be a model that checks if the username is unique
-->