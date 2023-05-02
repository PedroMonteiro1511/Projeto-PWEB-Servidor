<h4 class="display-4 text-center">Folha de obra</h4>
<hr>
<section>
    <h3>Nome da empresa</h3>
    <p>Endereço da empresa, Cidade</p>
    <p>Telefone: (00) 0000-0000 | Email: email@email.com</p>
</section>

<hr>
<section>
    <h3>Selecionar cliente</h3>

    <form action="index.php?c=folha&a=store" method="post">

        <input type="hidden" name="idFuncionario" value="<?= $_SESSION['active_user_id'] ?>">
        <div class="form-group">
            <label for="idCliente">Cliente:</label>
            <select class="form-control" name="idCliente" id="idCliente">
                <option selected>Selecione um cliente</option>
                <?php foreach ($clientes as $cliente): ?>
                    <option value="<?= $cliente->id ?>"> <?= "Username: " . $cliente->username . " | Email: " . $cliente->email; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <p style="color: red"><?php
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





