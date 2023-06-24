<style>
    .searchnames {
        font-size: 14px;
        border: 1px solid #888;
        border-radius: 5px;
        padding: 10px;
        width: 15em;
        margin: 10px 2px 0 0;
    }

    form {
        box-shadow: none !important;
        padding-top: 40px;
    }
</style>

<h4 class="display-4 text-center">Folha de obra</h4>
<hr>
<section>
    <h3>Dados Empresa:</h3>
    <h5>
        <?= $empresa->desigsocial ?>
    </h5>
    <p>
        <?= $empresa->morada ?>,
        <?= $empresa->localidade ?>,
        <?= $empresa->codpostal ?>
    </p>
    <p>Telefone:
        <?= $empresa->telefone ?> | Email:
        <?= $empresa->email ?> | NIF:
        <?= $empresa->nif ?>

    </p>
</section>

<hr>
<section>
    <h3>Selecionar cliente</h3>

    <form action="index.php?c=folha&a=search" method="POST">

        <input class="searchnames" type="search" id="username" name="username" placeholder="Procurar por username..."
               title="Type in a name" value="<?php if (isset($usernamefilter)) {
            echo $usernamefilter;
        } ?>">

        <button type="submit">Search</button>
    </form>

    <form action="index.php?c=folha&a=store" method="post">
        <input type="hidden" name="idFuncionario" value="<?= $_SESSION['active_user_id'] ?>">
        <div class="form-group">
            <select class="form-control" name="idCliente" id="idCliente">
                <option disabled selected hidden >Selecione um cliente</option>
                <?php foreach ($clientes as $cliente): ?>
                    <option value="<?= $cliente->id ?>"> <?= "Username: " . $cliente->username . " | Email: " . $cliente->email; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <p style="color: red">
            <?php
            if (isset($model->errors)) {
                if (is_array($model->errors->on('cliente_id'))) {
                    foreach ($model->errors->on('cliente_id') as $error) {
                        echo $error . '<br>';
                    }
                } else {
                    echo $model->errors->on('cliente_id');
                }
            }
            ?>
        </p>

        <p class="mt-4">
            <button type="submit" class="btn btn-primary" name="seguinte">Seguinte</button>
            <a href="index.php?c=folha&a=index" class="btn btn-secondary" role="button" aria-pressed="true">Voltar</a>
        </p>
    </form>
</section>