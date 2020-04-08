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
    <h1>"STOP COVIRUS"</h1>
    <nav class=slide>
            <ul>
                <li><a href="index.php">Menu Principal</a></li>
                <li><a href="accueil.php">Accueil</a></li>
                <li><a href="symptomes.php">Informations essentielles</a></li>
                <li><a href="attestation.php">Attestation dérogatoire</a></li>
                <li><a href="contact.php">Contact et N° utiles</a></li>
            </ul>
        </nav>
        <div id="menu">Menu</div>
        </nav>
        <section>
            <h2>ATTESTATION DE DEPLACEMENT DEROGATOIRE</h2>
            <span>En application de l’article 3 du décret du    23 mars 2020    prescrivant les mesures générales nécessaires pour faire face à l’épidémie de Covid19 dans le cadre de l’état d’urgence sanitaire</span>
            <span> Je soussigné(e),</span>
            <form action="" method="POST">
                <span>Mme/M :</span>
                <input type="text" name="nom" required placeholder="votre nom et prénom">
                <span>Né(e) le :</span>
                <input type="datetime" name="dateNaissance" required placeholder="Date de Naissance">
                <span>Demeurant : </span>
                <textarea name="adresse" cols="60" rows="6" required placeholder="votre adresse"></textarea>
                <span>certifie que mon déplacement est lié au motif suivant (cocher la case) autorisé par l’article    3 du décret du 23 mars 2020 prescrivant les mesures générales nécessaires pour faire face à l’épidémie de covid19</span>
                <h3>cocher la raison de votre déplacement</h3>

                <label>
                    <input type="radio" name="raison" required value="courses alimentaires">
                    <span>cDéplacement  s entr e le domicil  e et le lieu d’exerci  ce de l’activit  é professionnelle, lorsqu’ils s   ont in dispensables à l’exercice d  ’activités n   e p ouvant ê  tre o rganisées s   ous forme de télétravail ou déplacement  s professionnel   s ne  pou vant êtr e différés2</span>
                </label>

                <label>
                    <input type="radio" name="raison" required value="travail">
                    <span>Déplacement    s pou r effectue  r de s achat s de f ourniture  s nécessaire  s à l’activité professionnelle et des  achats   de  première   nécessité3dans  des  établissements dont  les activités   demeurent   autorisées   (liste sur gouv</span>
                </label>

                <label>
                    <input type="radio" name="raison" required value="aide aux proches">
                    <span></span>
                </label>

                <label>
                    <input type="radio" name="raison" required value="necessité médicale">
                    <span></span>
                </label>

                <label>
                    <input type="radio" name="raison" required value="necessité familiale">
                    <span></span>
                </label>

                <label>
                    <input type="radio" name="raison" required value="sortie sport individuel">
                    <span></span>
                </label>

                <button type="submit">enregistrer ma déclaration</button>
                <input type="hidden" name="identifiantFormulaire" value="declaration">
                <div class="confirmation">


                </div>
            </form>
        </section>

      
        <script src="assets/js/app.js"></script>
    <p class="revenir"><a href="#haut" title="revenir en haut de la page">haut</a></p>
    
</body>
</html>