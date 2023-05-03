<?php
?>

<div class="container">
    <form action="index.php?c=ivas&a=update&id=<?=$model->id ?>" method="post">
        <h4 class="display-4 text-center">Ivas</h4>
        <hr>
        <div class="form-group mt-4">
            <label for="percentagem">Percentagem:</label>
            <input type="number" class="form-control" name="percentagem" maxlength="11" value="<?= $model->percentagem  ?>" >
        </div>
        <p style="color: red"><?php
            if (isset($model->errors)) {
                if (is_array($model->errors->on('percentagem'))) {
                    foreach ($model->errors->on('percentagem') as $error) {
                        echo $error . '<br>';
                    }
                } else {
                    echo $model->errors->on('percentagem');
                }
            }
            ?>
        </p>

        <div class="form-group mt-4">
            <label for="description">Descrição:</label>
            <input type="text" class="form-control" name="descricao" maxlength="50" value="<?= $model->descricao ?>" >
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
            <label for="emvigor">Em Vigor:</label>
            <select class="form-control" name="iva_id" id="iva_id">
                    <?php if ($model->emvigor == 'sim') { ?>
                        <option value="<?= $model->emvigor ?>"
                                selected><?= $model->emvigor; ?> </option>
                    <?php } else { ?>
                        <option value="<?= $model->emvigor ?>"> <?= $model->emvigor;?></option>
                    <?php }?>
            </select>
        </div>
        <p style="color: red"><?php
            if (isset($model->errors)) {
                if (is_array($model->errors->on('emvigor'))) {
                    foreach ($model->errors->on('emvigor') as $error) {
                        echo $error . '<br>';
                    }
                } else {
                    echo $model->errors->on('emvigor');
                }
            }
            ?>
        </p>

        <p class="mt-4">
            <a href="index.php?c=ivas&a=index" class="btn btn-secondary" role="button" aria-pressed="true">Voltar</a>
            <button type="submit" class="btn btn-success" name="update">Guardar</button>
        </p>
    </form>
</div>
