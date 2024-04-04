<?php
session_start();
ob_start();
$title="Recettes";

$mysqlclient=new PDO("mysql:host=localhost;dbname=recette","root","");

$query=$mysqlclient->query("SELECT DISTINCT recette.id_recette,  nom_recette, instructions, temps_preparation,categorie.nom_categorie,
                            -- GROUP_CONTACT pour concatener les ingredients + qunatite et 'g' sur une meme ligne avec un separateur ','
                            GROUP_CONCAT(CONCAT(ingredients.nom_ingredient, ' ', ingredient_recette.quantite, ' ', 'g') SEPARATOR ', ') AS liste_ingredient  
                            FROM recette
                            LEFT JOIN ingredient_recette ON ingredient_recette.id_recette = recette.id_recette
                            LEFT JOIN ingredients ON ingredients.id_ingredient = ingredient_recette.id_ingredient
                            LEFT JOIN categorie ON recette.id_categorie = categorie.id_categorie
                            GROUP BY 
                            recette.id_recette, 
                            nom_recette, 
                            instructions, 
                            temps_preparation, 
                            categorie.nom_categorie
                            ORDER BY 
                            nom_recette;


                            ");
$query->execute();
$recette=$query->fetchAll();


?>
    <div id="nav">
        <ul>
            <?php foreach($recette as $recettes):?>
                <li><a href="#<?php echo $recettes['id_recette'];?>"><?php echo $recettes['nom_recette'];?></a></li>
            <?php endforeach;?>
        </ul>
        
    </div>

       
    <div id="main">

    <?php foreach($recette as $recettes):?>
        <section id="<?php echo $recettes['id_recette'];?>">
            <header class="titreRecette"><?php echo $recettes['nom_recette'];?></header>
            
            <p><?php echo $recettes['instructions'];?></p>
            <p>Temps de préparation : <?php echo $recettes['temps_preparation'];?> minutes</p>
            <p>Catégorie : <?php echo $recettes['nom_categorie'];?></p>
            <p>Ingredients: <?php echo $recettes['liste_ingredient']?></p>
            <?php endforeach ?>                 
        </section>

    </div>







<style>
#nav{
    background-color: rgba(0, 22, 22, 0.2);
    position: fixed;
    padding: 10px;
    min-width: 290px;
    top: 0px;
    left: 0px;
    width: 300px;
    height: 100%;
    border-right: solid;
    border-color: rgba(0, 22, 22, 0.4);
}
#nav ul{
    display: flex;
    flex-direction: column;
}
#nav li{
    list-style: none;
    margin: 10px;
}
a:hover{
    opacity: 0.5;
}
#main{
    margin-left: 310px;
    padding: 20px;
    margin-bottom: 110px;
}

.titreRecette{
    text-align: start;
    font-size: x-large;
    margin:5px;
    padding-bottom: 20px;
    width: 100%;
    height: 0px;
    
}
nav{
    margin-left: 320px;
}


</style>

<?php
$infoRecette=ob_get_clean();
require("template.php");
?>