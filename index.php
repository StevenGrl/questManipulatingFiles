<?php include('inc/head.php');


function lister($chemin)
{

    //nom du répertoire à lister
    $nom_repertoire = $chemin;

    //on ouvre un pointeur sur le repertoire
    $pointeur = opendir($nom_repertoire);
    //pour chaque fichier et dossier
    $i = 1;
    while ($fichier = readdir($pointeur)) {
        //on ne traite pas les . et ..
        if (($fichier != '.') && ($fichier != '..') && ($fichier != '.DS_Store')) {
            //si c'est un dossier, on le lit
            if (is_dir($nom_repertoire . '/' . $fichier)) {
                $i = preg_match_all('/\//', $nom_repertoire) + 1;
                for ($j = 0; $j < $i; $j++) {
                    echo "&nbsp;&nbsp;";
                }
                echo '|';
                echo "<img src='http://chittagongit.com/images/transparent-folder-icon/transparent-folder-icon-9.jpg' 
alt='' width='20px'>  $fichier&nbsp;";
                echo '<a class="glyphicon" href="deleteDirectory.php?name=' . $nom_repertoire . '/' . $fichier.'">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a><br/>';
                lister($nom_repertoire . '/' . $fichier);
            } else {
                for ($j = 0; $j < $i * 3; $j++) {
                    echo "&nbsp;&nbsp;";
                }
                //c'est un fichier, on l'affiche
                echo "|-->&nbsp;<img src='https://cdn4.iconfinder.com/data/icons/48-bubbles/48/12.File-512.png'
alt='' width='20px'>&nbsp;";
                $extension = substr($fichier, -3, 3);
                if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif') {
                    echo '<a class="link" href="' . $nom_repertoire . '/' . $fichier . '">'. $fichier . '</a>';
                } else {
                    echo '<a class="link" href="openFile.php?nameFile=' . $nom_repertoire . '/' . $fichier . '">'. $fichier . '</a>';
                }
                echo '&nbsp;<a class="glyphicon" href="deleteFile.php?name=' . $nom_repertoire . '/' . $fichier . '">
<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a><br/>';
            }
        }
    }
    //fermeture du pointeur
    closedir($pointeur);
}

$src_dir = "files";
echo '<img src=\'http://chittagongit.com/images/transparent-folder-icon/transparent-folder-icon-9.jpg\' 
alt=\'\' width=\'20px\'> Files<br/>';
lister($src_dir);


include('inc/foot.php'); ?>