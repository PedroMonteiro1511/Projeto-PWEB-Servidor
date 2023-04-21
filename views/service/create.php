<div class="container">

    <form action="index.php?c=service&a=store" method="post">

        <h4 class="display-4 text-center">Criar Serviço</h4>
        <hr>
        <br>
        <div class="form-group">
            <label for="referencia">Referência:</label>
            <input type="text"
                   class="form-control"
                   name="referencia"
                   id="referencia"
                   maxlength="10"
                   placeholder="Inserir Referência"
                   value="<?php if (isset($model)) {
                       echo $model->referencia;
                   } ?>"
            >
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
        </div>

        <div class="form-group mt-4">
            <label for="descicao">Descrição:</label>
            <input type="text"
                   class="form-control"
                   name="descricao"
                   id="descicao"
                   placeholder="Inserir Descrição"
                   value="<?php if (isset($model)) {
                       echo $model->descricao;
                   } ?>">
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
        </div>

        <div class="form-group mt-4">
            <label for="preco">Preço:</label>
            <input type="text"
                   class="form-control"
                   id="preco"
                   name="preco"
                   placeholder="Inserir Preço"
                   value="<?php if (isset($model)) {
                       echo $model->preco;
                   } ?>">
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
            <label for="idIva">Iva:</label>
            <select class="form-control" name="idIva" id="idIva">
                <option selected>Selecione um Iva</option>
                <?php foreach ($ivas as $iva): ?>
                <option value="<?= $iva->id ?>"> <?= $iva->percentagem . "% - " . $iva->descricao; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <p style="color: red"><?php
            if (isset($model->errors)) {
            if (is_array($model->errors->on('idiva'))) {
            foreach ($model->errors->on('idiva') as $error) {
            echo $error . '<br>';
            }
            } else {
            echo $model->errors->on('idiva');
            }
            }
            ?>
        </p>

        <p class="mt-4">
            <button type="submit" class="btn btn-primary" name="create">Criar</button>
            <a href="index.php?c=service&a=index" class="btn btn-secondary" role="button" aria-pressed="true">Voltar</a>
        </p>

    </form>

</div>
