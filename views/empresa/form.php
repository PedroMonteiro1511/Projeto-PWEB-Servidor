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
        <form role="form">
            <h2>Alterar os dados do Perfil.</h2>
            <hr class="colorgraph">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="username">DESIGNAÇÃO SOCIAL: </label>
                        <input type="text" name="username" id="username" class="form-control input-lg"
                               placeholder="username" tabindex="1" value="<?= $_SESSION['empresa_desigsocial'] ?>">
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="username">Email: </label>
                    <input type="email" name="email" id="email" class="form-control input-lg"
                           placeholder="Email Address"
                           tabindex="4" value="<?= $_SESSION['empresa_email'] ?>" >
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3">
                    <div class="form-group">
                        <label for="telefone">Telefone: </label>
                        <input type="text" name="telefone" id="telefone" class="form-control input-lg"
                               placeholder="Telefone" tabindex="1" value="<?= $_SESSION['empresa_telefone'] ?>">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3">
                    <div class="form-group">
                        <label for="morada">Morada: </label>
                        <input type="text" name="morada" id="morada"
                               class="form-control input-lg" placeholder="Morada" tabindex="6" value="<?= $_SESSION['empresa_morada'] ?>">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3">
                    <div class="form-group">
                        <label for="codpostal">Codigo Postal: </label>
                        <input type="text" name="codpostal" id="codpostal"
                               class="form-control input-lg" placeholder="Codigo Postal: " tabindex="6" value="<?= $_SESSION['empresa_codpostal'] ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="localidade">Localidade: </label>
                        <input type="text" name="localidade" id="localidade" class="form-control input-lg"
                               placeholder="Localidade" tabindex="1" value="<?= $_SESSION['empresa_localidade'] ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-7">
                    <div class="form-group">
                        <label for="localidade">Capital Social: </label>
                        <input type="text" name="localidade" id="localidade" class="form-control input-lg"
                               placeholder="Localidade" tabindex="1" value="<?= $_SESSION['empresa_capsocial'] ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <a href="index.php?c=user&a=form" class="btn btn-success">Confirmar</a> <?php //TODO Ainda nao altera os dados ?>
            </div>
            <hr class="colorgraph">

        </form>

    </div>
</div>
</div>
</div>
