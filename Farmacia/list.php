<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/list.css">
    <title>My page</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html">Pesquisar</a></li>
                <li><a href="searchManu.html">Pesquisar fabricante</a></li>
                <li><a href="register.html">Cadastrar medicamento</a></li>
                <li><a href="list.php" class="active">Medicamentos</a></li>
            </ul>
        </nav>
    </header>
</body>
</html>

<?php
    include_once('src/php/serverDAO.php');
    include_once('src/php/medicament.php');

    $server = new serverDAO();
    $objs = $server->list();
    $html = '';
    for ($i=0; $i < count($objs); $i++) { 
        $control = $objs[$i]->getControl() == 'yes' ? 'Sim' : 'Não';
        $html = $html . '
        <tr>
            <td>' . $objs[$i]->getName() . '</td>
            <td>' . $objs[$i]->getManufacture() . '</td>
            <td>' . $objs[$i]->getAmount() . '</td>
            <td>' . $control . '</td>
            <td>' . $objs[$i]->getPrice() . '</td>
            <td>' . $objs[$i]->getCod() . '</td>
            <td><button class="link alterButton"><a href= "' . $objs[$i]->listAttr() . '">Alterar</a></button></td>
            <td><button class="link"><a href="src/php/delete.php?del=' . $objs[$i]->getCod() . '">Deletar</a></button></td>
        </tr>';
    }

    $html = '<form action="src/php/alter.php" method="POST"><table>
                <caption>Medicamentos</caption>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Fabricante</th>
                        <th>Quantidade</th>
                        <th>Controlado</th>
                        <th>Preço</th>
                        <th>Código</th>
                    </tr>
                </thead>
                <tbody id="alterTable">'. $html .'</tbody>
            </table></form>';
    echo $html;
    echo '<script src="../../js/alter.js"></script>';
?>