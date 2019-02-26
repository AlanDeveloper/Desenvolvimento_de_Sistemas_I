<title>Loja</title>
<?php
    $codigo = $_POST["codigo"];
    $nome = $_POST["nome"];
    $qnt = $_POST["qnt"];
    $preco = $_POST["preco"];

    try {
        gravar($codigo, $nome, $qnt, $preco);
    } catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }

    function gravar($cod, $nome, $qnt, $preco) {
        $documento = "{$cod};{$nome};{$qnt};{$preco};\n";
        $arquivo = 'produtos.txt';
        $abrir = fopen($arquivo, "a");
        $gravar = fwrite($abrir, $documento);
        fclose($abrir);
        if($gravar) {
            echo "Gravado!";
        } else {
            throw new Exception('Não gravado!');
        }
    }
?>
<br><br><button id="back">Voltar ao menu</button>
<script>
    const back = document.querySelector('#back');
    back.addEventListener('click', () => window.location.href = "index.html");
</script>
