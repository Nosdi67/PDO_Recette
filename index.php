<?php

$mysqlclient=new PDO("mysql:host=localhost;dbname=recette","root","");

$query=$mysqlclient->query("SELECT * FROM recette INNER JOIN categorie ON recette.id_categorie=categorie.id_categorie");
$query->execute();
$recette=$query->fetchAll();




?>

        <table>
            <tr>
                <th>Nom</th>
                <th>Temps de preparation</th>
                <th>Categorie</th>
            </tr>
            <?php foreach($recette as $recettes):?>
                <tr>
                    <td><?php echo $recettes['nom_recette'];?></td>
                    <td><?php echo $recettes['temps_preparation']."Min";?></td>
                    <td><?php echo $recettes['nom_categorie'];?></td>
                    <?php endforeach;?>
                </tr>
        </table>
        

        <style>
            table{
                border: 1px solid black;
                max-width: 600px;
                max-height: 600px;
            }
            th{
               width: 200px;
               text-align: center;
            }
            td {
               text-align: center;
               padding: 5px;
            }
        </style>
