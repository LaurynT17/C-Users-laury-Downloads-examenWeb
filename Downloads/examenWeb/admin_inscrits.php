
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administration - Liste des inscrits</title>
    
</head>
<body>

<h1>Administration - Liste des inscrits</h1>

<?php


$fichier = fopen("inscrits.txt", "r");

if ($fichier) {
    
    // pour recupere la taille du fichier
    $taille = filesize("inscrits.txt");
    
    // 2. pour verifier si le fichier est vide ou n'existe pas
    if ($taille == 0) {
        echo '<p style="color: #666; font-style: italic;">Aucun inscrit pour l\'instant.</p>';
        fclose($fichier);
    } else {
        
        // pour lire le contenu du fichier
        $contenu = fread($fichier, $taille);
        fclose($fichier);
        
        // Compter le nombre de ligne d'inscrits
    
        $nbInscrits = substr_count($contenu, "\n");
        
        // Afficher le nombre total d'inscrits
        echo '<div class="total">';
        echo 'Nombre total d\'inscrits : <strong>' . $nbInscrits . '</strong>';
        echo '</div>';
        
        // 3. Lire le fichier avec fgets()
        $fichier = fopen("inscrits.txt", "r");
        
        // 4. pour afficher les inscrits dans un tableau HTML
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Prénom</th>';
        echo '<th>Email</th>';
        echo '<th>Niveau</th>';
        echo '<th>Date d\'inscription</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        
        while (($ligne = fgets($fichier)) !== false) {
            
            $ligne = trim($ligne);
            
            // pour ignorer les lignes vides
            if (empty($ligne)) {
                continue;
            }
            
            // 4. Découper les champs avec explode " | "
            $champs = explode(" | ", $ligne);
            
            // Vérifier qu'on a bien 4 champs
            if (count($champs) == 4) {
                $prenom = htmlspecialchars($champs[0]);
                $email = htmlspecialchars($champs[1]);
                $niveau = htmlspecialchars($champs[2]);
                $date = htmlspecialchars($champs[3]);
                
                // 5. Afficher la ligne dans le tableau
                echo '<tr>';
                echo '<td>' . $prenom . '</td>';
                echo '<td>' . $email . '</td>';
                echo '<td>' . $niveau . '</td>';
                echo '<td>' . $date . '</td>';
                echo '</tr>';
            }
        }
        
        echo '</tbody>';
        echo '</table>';
        
        fclose($fichier);
    }
    
} else {
    // Si le fichier n'existe pas ou ne peut pas être ouvert
    echo 'Aucun inscrit pour l\'instant.</p>';
}
?>

</body>
</html>