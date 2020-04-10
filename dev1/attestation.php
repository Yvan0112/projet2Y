<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projet2Y</title>
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
    <header>
    
    <nav class=slide>
            <ul>
                <li><a href="index.php">Menu Principal</a></li>
                <li><a href="accueil.php">Accueil</a></li>
                <li><a href="symptomes.php">Informations essentielles</a></li>
                <li><a href="attestation.php">Attestation dérogatoire</a></li>
                <li><a href="contact.php">Contact et N° utiles</a></li>
            </ul>
        
</header>
<main id = "haut">
<h1>"STOP COVIRUS"</h1>
</nav>
        <div id="menu">Menu</div>
        </nav>
        
            <h2>ATTESTATION DE DEPLACEMENT DEROGATOIRE</h2>
            <span>En application de l’article 3 du décret du    23 mars 2020    prescrivant les mesures générales nécessaires pour faire face à l’épidémie de Covid19 dans le cadre de l’état d’urgence sanitaire</span>
            <p> Je soussigné(e),</p>
            <form action="" method="POST">
                <span>Mme/M :</span>
                <input type="text" name="nom" required placeholder="votre nom et prénom">
                <span>Né(e) le :</span>
                <input type="datetime" name="dateNaissance" required placeholder="Date de Naissance">
                <span>Demeurant : </span>
                <textarea name="adresse" cols="60" rows="6" required placeholder="votre adresse"></textarea>
                <p>certifie que mon déplacement est lié au motif suivant (cocher la case) autorisé par l’article 3 du décret du 23 mars 2020 prescrivant les mesures générales nécessaires pour faire face à l’épidémie de Covid19 dans le cadre de l’état d’urgence sanitaire.</p>
                <h3>cocher la raison de votre déplacement</h3>

                <label>
                    <input type="radio" name="raison" required value="travail">
                    <span>Déplacements entre le domicile et le lieu d’exercice de l’activité professionnelle, lorsqu’ils sont indispensables à l’exercice d’activités ne pouvant être organisées sous forme de télétravail ou déplacements professionnels ne pouvant être différés</span>
                </label>

                <label>
                    <input type="radio" name="raison" required value="courses alimentaires">
                    <span>Déplacements pour effectuer des achats de fournitures nécessaires à l’activité professionnelle et des achats de première nécessité dans des établissements dont les activités demeurent autorisées (liste sur gouvernement.fr).</span>
                </label>

                <label>
                    <input type="radio" name="raison" required value="necessité médicale">
                    <span>Consultations et soins ne pouvant être assurés à distance et ne pouvant être différés ; consultations et soins des patients atteints d'une affection de longue durée.</span>
                </label>

                <label>
                    <input type="radio" name="raison" required value="aide aux proches">
                    <span>Déplacements pour motif familial impérieux, pour l’assistance aux personnes vulnérables ou la garde d’enfants.</span>
                </label>

                <label>
                    <input type="radio" name="raison" required value="sortie sport individuel">
                    <span>Déplacements brefs,dans la limite d'une heure quotidienne et dans un rayon maximal d'un kilomètre autour du domicile,liés soit à l'activité physique individuelle des personnes, à l'exclusion de toute pratique sportive collective et de toute proximité avec d'autres personnes,soit à la promenade avec les seules personnes regroupées dans un même domicile, soit aux besoins des animaux de compagnie.</span>
                </label>

                <label>
                    <input type="radio" name="raison" required value="convocation">
                    <span>Convocation judiciaire ou administrative.</span>
                </label>
                <label>
                    <input type="radio" name="raison" required value="mission">
                    <span>Participation à des missions d'intérêt général sur demande de l'autorité administrative.</span>
                </label>
                <span>Fait à :</span>
                <input type="text" name="lieu" required placeholder="votre lieu">
                <span>Le :</span>
                <input type="datetime" name="dateDeclaration" required placeholder="Date de déclaration">
                    

                <button type="submit">enregistrer ma déclaration</button>
                <input type="hidden" name="identifiantFormulaire" value="formulaire">
                <div class="confirmation">
<?php

require_once"php/functions.php";

$identifiantFormulaire = filtrer("identifiantFormulaire");

if ($identifiantFormulaire == "formulaire")
{
    $tabAssoColonneValeur = ["nom" => filtrer("nom"),
                             "dateNaissance" => filtrer("dateNaissance"),
                             "adresse" => filtrer("adresse"),
                             "raison" => filtrer("raison"),
                             "lieu" => filtrer("lieu"),
                             "dateDeclaration" => filtrer("dateDeclaration"),
                             ];
    extract($tabAssoColonneValeur);
    if ( $nom != ""
        && $dateNaissance != ""
        && $adresse != ""
        && $raison != ""
        && $lieu !="")
        
     { 
        
        $tabAssoColonneValeur["dateDeclaration"] = date("Y-m-d H:i:s");
        
        insererLigneSQL("formulaire", $tabAssoColonneValeur);

        echo "votre déclaration est bien enregistrée. Le {$tabAssoColonneValeur["dateDeclaration"]}";
    }
    else
    {
        echo "VEUILLEZ FOURNIR TOUTES LES INFORMATIONS SVP...";
    }

}

?>


            </div>
        </form>
</main>
<footer>
         <p class="revenir"><a href="#haut" title="revenir en haut de la page">haut</a></p> 
</footer> 
    <script src="assets/js/app.js"></script>
   
    
</body>
</html>