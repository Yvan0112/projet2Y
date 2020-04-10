<?php

// --------------------------------------------------------------
// DECLARATIONS DE NOS FONCTIONS
// --------------------------------------------------------------


function filtrer ($name)
{
    // SECURITE: ?? "" => SI LE NAVIGATEUR N'ENVOIE PAS L'INFO, ON PREND COMME VALEUR PAR DEFAUT ""
    $info = $_REQUEST[$name] ?? "";
    // ON POURRA RAJOUTER PLUS DE SECURITE
    // ...

    return $info;
}

// ETAPE 1: DECLARATION DE LA FONCTION

function insererLigneSQL($nomTable, $tabAsso)
{
    // MAINTENANT JE PEUX CONSTRUIRE LA REQUETE SQL PREPAREE
    $requeteSQL =
<<<CODESQL
INSERT INTO $nomTable
(nom, dateNaissance, adresse, raison, lieu, dateDeclaration) 
VALUES 
(:nom, :dateNaissance, :adresse, :raison, :lieu, :dateDeclaration) 
CODESQL;
    // ENSUITE, ON VA ENVOYER LA REQUETE SQL PREPAREE
    // CONNECTER A SQL
    
    // ETAPE1: CONNECTER PHP A SQL
    
    $pdo = new PDO("mysql:host=localhost;dbname=attestderogatoire;charset=utf8;", "root", "");

    // ETAPE2a: ON ENVOIE LA REQUETE PREPAREE
    
    $pdoStatement = $pdo->prepare($requeteSQL);

    // ETAPE2b: ON FOURNIT LES DONNEES EXTERIEURES A PART
    $pdoStatement->execute($tabAsso);

   

}