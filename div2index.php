<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href= "assets/styles.css">
    <title>stopcovirus</title>
</head>
<body>
    <header>
    <h1> le cocoronavirus </h1>





</heder>
<main>

<section id = "attestation de sorte">
<h2>FORMULAIRE DE DECLARATION POUR ATTESTATION</h2>

<form action="" method="POST">
                <input type="text" name="nom" required placeholder="votre nom">
                <input type="text" name="prenom" required placeholder="votre prenom">
                <textarea name="adresse" cols="60" rows="6" required placeholder="votre adresse"></textarea>
                <input type="text" name="date" value="<?php echo date("Y-m-d H:i:s") ?>">

                <h3>cocher la raison de votre déplacement</h3>

                <label>
                    <input type="radio" name="raison" required value="courses alimentaires">
                    <span>courses alimentaires</span>
                </label>

                <label>
                    <input type="radio" name="raison" required value="travail">
                    <span>travail</span>
                </label>

                <label>
                    <input type="radio" name="raison" required value="aide aux proches">
                    <span>aide aux proches</span>
                </label>

                <label>
                    <input type="radio" name="raison" required value="necessité médicale">
                    <span>nécessité médicale</span>
                </label>

                <label>
                    <input type="radio" name="raison" required value="necessité familiale">
                    <span>necessité familiale</span>
                </label>

                <label>
                    <input type="radio" name="raison" required value="sortie sport individuel">
                    <span>sortie sport individuel</span>
                </label>

                <button type="submit">enregistrer mon attestation</button>


                <input type="hidden" name="identifiantFormulaire" value="declaration">
                
                <div class="confirmation">  
                
                
                <?php

function filtrer ($name)
{
    
    $info = $_REQUEST[$name] ?? "";


    return $info;
}


function insererLigneSQL($nomTable, $tabAsso)
{
    
    $requeteSQL =
<<<CODESQL
INSERT INTO $nomTable
(nom, prenom, adresse, raison, numero, dateDeclaration) 
VALUES 
(:nom, :prenom, :adresse, :raison, :numero, :dateDeclaration) 
CODESQL;
    
    $pdo = new PDO("mysql:host=localhost;dbname=attestation;charset=utf8;","root","");

   
    $pdoStatement = $pdo->prepare($requeteSQL);

    $pdoStatement->execute($tabAsso);

    

}





$identifiantFormulaire = filtrer("identifiantFormulaire");

if ($identifiantFormulaire == "declaration")
{


    $tabAssoColonneValeur = [
//        "nom"     => $_REQUEST["nom"] ?? "",
        "nom"       => filtrer("nom"),
        "prenom"    => filtrer("prenom"),
        "adresse"   => filtrer("adresse"),
        "raison"    => filtrer("raison"),
    ];
    
    extract($tabAssoColonneValeur);
    if ( $nom != ""
         && $prenom != ""
         && $adresse != ""
         && $raison != "")
         {
            
            $tabAssoColonneValeur["numero"] = uniqid();
            
            $tabAssoColonneValeur["dateDeclaration"] = date("Y-m-d H:i:s");

    
            insererLigneSQL("declaration", $tabAssoColonneValeur);
            
            echo "votre déclaration est bien enregistrée. NOTEZ BIEN VOTRE NUMERO D'ATTESTATION {$tabAssoColonneValeur["numero"]}";
    }
    else
    {
        echo "VEUILLEZ FOURNIR TOUTES LES INFORMATIONS SVP...";
    }

}

?>
           </div>
            </form>
              </section>








        
              <section>
    <h2>OUTIL POUR VERIFIER LE NUMERO D'ATTESTATION</h2>
    <p>pour que un policier/gendarme puisse vérifier le numéro fourni par une personne dans la rue</p>
    <p>le citoyen doit fournir son numero d'attestation</p>
    <p>et on va verifier si le numero existe et quelles sont les infos associées à ce numéro...</p>
    <!-- SELON LE STANDARD, SI ON FAIT UNE LECTURE ALORS ON UTILISE UNE method="GET" -->
    <form action="" method="GET">
        <!-- PARTIE VISIBLE -->
        <input type="text" required name="numero" placeholder="entre le numéro d'attestation">
        <button type="submit">recherche</button>
        
        <input type="hidden" name="identifiantFormulaire" value="verifier">
        <div class="confirmation">
<?php



$identifiantFormulaire = filtrer("identifiantFormulaire");
if ($identifiantFormulaire == "verifier")
{

    
    $tabAssoColonneValeur = [
        "numero"       => filtrer("numero"),
    ];
        
   
    extract($tabAssoColonneValeur);
    if ($numero != "")
    {
    
        $requeteSQL =
<<<CODESQL
SELECT * 
FROM declaration
WHERE 
numero = :numero
CODESQL;

$pdo = new PDO("mysql:host=localhost;dbname=attestation;charset=utf8;","root","");

        
         $pdoStatement = $pdo->prepare($requeteSQL);
    

       
        $pdoStatement->execute($tabAssoColonneValeur);

        
        $pdoStatement->debugDumpParams();

      
        $tabLigneTrouvees = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        
/*
Array
(
    [0] => Array
        (
            [id] => 2
            [nom] => zindine
            [prenom] => zidane
            [adresse] => madride
            [raison] => sortie sport individuel
            [numero] => 5e70d7d6af452
            [dateDeclaration] => 0000-00-00 00:00:00
        )
)
*/

        
        $nbLigneTrouvees = count($tabLigneTrouvees);
        echo "<h2>IL Y A $nbLigneTrouvees RESULTAT SUR LE NUMERO $numero</h2>";

    
        foreach($tabLigneTrouvees as $tabLigne)
        {
            
            extract($tabLigne);

            echo 
<<<CODEHTML
            <article>
                <h3>$nom</h3>
                <h4>$prenom</h4>
                <p>$adresse</p>
                <p>$raison</p>
                <h5>$dateDeclaration</h5>
                <h5>$numero</h5>
            </article>
CODEHTML;
        }
       
    }
    else
    {
        
        echo "IL FAUT FOURNIR UN NUMERO";
    }
  
}

?>
        </div>

    </form>
</section>
        
        



    
    
    

    
    

    <section> 
    <img src="assets/image/photocoronavirus.jpg" alt="photo coronavirus">
 
 <h2> Qu’est-ce que le nouveau coronavirus ?</h2><nav class=slide>
<p> Les coronavirus (surnommés CoV) sont une famille de virus plus ou moins sévères : selon le site 
du gouvernement, ils peuvent provoquer de simples rhumes ou des pathologies plus lourdes telles que le syndrome respiratoire du Moyen-Orient (MERS) et le syndrome respiratoire aigu sévère (SRAS). Aujourd’hui, on en connaît six espèces. 
Le nouveau coronavirus découvert en 2019 a été baptisé SARS-CoV-2 et la maladie qu’il entraîne, CoVid-19.</p>
</secton> </nav>

<section> 
<h2>Quel est le mode de transmission ?</h2>
<p> La transmission interhumaine, c’est-à-dire de personne à personne, a rapidement été confirmée. 
La maladie se transmet par les voies respiratoires,
 par les postillons (éternuements, toux). Le gouvernement explique que l’“on considère qu’un contact étroit avec 
 une personne malade est nécessaire pour transmettre la maladie : même lieu de vie, contact direct à moins d’un mètre lors d’une toux, d’un éternuement ou une discussion en l’absence de mesures de protection".

Une  récente étude chinoise publiée dans The Lancet a par
 ailleurs montré que la durée moyenne de l'excrétion virale, définie comme l'expulsion des particules
  virales du corps, était de 20 jours chez des personnes considérées comme guéries de
   l'infection à CoVid-19, c'est-à-dire ne présentant plus de symptômes. Chez les 54 personnes décédées étudiées, le virus était détectable du début de la maladie jusqu'à leur mort.

Néanmoins, le directeur général de l’Organisation mondiale de la santé
 (OMS) Tedros Adhanom Ghebreyesus a déclaré le 3 mars 2020 qu'il est peu probable 
 que les porteurs du virus asymptomatiques soient très contagieux : "Avec la grippe, les personnes infectées mais asymptomatiques sont des moteurs de transmission importants, ce qui ne semble pas être le cas avec le CoVid-19. Des données chinoises montrent que seulement 1 % des cas rapportés sont asymptomatiques, et la plupart des cas développent des symptômes dans les deux jours suivant l’infection".

Aucun autre mode de transmission n’a à ce jour été identifié. Il est
 donc peu probable que la maladie se transmette par l’eau, ou encore par les colis en provenance de Chine, comme 
 le craignaient certaines personnes.</p>
 </section>

 <section>
<<h2>Quels sont les symptômes du coronavirus COVID-19 ?</h2>
<p>La société américaine Web MD, qui fournit des informations de santé, 
a repris une analyse de l'Organisation Mondiale de la Santé. Celle-ci a été menée auprès de 55 924 cas confirmés en Chine, pour en savoir plus sur le virus et ses symptômes. 
Voici les signes les plus fréquents et le pourcentage de personnes qui en ont souffert, d'après l'étude :

Fièvre : 88% ; 
Toux sèche : 68% ; 
Fatigue: 38% ;
Expectorations ou flegme épais des poumons: 33% ;
Essoufflement: 19% ; 
Douleurs osseuses ou articulaires: 15% ;
Maux de gorge: 14% ;
Maux de tête: 14% ;
Frissons: 11% ;
Nausées ou vomissements: 5% ;
Nez bouché: 5% ;
Diarrhée: 4% ;
Toux de sang: 1% ;
Yeux gonflés: 1%.
Par ailleurs, le directeur général de la Santé Jérôme Salomon a expliqué dans un point presse donné le 20 mars que le conseil professionnel des spécialistes d’oto-rhino-laryngologie (ORL) observait chez les personnes atteintes de CoVid-19 une "recrudescence des cas d’anosmie brutale, qui correspond à la disparition brutale de l’odorat, sans obstruction du nez, sans écoulement et qui peut donc survenir de façon isolée". Cette perte d'odorat peut en revanche s'accompagner d'une perte de goût (agueusie), "surtout chez les sujets les plus jeunes", souligne un tweet du ministère de la Santé. Bien qu'il s'agisse de symptômes rares, ce dernier invite les personnes e
souffrant à demander un avis médical par téléphone "pour savoir si oui ou non un traitement spécifique est nécessaire".
</p>
</section>


    </main>


     <footer>
 
 
    </footer>
    <script src="assets/app.js"></script>
</body>
</html>