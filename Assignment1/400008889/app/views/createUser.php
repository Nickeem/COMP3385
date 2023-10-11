
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/pico.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Dashboard - Create User</title>
</head>
<body>
    <?php
        include_once('../../tpl/header.html');
    ?>
    <main class="container">

        

        <div class="grid">
            <div><?php echo $accessLevel . ": ". $_SESSION["username"] ?></div>
            <div></div>
            <div><?php echo "Email: ". $_SESSION["email"] ?></div>
        </div>

        <div class="container">
            <h1>Create User</h1>
            <form action="" method="POST">
                <label for="username">
                    Enter Username: 
                    <input type="text" id="username" name="username" placeholder="Username" required  <?php if ($username_error != '') {echo "aria-invalid=\"true\"";} ?>>
                    <small class="error username <?php if ($username_error != '') {echo 'show';}?>"> <?php echo $username_error ?> </small>
                </label>
        
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

                <label for="roles">Role:</label>
                    <select id="roles" name="role" required>
                        <?php 
                            foreach ($roles as $role)
                            {
                                echo '<option value="'. $role['role'].'" selected>'.$role['role'].'</option>';
                            }   
                        ?>
                </select>

                <div class="grid">
                    <div></div>
                    <div>
                        <input type="submit"  value="Create User" role="button">
                        <p><a href="../">Home</a></p>
                    </div>
                    <div></div>
                </div>

            </form>
        </div>

    </main>
    
    <?php
        include_once('../../tpl/footer.html');
    ?>


            
        
    </form>
</body>
</html>