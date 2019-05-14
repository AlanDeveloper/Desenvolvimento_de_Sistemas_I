<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/index.css">
    <title>My page</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../../index.html" class="active">Pesquisar</a></li>
                <li><a href="../../searchManu.html">Pesquisar fabricante</a></li>
                <li><a href="../../register.html">Cadastrar medicamento</a></li>
                <li><a href="../../list.php">Medicamentos</a></li>
            </ul>
        </nav>
    </header>
</body>
</html>
<?php
    include_once('serverDAO.php');
    include_once('medicament.php');

    $server = new serverDAO();
    $objs = $server->searchMedicament($_POST['search'], $_POST['order'], $_POST['classify']);
    $html = '';
    for ($i=0; $i < count($objs); $i++) { 
        $control = $objs[$i]->getControl() == 'yes' ? 'Sim' : 'Não';
        $html = $html . '
        <tbody>
            <tr>
                <td>' . $objs[$i]->getName() . '</td>
                <td>' . $objs[$i]->getManufacture() . '</td>
                <td>' . $objs[$i]->getAmount() . '</td>
                <td>' . $control . '</td>
                <td>' . $objs[$i]->getPrice() . '</td>
                <td>' . $objs[$i]->getCod() . '</td>
            </tr>
        </tbody>';
    }

    $html = '<table>
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
                '. $html .'
            </table>';
    echo $html;
?>