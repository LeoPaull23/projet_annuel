<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tp blog</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
<?php include('connexionbase.php'); ?>
    <header>
        <h1>TP BLOG</h1>
        <p>Accueil</p>
    </header>

    <nav>
        <a href="#">Accueil</a>
        <a href="ajouter.php">Poster !!</a>
    </nav>  

    <div id="body2">
        <?php 
        $requete = 'SELECT p.*, a.FirstName, a.LastName, c.Name
        FROM post p
        LEFT JOIN author a ON a.Id=p.Author_Id
        LEFT JOIN category c ON c.Id=p.Category_Id';
        $ex_requete = $pdo ->prepare($requete);
        $ex_requete->execute();
        $res_requete = $ex_requete->fetchAll();
        foreach ($res_requete as $valeur) {
              
            echo '<a id="post" href="detail.php?idpost='.$valeur['Id'].'"><div ><h2 class=h2>' .$valeur['Title']. '</h2>'. ' par '.'<h3 class=h3>' .$valeur['FirstName'].' ' .$valeur['LastName'] .'</h3>' 
               
              .'<h4 class=h4>'.'"'.substr($valeur['Contents'],0,100).'"' .'</h4>'
              .'<p class=p>' .$valeur['CreationTimestamp'].' ' .$valeur['Name'] .'</p></div></a>'      
            
            ;

            
            
        }
        
        
        
        ?>
    </div>





    <footer id='footer'>
        <p>&copy; </p>
    </footer>

</body>
</html>