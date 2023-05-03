<div class="container">

    <form action="index.php?c=ivas&a=store" method="post">
        <h4 class="display-4 text-center">Criar Iva</h4>
        <hr>
        <br>
        <div class="form-group">
            <label for="percentagem">Percentagem:</label>
            <input type="number"
                   class="form-control"
                   name="percentagem"
                   id="percentagem"
                   maxlength="10"
                   placeholder="Inserir Percentagem"
                   value="<?php if (isset($model)) {
                       echo $model->percentagem;
                   } ?>"
            >
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
        </div>

        <div class="form-group mt-4">
            <label for="descicao">Descrição:</label>
            <input type="text"
                   class="form-control"
                   name="descricao"
                   id="descricao"
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
            <label for="emvigor">Em Vigor:</label>
            <select class="form-control"
                    id="emvigor"
                    name="emvigor"
                    placeholder="Indicar se está em Vigor">
                <option value="">Selecionar..</option>
                <option value="Sim">Sim</option>
                <option value="Não">Não</option>
            </select>
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
        </div>
        <p class="mt-4">
            <button type="submit" class="btn btn-primary" name="create">Criar</button>
            <a href="index.php?c=ivas&a=index" class="btn btn-secondary" role="button" aria-pressed="true">Voltar</a>
        </p>
    </form>

</div>
