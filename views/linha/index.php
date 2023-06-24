<?php
    $open_form = false;

if (isset($form)){
    $open_form = $form;
} ?>

<div class="container">
    <h4 class="display-4 text-center">Folha de obra</h4>
    <hr>
    <div class="row">
        <section class="col-6">
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

        <section class="col-6">
            <h3>Dados do Cliente</h3>
            <h5>
                <?= $cliente->username ?>
            </h5>
            <p>
                <?= $cliente->morada ?>,
                <?= $cliente->localidade ?>,
                <?= $cliente->codpostal ?>
            </p>
            <p>Telefone:
                <?= $cliente->telefone ?> | Email:
                <?= $cliente->email ?> | NIF:
                <?= $cliente->nif ?>
            </p>
            </p>
        </section>
    </div>

    <hr>
    <section>
        <h3>Linha de obra</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Referência</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Valor</th>
                    <th scope="col">ValorIva</th>
                    <th scope="col" class="col-md-1"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($folha->linhas as $linha) { ?>
                    <tr>

                        <td>
                            <?= $linha->service->referencia ?>
                        </td>
                        <td>
                            <?= $linha->service->descricao ?>
                        </td>
                        <td>
                            <?= $linha->quantidade ?>
                        </td>
                        <td>
                            <?= $linha->valor ?>€
                        </td>
                        <td>
                            <?= $linha->valoriva ?>€
                        </td>
                        <td>
                            <a href="index.php?c=linha&a=delete&id=<?= $linha->id ?>" class="btn btn-danger">Remover</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div id="add-form-container"></div>

        <p>
           <a  class="btn btn-success" role="button" id="add-button">+</a>
            <!-- href="index.php?c=linha&a=create&id=<?= $folha->id ?>"  -->
        </p>

        <form action="index.php?c=linha&a=store" method="post" id="form-appear" <?php if ($open_form == false){ ?> style="display: none" <?php } ?>>
            <input type="hidden" name="folha_id" value="<?= $folha->id ?>">

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

        <hr>
        <div class="mt-4">
            <h5>Total(sem iva):
                <?= $folha->valortotal ?> €
            </h5>
            <h4>Total:
                <?= $folha->ivatotal ?> €
            </h4>
        </div>
        <p class="mt-4" style="text-align: center">

            <?php if (count($folha->linhas) == 0): ?>

                <a href="index.php?c=folha&a=emitir&id=<?= $folha->id ?>" class="btn btn-dark disabled" role="button"
                    aria-disabled=true>Finalizar</a>

            <?php else: ?>
                <a href="index.php?c=folha&a=emitir&id=<?= $folha->id ?>" class="btn btn-dark" role="button">Finalizar</a>
            <?php endif; ?>

        </p>
    </section>
</div>

<script>
    $(document).ready(function() {

      var form  = document.getElementById("form-appear");
      var add = document.getElementById("add-button");

        add.addEventListener('click', function() {
            console.log('Button clicked!');
            form.style.display = "block";
        });
    });
</script>