
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" <?=$CSS_DIR ?>/pico.min.css">
    <link rel="stylesheet" href="<?=$CSS_DIR ?>/style.css">
    <title>Dashboard</title>
</head>
<body>
    <header>
        <div class="container">
            <div class="flex-container">
                <div class="infinity">
                    ♾️
                </div>
                <div>
                    <a href="./Logout/" role="button" class="align-right">Log out</a>
                </div>
            </div>
        </div>
    </header>
    <main class="container">

        

        <div class="grid">
            <div><?= $username ?></div>
            <div></div>
            <div>Email: <?= $email ?></div>
        </div>

        <div class="parent">
            <?php
                if ($CreateNewStudy_allowed)
                {
                    echo '<div ><a href="#" role="button" class="contrast outline">Create New Study</a></div>';
                }
            ?>
            
            <?php
                if ($ViewAllStudies_allowed)
                {
                    echo '<div ><a href="#" role="button" class="contrast outline">View All Studies</a></div>';
                }
            ?>
            
            <?php
                if ($DeleteNewStudy_allowed)
                {
                    echo '<div ><a href="#" role="button" class="contrast outline">Delete Previous Study</a></div>';
                }
            ?>
            
            <?php
                if ($CreateNewResearcher_allowed)
                {
                    echo '<div ><a href="#" role="button" class="contrast outline">Create New Researchers</a></div>';
                }
            ?>     
            
        </div>

    </main>
    
    <footer>
        <hr>
        <div class="grid">
            <div></div>
            Copyright &copy Nickeem Payne-Deacon. All rights reserved
            <div></div>
        </div>
    </footer>


            
        
    </form>
</body>
</html>