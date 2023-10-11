
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pico.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Dashboard</title>
</head>
<body>
    <?php
        include_once('../tpl/header.html');
    ?>
    <main class="container">

        

        <div class="grid">
            <div><?php echo $accessLevel . ": ". $_SESSION["username"] ?></div>
            <div></div>
            <div><?php echo "Email: ". $_SESSION["email"] ?></div>
        </div>

        <div class="parent">
            <?php
                if ($accessLevel == "Research Group Manager" || ($accessLevel == "Research Study Manager"))
                {
                    echo '<div ><a href="#" role="button" class="contrast outline">Create New Study</a></div>';
                }
            ?>
            
            <?php
                if ($accessLevel == "Research Group Manager" || $accessLevel == "Research Study Manager" || $accessLevel == "Researcher")
                {
                    echo '<div ><a href="#" role="button" class="contrast outline">View All Studies</a></div>';
                }
            ?>
            
            <?php
                if ($accessLevel == "Research Group Manager" || $accessLevel == "Research Study Manager" )
                {
                    echo '<div ><a href="#" role="button" class="contrast outline">Delete Previous Study</a></div>';
                }
            ?>
            
            <?php
                if ($accessLevel == "Research Group Manager")
                {
                    echo '<div ><a href="./CreateUser/" role="button" class="contrast outline">Create New Researchers</a></div>';
                }
            ?>     
            
        </div>

    </main>
    
    <?php
        include_once('../tpl/footer.html');
    ?>


            
        
    </form>
</body>
</html>