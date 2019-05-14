<?php
    include_once('serverDAO.php');
    include_once('medicament.php');

    $server = new serverDAO();
    
    $object = new Medicament($_POST['name_medicament'], $_POST['name_manufacture'], $_POST['amount'],$_POST['control'], $_POST['price']);
    
    $server->insert($object)
?>