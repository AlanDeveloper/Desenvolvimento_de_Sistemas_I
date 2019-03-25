<?php
   function Upload() {
      if(isset($_FILES['fileUpload'])){
         date_default_timezone_set("Brazil/East");
         $novoNome = date("Y.m.d-H.i.s");
         move_uploaded_file($_FILES['fileUpload']['tmp_name'], "../upload/" . $novoNome);
      }
   }
   function atualizarPag() {
      $html = '<head><link rel="stylesheet" href="src/css/style.css"><title>Glote</title></head>
      <nav><ul><li class="logout"><a href="index.html">Sair</a></li>
      <li>Logotipo</li><li class="register">' . $_COOKIE['user'] . '</li></ul></nav><form action="src/php/upload.php" method="POST" enctype="multipart/form-data"><input type="file" name="fileUpload"><input type="submit" value="Enviar"></form>
      <a href="table.html">Visualizar uploads</a>';

      $fp = fopen("../../upload.html", "w");
      $fw = fwrite($fp, $html);
   }

   Upload();
   atualizarPag();

   $pasta = scandir("../upload/");
   for ($i=2; $i < count($pasta); $i++) { 
      $html = $html . $pasta[$i] . '<br>';
      $tamanho = $tamanho . filesize("../upload/" . $pasta[$i]) . "kB<br>";
   }
   $html = '<head><link rel="stylesheet" href="src/css/style.css"><title>Glote</title></head>
   <nav><ul><li class="logout"><a href="src/php/logout.php">Sair</a></li>
   <li>Logotipo</li><li class="register">' . $_COOKIE['user'] . '</li></ul></nav>
   <table><caption>Arquivos</caption><thead><tr><th>Nome</th><th>Tamanho</th></tr></thead><tbody><tr><td>' . $html . '</td><td>' . $tamanho . '</td></tr></tbody></table><a href="src/php/pdf.php">Visualizar PDF</a>';

   $fp = fopen("../../table.html" , "w");
   $fw = fwrite($fp, $html);

   // header('location: ../../upload.html');
   echo '<title>Loading...</title><script> setTimeout(() => window.location.href = "../../upload.html", 500); </script>';
?>