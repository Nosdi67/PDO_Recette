<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
</head>
<body>
        <div id="wrapper">
            <header>
                <nav>
                    <ul>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="info_recette.php">Recettes</a></li>
                    </ul>
                </nav>
            </header>

            <?php if(isset($indexRecette)) { echo $indexRecette; } ?>
            <?php if(isset($infoRecette)) { echo $infoRecette; }?>

            
        </div>
</body>
</html>

<style>
    #wrapper{
        
        width: 100%;
        height: 100vh;
        
    }
    header{
        width: 100%;
        height: 100px;
        
    }
    nav{
        display: flex;
        justify-content: space-around;
    }
    ul{
        display: flex;
        list-style: none;
    }
    li{
        margin: 0 20px;
    }
    a{
        text-decoration: none;
        color: black;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 2px;
        transition: 0.5s;
        border-bottom: 2px solid transparent;
        padding-bottom: 5px;
        margin-bottom: 5px;
        border-radius: 5px;
    }
</style>