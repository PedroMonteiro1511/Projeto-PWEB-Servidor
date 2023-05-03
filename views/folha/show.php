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
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">idServiço</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Valor</th>
                <th scope="col">ValorIva</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($model->linhas as $linha) { ?>
                <tr>

                    <td><?= $linha->id ?></td>
                    <td><?= $linha->servico_id ?></td>
                    <td><?= $linha->quantidade ?></td>
                    <td><?= $linha->valor ?>€</td>
                    <td><?= $linha->valoriva ?>€</td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <?php if(count($model->linhas) == 0 ){
            echo 'Não existem serviços.'.'<hr>';
        } ?>
        <div class="mt-4">
            <h5>Total(sem iva): <?= $model->valortotal ?> €</h5>
            <h4>Total: <?= $model->ivatotal ?> €</h4>
        </div>
    </section>

    <hr>
    <section>
        <div style="margin-top: 100px; text-align: center">
            <h3><u>Funcionário</u></h3>
            <p>Username do fucionario</p>
        </div>
    </section>
</div>