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

<div class="mt-5">
    <h2 class="text-left">Users
        <a href="index.php?c=user&a=create" class="btn btn-success"
           role="button">Novo</a>
    </h2>

    <form action="index.php?c=user&a=search" method="POST">
        <input class="searchnames" type="search" id="id" name="id" placeholder="Procurar por id..." title="Type in a name"
               value="<?php if (isset($idfilter)) {
                   echo $idfilter;
               } ?>">

        <input class="searchnames" type="search" id="username" name="username" placeholder="Procurar por username..."
               title="Type in a name" value="<?php if (isset($usernamefilter)) {
            echo $usernamefilter;
        } ?>">

        <select class="searchnames" name="role" id="role">
            <option value="">Todas as roles...</option>
            <option value="<?= User::$Role_User_Cliente ?>" <?php if (isset($rolefilter) && $rolefilter == User::$Role_User_Cliente){ ?> selected  <?php } ?>>Cliente</option>
            <option value="<?= User::$Role_User_Funcionario ?>" <?php if (isset($rolefilter) && $rolefilter == User::$Role_User_Funcionario){ ?> selected  <?php } ?>>Funcionário</option>
            <option value="<?= User::$Role_User_Admin ?>" <?php if (isset($rolefilter) && $rolefilter == User::$Role_User_Admin){ ?> selected  <?php } ?>>Admin</option>
        </select>

        <button type="submit">Search</button>
    </form>


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
            <table class="table tablestriped" id="myTable">
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
                <th><h3></h3></th>
                <th><h3></h3></th>

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
                                <a href="index.php?c=user&a=show&id=<?= $user->id ?>"
                                   class="btn btn-primary" role="button">Show</a>
                                <a href="index.php?c=user&a=edit&id=<?= $user->id ?>"
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

<script>
    const id = document.getElementById("id");
    const username = document.getElementById("username");
    const role = document.getElementById("role");

    id.addEventListener("input", updateFilters);
    id.addEventListener("load", updateFilters);

    username.addEventListener("input", updateOtherFilters);
    username.addEventListener("load", updateOtherFilters);

    role.addEventListener("input", updateOtherFilters);
    role.addEventListener("load", updateOtherFilters);

    window.onload = updateFilters();
    window.onload = updateOtherFilters();

    function updateFilters() {
        var idtext = id.value;
        if (idtext === ""){
            username.style.removeProperty('display')
            role.style.removeProperty('display');
        }
        else{
            username.style.display = "none";
            role.style.display = "none";
        }
    }

    function updateOtherFilters() {
        var usertext = username.value;
        var roletext = role.value;
        if (usertext === "" && roletext === ""){
            id.style.removeProperty('display');
        }
        else{
            id.style.display = "none";
        }
    }
</script>







