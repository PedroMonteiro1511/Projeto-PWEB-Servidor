<?php ?>
<div class="container">
    <div class="mt-5">
        <h2 class="text-left">Folhas de obra
            <a href="index.php?c=folha&a=create" class="btn btn-success" role="button">Novo</a>
        </h2>
        <h2 class="top-space"></h2>
        <div class="row">
            <div class="col-sm-12">
                <table class="table">
                    <thead>
                        <th>
                            <h3>Nº</h3>
                        </th>
                        <th>
                            <h3>Data</h3>
                        </th>
                        <th>
                            <h3>Total(s/iva)</h3>
                        </th>
                        <th>
                            <h3>Total</h3>
                        </th>
                        <th>
                            <h3>Estado</h3>
                        </th>
                        <th>
                            <h3>Cliente</h3>
                        </th>
                        <th>
                            <h3>Funcionario</h3>
                        </th>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php foreach ($folhas as $folha) { ?>

                            <tr>
                                <td>
                                    <?= $folha->id ?>
                                </td>
                                <td>
                                    <?= $folha->data ?>
                                </td>
                                <td>
                                    <?= $folha->valortotal ?>€
                                </td>
                                <td>
                                    <?= $folha->ivatotal ?>€
                                </td>
                                <td>
                                    <?php if ($folha->estado == Folha::$Estado_Em_Lancamento): ?>
                                        <?php echo '<span class="badge text-bg-primary">' . $folha->estado . '</span>' ?>
                                    <?php elseif ($folha->estado == Folha::$Estado_Emitida): ?>
                                        <?php echo '<span class="badge text-bg-warning">' . $folha->estado . '</span>' ?>
                                    <?php else: ?>
                                        <?php echo '<span class="badge text-bg-success">' . $folha->estado . '</span>' ?>
                                    <?php endif; ?>

                                </td>
                                <td>
                                    <a href="index.php?c=user&a=show&id=<?= $folha->cliente_id ?>">
                                        <?= User::getUsernameById($folha->cliente_id) ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="index.php?c=user&a=show&id=<?= $folha->funcionario_id ?>">
                                        <?= User::getUsernameById($folha->funcionario_id) ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="index.php?c=folha&a=show&id=<?= $folha->id ?>" class="btn btn-primary"
                                        role="button">Show</a>
                                    <?php
                                    if ($folha->estado == Folha::$Estado_Em_Lancamento):
                                        ?>
                                        <a href="index.php?c=linha&a=index&id=<?= $folha->id ?>" class="btn btn-primary"
                                            role="button">Edit</a>
                                        <a href="index.php?c=folha&a=delete&id=<?= $folha->id ?>"
                                           class="btn btn-danger">Delete</a>
                                        <?php
                                    endif;
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>