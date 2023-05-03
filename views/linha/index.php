<div class="container">
    <h4 class="display-4 text-center">Folha de obra</h4>
    <hr>
    <div class="row">
        <section class="col-6">
            <h3>Nome da empresa</h3>
            <p>Endereço da empresa, Cidade</p>
            <p>Telefone: (00) 0000-0000 | Email: email@email.com</p>
        </section>

        <section class="col-6">
            <h3>Nome do Cliente</h3>
            <p>Telefone: (00) 0000-0000 | Email: email@email.com</p>
        </section>
    </div>

    <hr>
    <section>
        <h3>Linha de obra</h3>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">idServiço</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Valor</th>
                <th scope="col">ValorIva</th>
                <th scope="col" class="col-md-1"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($folha->linhas as $linha) { ?>
                <tr>

                    <td><?= $linha->id ?></td>
                    <td><?= $linha->servico_id ?></td>
                    <td><?= $linha->quantidade ?></td>
                    <td><?= $linha->valor ?>€</td>
                    <td><?= $linha->valoriva ?>€</td>
                    <td>
                        <a href="index.php?c=linha&a=delete&id=<?= $linha->id ?>"
                           class="btn btn-danger">Remover</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <p>
            <a href="index.php?c=linha&a=create&id=<?= $folha->id ?>"
               class="btn btn-success" role="button">+</a>
        </p>
        <hr>
        <div class="mt-4">
            <h5>Total(sem iva): <?= $folha->valortotal ?> €</h5>
            <h4>Total: <?= $folha->ivatotal ?> €</h4>
        </div>
        <p class="mt-4" style="text-align: center">

            <?php if (count($folha->linhas) == 0): ?>

                <a href="index.php?c=folha&a=emitir&id=<?= $folha->id ?>"
                   class="btn btn-dark disabled" role="button" aria-disabled = true>Finalizar</a>

            <?php else: ?>
                <a href="index.php?c=folha&a=emitir&id=<?= $folha->id ?>"
                   class="btn btn-dark" role="button">Finalizar</a>
            <?php endif; ?>

        </p>
    </section>
</div>