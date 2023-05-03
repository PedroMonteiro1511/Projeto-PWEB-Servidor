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
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Referência</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Valor</th>
                    <th scope="col">ValorIva</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($model->linhas as $linha) { ?>
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
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <?php if (count($model->linhas) == 0) {
            echo 'Não existem serviços.' . '<hr>';
        } ?>
        <div class="mt-4">
            <h5>Total(sem iva):
                <?= $model->valortotal ?> €
            </h5>
            <h4>Total:
                <?= $model->ivatotal ?> €
            </h4>
        </div>
    </section>

    <hr>
    <section>
        <div style="margin-top: 100px; text-align: center">
            <h3><u>Funcionário</u></h3>
            <p>
                <?= $funcionario->username ?><br>
                <?= $funcionario->email ?>
            </p>
        </div>
    </section>
</div>