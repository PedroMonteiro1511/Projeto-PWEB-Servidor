<div class="container">
    <form action="index.php?c=empresa&a=update&id=<?=$model->id ?>" method="post">
        <h4 class="display-4 text-center">Dados da Empresa</h4>
        <hr>
        <div class="form-group mt-4">
            <label for="referencia">Designação Social:</label>
            <input type="text" class="form-control" name="desigsocial" maxlength="25" value="<?= $model->desigsocial ?>" >
        </div>
        <p style="color: red"><?php
            if (isset($model->errors)) {
                if (is_array($model->errors->on('desigsocial'))) {
                    foreach ($model->errors->on('desigsocial') as $error) {
                        echo $error . '<br>';
                    }
                } else {
                    echo $model->errors->on('desigsocial');
                }
            }
            ?>
        </p>

        <div class="form-group mt-4">
            <label for="description">Email:</label>
            <input type="text" class="form-control" name="email" maxlength="50" value="<?= $model->email ?>" >
        </div>
        <p style="color: red"><?php
            if (isset($model->errors)) {
                if (is_array($model->errors->on('email'))) {
                    foreach ($model->errors->on('email') as $error) {
                        echo $error . '<br>';
                    }
                } else {
                    echo $model->errors->on('email');
                }
            }
            ?>
        </p>

        <div class="form-group mt-4">
            <label for="preco">Telefone:</label>
            <input type="number" class="form-control" name="telefone" maxlength="9" value="<?= $model->telefone ?>" >
        </div>
        <p style="color: red"><?php
            if (isset($model->errors)) {
                if (is_array($model->errors->on('telefone'))) {
                    foreach ($model->errors->on('telefone') as $error) {
                        echo $error . '<br>';
                    }
                } else {
                    echo $model->errors->on('telefone');
                }
            }
            ?>
        </p>

        <div class="form-group mt-4">
            <label for="preco">NIF:</label>
            <input type="number" class="form-control" name="nif" maxlength="9" value="<?= $model->nif ?>" >
        </div>
        <p style="color: red"><?php
            if (isset($model->errors)) {
                if (is_array($model->errors->on('nif'))) {
                    foreach ($model->errors->on('nif') as $error) {
                        echo $error . '<br>';
                    }
                } else {
                    echo $model->errors->on('nif');
                }
            }
            ?>
        </p>

        <div class="form-group mt-4">
            <label for="preco">Morada:</label>
            <input type="text" class="form-control" name="morada" maxlength="75" value="<?= $model->morada ?>" >
        </div>
        <p style="color: red"><?php
            if (isset($model->errors)) {
                if (is_array($model->errors->on('morada'))) {
                    foreach ($model->errors->on('morada') as $error) {
                        echo $error . '<br>';
                    }
                } else {
                    echo $model->errors->on('morada');
                }
            }
            ?>
        </p>

        <div class="form-group mt-4">
            <label for="preco">Código-Postal:</label>
            <input type="text" class="form-control" name="codpostal" maxlength="9" value="<?= $model->codpostal ?>" >
        </div>
        <p style="color: red"><?php
            if (isset($model->errors)) {
                if (is_array($model->errors->on('codpostal'))) {
                    foreach ($model->errors->on('codpostal') as $error) {
                        echo $error . '<br>';
                    }
                } else {
                    echo $model->errors->on('codpostal');
                }
            }
            ?>
        </p>

        <div class="form-group mt-4">
            <label for="preco">Localidade:</label>
            <input type="text" class="form-control" name="localidade" maxlength="25" value="<?= $model->localidade ?>" >
        </div>
        <p style="color: red"><?php
            if (isset($model->errors)) {
                if (is_array($model->errors->on('localidade'))) {
                    foreach ($model->errors->on('localidade') as $error) {
                        echo $error . '<br>';
                    }
                } else {
                    echo $model->errors->on('localidade');
                }
            }
            ?>
        </p>

        <div class="form-group mt-4">
            <label for="preco">Capital Social:</label>
            <input type="number" class="form-control" name="capsocial" value="<?= $model->capsocial ?>" >
        </div>
        <p style="color: red"><?php
            if (isset($model->errors)) {
                if (is_array($model->errors->on('capsocial'))) {
                    foreach ($model->errors->on('capsocial') as $error) {
                        echo $error . '<br>';
                    }
                } else {
                    echo $model->errors->on('capsocial');
                }
            }
            ?>
        </p>
        <p class="mt-4">
            <a href="index.php?c=empresa&a=index" class="btn btn-secondary" role="button" aria-pressed="true">Voltar</a>
            <button type="submit" class="btn btn-success" name="update">Guardar</button>
        </p>
        <br>
        <br>
        <br>

    </form>
</div>
