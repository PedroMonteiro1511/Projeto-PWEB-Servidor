<style>

    form {
        padding: 15px !important;
    }

    .searchnames {
        font-size: 14px;
        border: 1px solid #888;
        border-radius: 5px;
        padding: 10px;
        width: 15em;
        margin: 10px 2px 0 0;
    }

    .alert {
        padding: 20px;
        background-color: #9d150f;
        color: white;
    }

    .alert-user {
        padding: 20px;
        background-color: #ffffff;
        color: white;
    }

    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }
</style>
<div class="container">
    <div class="mt-5">
        <h2 class="text-left">Folhas de obra
            <a href="index.php?c=folha&a=create" class="btn btn-success" role="button">Novo</a>
        </h2>
        <br>
        <form action="index.php?c=folha&a=searchfolhas" method="POST">

            <input class="searchnames" type="search" id="cliente" name="cliente" placeholder="Procurar por cliente..."
                   title="Type in a name" value="<?php if (isset($usernamefilter)) {
                echo $usernamefilter;
            } ?>">

            <select class="searchnames" name="estado" id="estado">
                <option value="">Todas os estados...</option>
                <option value="<?= Folha::$Estado_Em_Lancamento ?>" <?php if (isset($estadofilter) && $estadofilter == Folha::$Estado_Em_Lancamento){ ?> selected  <?php } ?>>Em Lançamento</option>
                <option value="<?= Folha::$Estado_Emitida ?>" <?php if (isset($estadofilter) && $estadofilter == Folha::$Estado_Emitida){ ?> selected  <?php } ?>>Emitida</option>
                <option value="<?= Folha::$Estado_Paga ?>" <?php if (isset($estadofilter) && $estadofilter == Folha::$Estado_Paga){ ?> selected  <?php } ?>>Paga</option>
            </select>

            <button type="submit">Search</button>
        </form>
        <hr>
        <br>
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
                        <?php foreach ($folhas as $folha) {
                            $data = date("F j, Y", strtotime($folha->data));

                            ?>

                            <tr>
                                <td>
                                    <?= $folha->id ?>
                                </td>
                                <td>
                                    <?= $data ?>
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