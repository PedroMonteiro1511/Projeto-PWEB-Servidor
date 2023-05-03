<?php ?>
<div class="container">
    <div class="mt-5">
        <h2 class="text-center">Histórico de Folhas de Obra</h2>
        <div class="row">
            <div class="col-sm-12 mt-4">
                <table class="table tablestriped">
                    <thead>
                        <th>
                            <h3>Folha Nº</h3>
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
                    </thead>
                    <tbody>
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
                                    <?= $folha->estado == Folha::$Estado_Paga ?
                                        '<span class="badge text-bg-success"> Paga </span>' :
                                        '<span class="badge text-bg-danger"> Por Pagar </span>'
                                        ?>
                                </td>
                                <td>
                                    <a href="index.php?c=folhacliente&a=show&id=<?= $folha->id ?>" class="btn btn-primary"
                                        role="button">Show</a>
                                    <a href="index.php?c=folhacliente&a=pay&id=<?= $folha->id ?>" class="btn btn-primary"
                                        role="button">Pay</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>