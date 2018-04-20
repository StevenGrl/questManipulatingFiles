<?php

if (!empty($_GET['name'])) {
    if (is_dir($_GET['name'])) {
        removeDirectory($_GET['name']);
    }
}

function removeDirectory($nom_repertoire)
{
    $pointeur = opendir($nom_repertoire);
    while ($fichier = readdir($pointeur)) {
        if (($fichier != '.') && ($fichier != '..') && ($fichier != '.DS_Store')) {
            if (is_dir($nom_repertoire . '/' . $fichier)) {
                removeDirectory($nom_repertoire . '/' . $fichier);
            } else {
                unlink($nom_repertoire . '/' .$fichier);
            }
        }
    }
    rmdir($nom_repertoire);
}

header('Location: index.php');
exit();