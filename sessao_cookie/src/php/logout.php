<?php
    function apagarUploads() {
        $pasta = scandir("../upload/");
        if(count($pasta) > 0) {
            for ($i=2; $i < count($pasta); $i++) { 
                unlink("../upload/" . $pasta[$i]);
            }
        }
        // echo "Uploads apagados com sucesso";
    }
    apagarUploads();

    session_start();
    session_destroy();
    unset( $_SESSION );

    if (isset($_SERVER['HTTP_COOKIE'])) {
        $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
        foreach($cookies as $cookie) {
            $parts = explode('=', $cookie);
            $name = trim($parts[0]);
            setcookie($name, '', time()-1000);
            setcookie($name, '', time()-1000, '/');
        }
    }

    echo 'Logout realizado com sucesso. <script> setTimeout(() => window.location.href = "../../index.html", 1000); </script>';
?>