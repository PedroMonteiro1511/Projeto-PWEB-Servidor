<style>

    .col-xs-12 {
        margin: 5px !important;
    }

    hr:not([size]) {
        height: 30px !important;
    }

    #leftPanel {
        background-color: #0079ac;
        color: #fff;
        /*     text-align: center; */
    }

    #rightPanel {
        min-height: 500px;
        min_width: 300px;
    }

    /* Credit to bootsnipp.com for the css for the color graph */
    .colorgraph {
        height: 20px;
        border-top: 0;
        /*   background: #c4e17f; */
        border-radius: 5px;
        background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
        background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
        background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
        background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
    }
</style>   <?php //TODO Cores todas pipi , alterar se quiserem  ?>

<div class="container" style="margin-top: 2%">
    <div class="col-md-12">
        <form role="form" action="index.php?c=user&a=update&id=<?= $model->id ?>" method="post">
            <h2>Alterar os dados do Perfil.</h2>
            <hr class="colorgraph">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="username_edit"> Username: </label>
                        <input type="text" name="username_edit" id="username_edit" class="form-control input-lg"
                               placeholder="username" tabindex="1" value="<?= $model->username ?>">
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="email_edit">Email: </label>
                    <input type="email" name="email_edit" id="email_edit" class="form-control input-lg"
                           placeholder="Email Address"
                           tabindex="4" value="<?= $model->email ?>" >
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3">
                    <div class="form-group">
                        <label for="telefone_edit">Telefone: </label>
                        <input type="text" name="telefone_edit" id="telefone_edit" class="form-control input-lg"
                               placeholder="Telefone" tabindex="1" value="<?= $model->telefone ?>">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3">
                    <div class="form-group">
                        <label for="morada_edit">Morada: </label>
                        <input type="text" name="morada_edit" id="morada_edit"
                               class="form-control input-lg" placeholder="Morada" tabindex="6" value="<?= $model->morada ?>">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3">
                    <div class="form-group">
                        <label for="codpostal_edit">Codigo Postal: </label>
                        <input type="text" name="codpostal_edit" id="codpostal_edit"
                               class="form-control input-lg" placeholder="Codigo Postal: " tabindex="6" value="<?= $model->codpostal ?>">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3">
                    <div class="form-group">
                        <label for="nif_edit">NIF: </label>
                        <input type="text" name="nif_edit" id="nif_edit"
                               class="form-control input-lg" tabindex="6" value="<?= $model->nif ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="localidade_edit">Localidade: </label>
                        <input type="text" name="localidade_edit" id="localidade_edit" class="form-control input-lg"
                               placeholder="Localidade" tabindex="1" value="<?= $model->localidade ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="password_edit">Password: </label>
                        <input type="password" name="password_edit" id="password_edit" class="form-control input-lg"
                               placeholder="Localidade" tabindex="1" value="<?= $model->password ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="role_edit">Role</label>
                        <select class="form-control" name="role_edit" id="role_edit">
                            <option value="<?= User::$Role_User_Cliente ?>" <?php if (User::$Role_User_Cliente == $model->role){?>selected <?php } ?>><?= User::$Role_User_Cliente ?></option>
                            <option value="<?= User::$Role_User_Funcionario ?>" <?php if (User::$Role_User_Funcionario == $model->role){?>selected <?php } ?>><?= User::$Role_User_Funcionario ?></option>
                            <?php if ($_SESSION['active_user_role'] == User::$Role_User_Admin){ ?>
                                <option value="<?= User::$Role_User_Admin ?>" <?php if (User::$Role_User_Admin == $model->role){?>selected <?php } ?>><?= User::$Role_User_Admin ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">

                <button class="btn btn-success" type="submit">Confirmar</button>

            </div>
            <hr class="colorgraph">

        </form>

    </div>
</div>
</div>
</div>
