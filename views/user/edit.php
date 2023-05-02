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

    .row{
        --bs-gutter-x: 0rem !important;
    }

</style>

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
            <div class="row" style="margin-top: 10px">

                <button class="btn btn-success" type="submit">Confirmar</button>

            </div>
            <hr class="colorgraph">

        </form>

    </div>
</div>
</div>
</div>
