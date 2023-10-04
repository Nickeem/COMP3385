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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <form action="index.php" method="post">
        <div>
            <label for="username">Enter Username: </label>
            <input type="text" id="username" name="username">
            <p class="error username <?php if ($username_error != '') {echo 'show';}?>"> <?php echo $username_error ?> </p>
        </div> 
        
        <div>
            <label for="email">Enter Email: </label>
            <input type="email" id="email" name="email" required>
            <p class="error email <?php if ($email_error != '') {echo 'show';}?>"> <?php echo $email_error ?></p>
        </div>
        <div>
            <label for="password">Enter password: </label>
            <input type="password" id="password" name="password">
            <p class="error password <?php if ($email_error != '') {echo 'show';}?>"> <?php echo $password_error ?></p>
        </div>
         
         
         <!--<label for="confirm_password"><input type="text" id="confirm_password"></label> -->
         <input type="submit"  value="Submit">
    </form>
</body>
</html>

<!--
    There  needs to be a model that checks if the username is unique
-->