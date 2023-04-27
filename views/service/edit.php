<?php
?>

<form action="index.php?c=service&a=update&id=<?= $model->id ?>" method="post">
    <h4 class="display-4 text-center">Serviço</h4>
    <hr>
    <div class="form-group mt-4">
        <label for="referencia">Referência:</label>
        <input type="text" class="form-control" name="referencia" maxlength="10" value="<?= $model->referencia ?>">
    </div>
    <p style="color: red"><?php
        if (isset($model->errors)) {
            if (is_array($model->errors->on('referencia'))) {
                foreach ($model->errors->on('referencia') as $error) {
                    echo $error . '<br>';
                }
            } else {
                echo $model->errors->on('referencia');
            }
        }
        ?>
    </p>

    <div class="form-group mt-4">
        <label for="description">Descrição:</label>
        <input type="text" class="form-control" name="descricao" value="<?= $model->descricao ?>">
    </div>
    <p style="color: red"><?php
        if (isset($model->errors)) {
            if (is_array($model->errors->on('descricao'))) {
                foreach ($model->errors->on('descricao') as $error) {
                    echo $error . '<br>';
                }
            } else {
                echo $model->errors->on('descricao');
            }
        }
        ?>
    </p>

    <div class="form-group mt-4">
        <label for="preco">Preço:</label>
        <input type="text" class="form-control" name="preco" value="<?= $model->preco ?>">
    </div>
    <p style="color: red"><?php
        if (isset($model->errors)) {
            if (is_array($model->errors->on('preco'))) {
                foreach ($model->errors->on('preco') as $error) {
                    echo $error . '<br>';
                }
            } else {
                echo $model->errors->on('preco');
            }
        }
        ?>
    </p>

    <div class="form-group">
        <label for="iva_id">Iva:</label>
        <select class="form-control" name="iva_id" id="iva_id">
            <?php foreach ($ivas as $iva): ?>
                <?php if ($iva->id == $model->iva_id) { ?>
                    <option value="<?= $iva->id ?>"
                            selected><?= $iva->percentagem . "% - " . $iva->descricao; ?> </option>
                <?php } else { ?>
                    <option value="<?= $iva->id ?>"> <?= $iva->percentagem . "% - " . $iva->descricao; ?></option>
                <?php }
            endforeach; ?>
        </select>
    </div>
    <p class="mt-4">
        <a href="index.php?c=service&a=index" class="btn btn-secondary" role="button" aria-pressed="true">Voltar</a>
        <button type="submit" class="btn btn-success" name="update">Guardar</button>
    </p>
</form>

