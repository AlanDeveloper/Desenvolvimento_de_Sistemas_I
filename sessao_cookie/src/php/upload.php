<?php
    require('classSequence.php');

   if(isset($_FILES['fileUpload'])){
      //Definindo timezone padrão
      date_default_timezone_set("Brazil/East");

      $file = new Sequence();
      $file->setName($_FILES['fileUpload']['name']);

      $dir = 'uploads/'; //Diretório para uploads

      move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir . $file->getName());
    }
    // var_dump($_FILES['fileUpload'][$dir]);
    print_r($_FILES['fileUpload']);
?>
<a href="../../upload.html">Enviar arquivo</a>
<a href="logout.php">Sair</a>