<?php
if (isset($erro_apagar)):

    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
        . $erro_apagar . '
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
endif;
?>
<div class="mt-5">
    <h2 class="text-left">Serviços
        <a href="index.php?c=service&a=create" class="btn btn-success" role="button">Novo</a>
    </h2>

    <h2 class="top-space"></h2>
    <div class="row">
        <div class="col-sm-12">
            <table class="table tablestriped">
                <thead>
                    <th>
                        <h3>Id</h3>
                    </th>
                    <th>
                        <h3>Referência</h3>
                    </th>
                    <th>
                        <h3>Descrição</h3>
                    </th>
                    <th>
                        <h3>Preço</h3>
                    </th>
                    <th>
                        <h3>Iva</h3>
                    </th>
                    <th>
                        <h3>Ações</h3>
                    </th>
                </thead>
                <tbody>
                    <?php foreach ($services as $service) { ?>
                        <tr>
                            <td>
                                <?= $service->id ?>
                            </td>
                            <td>
                                <?= $service->referencia ?>
                            </td>
                            <td>
                                <?= $service->descricao ?>
                            </td>
                            <td>
                                <?= $service->preco ?>€
                            </td>
                            <td>
                                <?= $service->iva->percentagem ?>%
                            </td>
                            <td>
                                <a href="index.php?c=service&a=show&id=<?= $service->id ?>" class="btn btn-primary"
                                    role="button">Show</a>
                                <a href="index.php?c=service&a=edit&id=<?= $service->id ?>" class="btn btn-primary"
                                    role="button">Edit</a>
                                <a href="index.php?c=service&a=delete&id=<?= $service->id ?>"
                                    class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>