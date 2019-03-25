<?php
    function pagUsuario() {
        $html = '<head><link rel="stylesheet" href="src/css/style.css"><title>Glote</title></head>
        <nav><ul><li class="logout"><a href="src/php/logout.php">Sair</a></li>
        <li>Logotipo</li><li class="register">' . $_SESSION["user"] . '</li></ul></nav>
        <form action="src/php/upload.php" method="POST" enctype="multipart/form-data"><input type="file" name="fileUpload"><input type="submit" value="Enviar"></form>';

        $fp = fopen("../../main.html" , "w");
        $fw = fwrite($fp, $html);

    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $_SESSION["user"] = trim($_POST["user"]);
        $_SESSION["email"] = trim($_POST["email"]);
        $_SESSION["password"] = trim($_POST["password"]);
        pagUsuario();

        setcookie("user", $_SESSION["user"], time() + (60 * 5), "/");
        setcookie("email", $_SESSION["email"], time() + (60 * 5), "/");
        setcookie("password", $_SESSION["password"], time() + (60 * 5), "/");

        echo '<title>Loading...</title><script> setTimeout(() => window.location.href = "../../main.html", 500); </script>';
    }
?>