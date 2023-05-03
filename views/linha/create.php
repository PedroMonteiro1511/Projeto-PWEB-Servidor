<div class="container">

    <form action="index.php?c=linha&a=store" method="post">

        <h4 class="display-4 text-center">Criar Linha</h4>
        <hr>

        <input type="hidden" name="folha_id" value="<?= $folha_id ?>">

        <div class="form-group mt-4">
            <label for="service_id">Serviço:</label>
            <select class="form-control" name="service_id" id="service_id">
                <option selected>Selecione um Serviço</option>
                <?php foreach ($services as $service): ?>
                    <option value="<?= $service->id ?>"> <?= $service->referencia . " - " . $service->descricao; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <p style="color: red">
            <?php
            if (isset($model->errors)) {
                if (is_array($model->errors->on('service_id'))) {
                    foreach ($model->errors->on('service_id') as $error) {
                        echo $error . '<br>';
                    }
                } else {
                    echo $model->errors->on('service_id');
                }
            }
            ?>
        </p>

        <div class="form-group mt-4">
            <label for="referencia">Quantidade:</label>
            <input type="number" class="form-control" name="quantidade" id="quantidade" placeholder="Inserir Quantidade"
                value="<?php if (isset($model)) {
                    echo $model->quantidade;
                } ?>">
            <p style="color: red">
                <?php
                if (isset($model->errors)) {
                    if (is_array($model->errors->on('quantidade'))) {
                        foreach ($model->errors->on('quantidade') as $error) {
                            echo $error . '<br>';
                        }
                    } else {
                        echo $model->errors->on('quantidade');
                    }
                }
                ?>
            </p>
        </div>

        <p class="mt-4">
            <button type="submit" class="btn btn-primary" name="create">Criar</button>
            <a href="index.php?c=linha&a=index&id=<?= $folha_id ?>" class="btn btn-secondary" role="button"
                aria-pressed="true">Voltar</a>
        </p>

    </form>

</div>