<title>Loja</title>
<?php
    include('pecas.php');

    $arquivo = 'produtos.txt';
	if (file_exists($arquivo) ? true : false) {
		echo ler($arquivo);
	} else {
		echo "Arquivo não encontrado";
	}

    $PrecoMaisAlto = [];
    $MaiorQuantidade = [];
    $MaiorPrecoTotal = [];

    $string = file_get_contents($arquivo);
    for($contador = 3; count(explode(';', $string)) > $contador; $contador += 4) {
        array_push($PrecoMaisAlto, explode(';', $string)[$contador]);
        array_push($MaiorQuantidade, explode(';', $string)[$contador - 1]);
        array_push($MaiorPrecoTotal, explode(';', $string)[$contador] * explode(';', $string)[$contador - 1]);
    }
    sort($PrecoMaisAlto);
    sort($MaiorQuantidade);
    sort($MaiorPrecoTotal);
    
    echo '<br> Maior preço: ' . $PrecoMaisAlto[count($PrecoMaisAlto) - 1];
    echo '<br>Maior quantidade: ' . $MaiorQuantidade[count($MaiorQuantidade) - 1];
    echo '<br>Produto de maior preço total: ' . $MaiorPrecoTotal[count($MaiorQuantidade) - 1];
    
    function ler($arquivo){
        $abrir = fopen($arquivo, "r");
        $conteudo = fread($abrir, filesize($arquivo));
        $vetor = [];
        echo '<h3>Produtos</h3>';
        for ($i = 0; $i <= count(explode(';', $conteudo)) - 2; $i+= 4) {
            $obj = new Pecas(
                explode(';', $conteudo)[$i],
                explode(';', $conteudo)[$i + 1],
                explode(';', $conteudo)[$i + 2],
                explode(';', $conteudo)[$i + 3]
            );
            array_push($vetor, $obj);
            echo 'Código: ' . $obj->getCodigo() . ' Nome: ' . $obj->getNome() . ' Quantidade: ' . $obj->getQuantidade() . ' Preço: ' . $obj->getPreco() . '<br>';
        }
        fclose($abrir);
    }
?>

<button id="back">Voltar ao menu</button>
<button id="refresh">Atualizar Página</button>
<script>
    const back = document.querySelector('#back');
    back.addEventListener('click', () => window.location.href = "index.html");

    const refresh = document.querySelector('#refresh');
    refresh.addEventListener('click', () => window.location.href = "listar.php");
</script>