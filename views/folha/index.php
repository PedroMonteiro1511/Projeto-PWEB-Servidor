<?php ?>
<div class="container">
    <div class="mt-5">
        <h2 class="text-left">Folhas de obra
            <a href="index.php?c=folha&a=create" class="btn btn-success"
               role="button">Novo</a>
        </h2>



        <h2 class="top-space"></h2>
        <div class="row">
            <div class="col-sm-12">
                <table class="table tablestriped">
                    <thead>
                    <th><h3>Id</h3></th>
                    <th><h3>Data</h3></th>
                    <th><h3>Valor</h3></th>
                    <th><h3>IvaTotal</h3></th>
                    <th><h3>Estado</h3></th>
                    <th><h3>idCliente</h3></th>
                    <th><h3>idFuncionario</h3></th>
                    </thead>
                    <tbody>
                    <?php foreach ($folhas as $folha) { ?>

                        <tr>
                            <td><?= $folha->id ?></td>
                            <td><?=  $folha->data ?></td>
                            <td><?= $folha->valortotal ?>€</td>
                            <td><?= $folha->ivatotal ?>€</td>
                            <td><?= $folha->estado ?></td>
                            <td><?= $folha->cliente_id ?></td>
                            <td><?= $folha->funcionario_id ?></td>
                            <td>
                                <a href="index.php?c=folha&a=show&id=<?= $folha->id ?>"
                                   class="btn btn-primary" role="button">Show</a>
                                <a href="index.php?c=linha&a=index&id=<?= $folha->id ?>"
                                   class="btn btn-primary" role="button">Edit</a>
                                <a href="index.php?c=folha&a=delete&id=<?= $folha->id ?>"
                                   class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

