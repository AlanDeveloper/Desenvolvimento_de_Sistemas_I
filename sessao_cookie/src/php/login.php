<?php
    // Expirar sessão após 5 mins
    session_cache_expire(5);
    $cache_expire = session_cache_expire();

     // Iniciando sessão
    session_start();

    if(isset($_SESSION['user'])){
        echo "Já esta registado como $_SESSION[user].</br>";

    } else if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user = trim($_POST["user"]);
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);

        if(!empty($user) && !empty($email) && !empty($password)){
            $_SESSION['email'] = $email;
            $_SESSION['user'] = $user;
            $_SESSION['email'] = $password;
     
            echo "Obrigado por se registar! <br />",
                "Usuario: $user <br />",
                "Email: $email <br />";
        }
    } else {
        echo "Por favor preencha ambos os campos! <br/>";
    }
?>
<a href="../../upload.html">Enviar arquivo</a>
<a href="logout.php">Sair</a>