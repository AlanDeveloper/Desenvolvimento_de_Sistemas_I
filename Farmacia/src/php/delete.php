<?php
    include_once('serverDAO.php');
    include_once('medicament.php');

    $server = new serverDAO();
    $info = explode('=', $_SERVER["REQUEST_URI"])[1];
    $server->delete($info);
?>