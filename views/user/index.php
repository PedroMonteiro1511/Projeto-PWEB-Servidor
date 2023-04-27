<style>
    .alert {
        padding: 20px;
        background-color: #9d150f;
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
<div class="mt-5">
    <h2 class="text-left">Users
        <a href="index.php?c=user&a=create" class="btn btn-success"
           role="button">Novo</a>
    </h2>

    <?php

    if (isset($erro_apagar)) {
        ?>

        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong>Erro!</strong> <?= $erro_apagar ?>
        </div>

        <?php
    }

    ?>

    <h2 class="top-space"></h2>
    <div class="row">
        <div class="col-sm-12">
            <table class="table tablestriped">
                <thead>
                <th><h3>Id</h3></th>
                <th><h3>Username</h3></th>
                <th><h3>E-mail</h3></th>
                <th><h3>Telefone</h3></th>
                <th><h3>Morada</h3></th>
                <th><h3>Código-Postal</h3></th>
                <th><h3>Localidade</h3></th>
                <th><h3>Role</h3></th>
                <th><h3>Gestão</h3></th>

                </thead>
                <tbody>
                <?php foreach ($users as $user) { ?>
                    <?php if ($user->id != $_SESSION['active_user_id']) { ?>
                        <tr>
                            <td><?= $user->id ?></td>
                            <td><?= $user->username ?></td>
                            <td><?= $user->email ?></td>
                            <td><?= $user->telefone ?></td>
                            <td><?= $user->morada ?></td>
                            <td><?= $user->codpostal ?></td>
                            <td><?= $user->localidade ?></td>
                            <td style="color: red"> <?= $user->role ?></td>

                            <td>
                                <a href="index.php?c=user&a=view&id=<?= $user->id ?>"
                                   class="btn btn-primary" role="button">Show</a>
                                <a href="index.php?c=user&a=change&id=<?= $user->id ?>"
                                   class="btn btn-primary" role="button">Edit</a>
                                <a href="index.php?c=user&a=delete&id=<?= $user->id ?>"
                                   class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php }
                } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>




