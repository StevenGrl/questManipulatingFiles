<?php
include('inc/head.php');

if (!empty($_GET['nameFile'])) {
    ?>
    <form action="modificationFile.php">
        <input type="hidden" name="fileName" value="<?= $_GET['nameFile']; ?>">
        <textarea name="fileContent" id="" cols="0" rows="30"><?php readfile($_GET['nameFile'])?></textarea>
        <input type="submit" value="Send modifications">
    </form>
<?php
}

include('inc/foot.php');