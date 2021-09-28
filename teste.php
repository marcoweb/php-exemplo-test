<?php
if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $questoes = [
        'Questão 1' => false,
        'Questão 2' => false,
        'Questão 3' => false
    ];
} else {
    $count = 0;
    foreach($_POST as $k => $v) {
        if(substr($k, 0, 3) == 'q::') {
            if($v == 'on') {
                $count++;
            }
        }
    }
}
?>
<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Teste</title>
    </head>
    <body>
        <h1>Teste</h1>
        <?php if(isset($questoes)): ?>
            <form action="teste.php" method="post">
                <?php foreach($questoes as $q => $a): ?>
                    <label><?= $q ?></label>
                    <input type="radio" name="q::<?= str_replace(' ', '_', $q) ?>" /><br />
                <?php endforeach ?>
                <button type="submit">Enviar</button>
            </form>
        <?php endif ?>
        <?php if(isset($count)): ?>
            <p><?= $count ?> questões selecionadas</p>
        <?php endif ?>
    </body>
</html>