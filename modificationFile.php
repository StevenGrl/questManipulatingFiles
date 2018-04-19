<?php

if (!empty($_GET['fileName']) && !empty($_GET['fileContent'])) {
    $pointeur = fopen($_GET['fileName'], 'w+');
    fwrite($pointeur, $_GET['fileContent']);
    fclose($pointeur);

    header('Location: index.php');
    exit();
}