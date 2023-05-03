<?php

?>
<div class="container">
    <div class="mt-5">
        <h2 class="text-left">Ivas
            <a href="index.php?c=ivas&a=create" class="btn btn-success"
                                          role="button">Novo</a>
        </h2>

        <h2 class="top-space"></h2>
        <div class="row">
            <div class="col-sm-12">
                <table class="table tablestriped">
                    <thead>
                    <th><h3>Id</h3></th>
                    <th><h3>Percentagem</h3></th>
                    <th><h3>Descrição</h3>
                    <th><h3>Em Vigor</h3></th>
                    </th>
                    </thead>
                    <tbody>
                    <?php foreach ($ivas as $iva) { ?>
                        <tr>
                            <td><?= $iva->id ?></td>
                            <td><?= $iva->percentagem ?></td>
                            <td><?= $iva->descricao ?></td>
                            <td><?= $iva->emvigor ?></td>
                            <td>
                                <!--<a href="index.php?c=ivas&a=show&id=<?= $iva->id ?>"
                                   class="btn btn-primary" role="button">Show</a>-->
                                <a href="index.php?c=ivas&a=edit&id=<?= $iva->id ?>"
                                   class="btn btn-primary" role="button">Edit</a>
                                <a href="index.php?c=ivas&a=delete&id=<?= $iva->id ?>"
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




