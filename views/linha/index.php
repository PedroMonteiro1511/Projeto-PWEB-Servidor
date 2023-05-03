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
        <p>
            <a href="index.php?c=linha&a=create&id=<?= $folha->id ?>" class="btn btn-success" role="button">+</a>
        </p>
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