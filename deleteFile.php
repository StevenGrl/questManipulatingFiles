<?php

if (!empty($_GET['name'])) {
    if (file_exists($_GET['name'])) {
        unlink($_GET['name']);
    }
}

header('Location: index.php');
exit();