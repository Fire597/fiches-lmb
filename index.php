<?php

$updated = false;
$created = false;

if (isset($_POST['nom']) AND 
    isset($_POST['prenom']) AND 
    isset($_POST['classe']) AND 
    isset($_POST['date']) AND 
    isset($_POST['sexe']) AND 
    isset($_POST['synthese']) AND 
    isset($_POST['XXXXX ADD MORE HERE XXXXX'])) {
    
    // If id is passed -> update existing one
    if (isset($_POST['id'])) {
        $req = $bdd->prepare("UPDATE TABLE_NAME SET Nom = ?, Prenom = ?, Classe = ?, Date = ?, Sexe = ?, Synthese = ?, XXXXX = ? WHERE Id = ?");
        $req->execute(array(htmlspecialchars($_POST['nom']),
                            htmlspecialchars($_POST['prenom']), 
                            htmlspecialchars($_POST['classe']), 
                            htmlspecialchars($_POST['date']), 
                            htmlspecialchars($_POST['sexe']), 
                            htmlspecialchars($_POST['synthese']), 
                            htmlspecialchars($_POST['XXXXXXXXXXXXXXXXX']), 
                            htmlspecialchars($_POST['id'])));
    } else { // Create a new entry
        $res = $bdd->prepare("INSERT INTO TABLE_NAME(...) VALUES(?, ?, ?, ?, ?, ?, ?)");
        $res->execute(array(htmlspecialchars($_POST['nom']),
                            htmlspecialchars($_POST['prenom']), 
                            htmlspecialchars($_POST['classe']), 
                            htmlspecialchars($_POST['date']), 
                            htmlspecialchars($_POST['sexe']), 
                            htmlspecialchars($_POST['synthese']), 
                            htmlspecialchars($_POST['XXXXXXXXXXXXXXXXX'])));
    }
} elseif (isset($_GET['s'])) { // If search is requested
    // TODO: Do search here across DB
    // Allez Hugo démerde-toi pour faire ça avec $bdd comme connexion, je veux le fetch() et tout hein !
    // Mets tous les résultats dans un tableau qu'on traitera plus tard. On fera une fonction genre displayResults(array);
} elseif (isset($_GET['id'])) {
    // TODO: Show sheet once extracted from database
} elseif (isset($_GET['create'])) {
    // TODO: Show creation page here
} else {
    // TODO: Show main search page here
}

?>
 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Fiches élèves</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>

    <body>
        <div class="title"><h1 class="center">Fiches élèves</h1></div>
        
        <div class="wrapper">
            <form method="post" action="?">
                <div class="row">
                    <div class="col25">
                        <label class="test" for="nom">Nom :</label>
                        <input tabindex="1" type="text" name="nom" id="nom" placeholder="Entrez un nom" />
                    </div>
                    
                    <div class="col25">
                        <label for="prenom">Prénom :</label>
                        <input tabindex="2" type="text" name="prenom" id="prenom" placeholder="Entrez un prénom" />
                    </div>
                    <div class="col25">
                        <label for="classe">Classe :</label>
                        <input tabindex="3" type="text" name="classe" id="classe" placeholder="Entrez la classe" />
                    </div>
                    <div class="col25">
                        <label for="date">Date :</label>
                        <input tabindex="4" type="date" name="date" id="date" placeholder="Entrez la classe" />
                    </div>
                </div>
                
                <div class="row space-before">
                    <div class="col25 quote-left">
                        <div class="row">
                            <input type="radio" name="sexe" value="M" id="M" />
                            <label class="normal" for="M">M</label>
                        </div>
                        <div class="row">
                            <input type="radio" name="sexe" value="F" id="F" checked />
                            <label class="normal" for="F">F</label>
                        </div>
                    </div>
                    
                    <div class="col50">
                        <textarea id="synthese" name="synthese"></textarea>
                    </div>
                </div>
                
                <div class="row space-before">
                    <button class="saveButton" type="submit">Sauvegarder</button>
                </div>
            </form>
        </div>
    </body>
    <!--test commit-->
</html>
