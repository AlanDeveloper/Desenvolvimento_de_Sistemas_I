<?php
    include_once('serverDAO.php');
    include_once('medicament.php');

    $server = new serverDAO();
    
    $_POST['controll'] = $_POST['controll'] == 'Sim' ? 'yes' : 'no';
    $object = new Medicament($_POST['name'], $_POST['manufacture'], $_POST['amount'],$_POST['controll'], $_POST['price']);
    $object->setCod($_POST['cod']);

    $server->update($object)
?>