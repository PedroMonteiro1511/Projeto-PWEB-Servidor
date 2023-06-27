<!DOCTYPE html>
<html>
<head>
    <title>Apresentação da Empresa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>
<body>
<main class="text-center">
    <div>
        <?php if (isset($_SESSION['active_user_id'])){

         ?>
        <a href="index.php?c=empresa&a=edit&id=<?= $model->id ?>" class="btn btn-primary" role="button">Editar Dados da Empresa</a>

        <?php } ?>

    </div>
    <br>
    <img style="border-radius: 15px" src="public/imgs/imagem-empresa.jpg" alt="Imagem da Empresa">
    <h2>Designação Social
        <br>
        <h6>Nome: <?= $model->desigsocial ?></h6>
        <h6>NIF: <?= $model->nif ?></h6>
    </h2>
    <br>
    <h2>Capital Social
        <br>
        <h6><?= $model->capsocial ?> €</h6>
    </h2>
    <br>
    <h2>Contacto
        <br>
        <h6>☎: <?= $model->telefone ?></h6>
        <h6>📧: <?= $model->email ?></h6>
    </h2>
    <br>
    <h2>Endereço
        <br>
        <h6> Morada: <?= $model->morada ?></h6>
        <h6> Código-Postal: <?= $model->codpostal ?></h6>
        <h6> Localidade: <?= $model->localidade ?></h6>
    </h2>
    <br>
    <br>
    <br>
</main>
</body>
</html>