<?php
?>

<html>
<div class="container">
    <form action="index.php?c=site&a=signup" method="post">
        <div class="form-group">
            <label for="inputName">Username:</label>
            <input type="text" class="form-control" id="inputUsername" aria-describedby="emailHelp"
                   placeholder="Username"
                   name="username"
                   value="<?php if (isset($model)) {
                       echo $model->username;
                   } ?>">
        </div>
        <p style="color: red"><?php
            if (isset($model->errors)) {
                if (is_array($model->errors->on('username'))) {
                    foreach ($model->errors->on('username') as $error) {
                        echo $error . '<br>';
                    }
                } else {
                    echo $model->errors->on('username');
                }
            }
            ?>
        </p>

        <div class="form-group">
            <label for="inputEmail">Email:</label>
            <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Email"
                   name="email"
                   value="<?php if (isset($model)) {
                       echo $model->email;
                   } ?>">
        </div>
        <p style="color: red"><?php
            if (isset($model->errors)) {
                if (is_array($model->errors->on('email'))) {
                    foreach ($model->errors->on('email') as $error) {
                        echo $error . '<br>';
                    }
                } else {
                    echo $model->errors->on('email');
                }
            }
            ?>
        </p>

        <div class="form-group">
            <label for="inputTelefone">Telefone:</label>
            <input type="text" class="form-control" id="inputEmail" aria-describedby="telefoneHelp"
                   placeholder="Telefone"
                   name="telefone"
                   maxlength="9"
                   value="<?php if (isset($model)) {
                       echo $model->telefone;
                   } ?>">
        </div>
        <p style="color: red"><?php
            if (isset($model->errors)) {
                if (is_array($model->errors->on('telefone'))) {
                    foreach ($model->errors->on('telefone') as $error) {
                        echo $error . '<br>';
                    }
                } else {
                    echo $model->errors->on('telefone');
                }
            }
            ?>
        </p>

        <div class="form-group">
            <label for="inputNif">Nif:</label>
            <input type="text" class="form-control" id="inputNif" aria-describedby="nifHelp"
                   placeholder="Nif"
                   name="nif"
                   maxlength="9"
                   value="<?php if (isset($model)) {
                       echo $model->nif;
                   } ?>">
        </div>
        <p style="color: red"><?php
            if (isset($model->errors)) {
                if (is_array($model->errors->on('nif'))) {
                    foreach ($model->errors->on('nif') as $error) {
                        echo $error . '<br>';
                    }
                } else {
                    echo $model->errors->on('nif');
                }
            }
            ?>
        </p>

        <div class="form-group">
            <label for="inputMorada">Morada:</label>
            <input type="text" class="form-control" id="inputEmail" aria-describedby="moradaHelp"
                   placeholder="Morada"
                   name="morada"
                   value="<?php if (isset($model)) {
                       echo $model->morada;
                   } ?>">
        </div>
        <p style="color: red"><?php
            if (isset($model->errors)) {
                if (is_array($model->errors->on('morada'))) {
                    foreach ($model->errors->on('morada') as $error) {
                        echo $error . '<br>';
                    }
                } else {
                    echo $model->errors->on('morada');
                }
            }
            ?>
        </p>

        <div class="form-group">
            <label for="inputCodPostal">Código-Postal:</label>
            <input type="text" class="form-control" id="inputEmail" aria-describedby="codpostalHelp"
                   placeholder="Código-Postal"
                   name="codPostal"
                   maxlength="8"
                   value="<?php if (isset($model)) {
                       echo $model->codpostal;
                   } ?>">
        </div>
        <p style="color: red"><?php
            if (isset($model->errors)) {
                if (is_array($model->errors->on('codpostal'))) {
                    foreach ($model->errors->on('codpostal') as $error) {
                        echo $error . '<br>';
                    }
                } else {
                    echo $model->errors->on('codpostal');
                }
            }
            ?>
        </p>

        <div class="form-group">
            <label for="inputLocalidade">Localidade:</label>
            <input type="text" class="form-control" id="inputLocalidade" aria-describedby="localidadeHelp"
                   placeholder="Localidade"
                   name="localidade"
                   value="<?php if (isset($model)) {
                       echo $model->localidade;
                   } ?>">
        </div>
        <p style="color: red"><?php
            if (isset($model->errors)) {
                if (is_array($model->errors->on('localidade'))) {
                    foreach ($model->errors->on('localidade') as $error) {
                        echo $error . '<br>';
                    }
                } else {
                    echo $model->errors->on('localidade');
                }
            }
            ?>
        </p>

        <div class="form-group">
            <label for="inputPassword">Password:</label>
            <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
        </div>
        <p style="color: red"><?php
            if (isset($model->errors)) {
                if (is_array($model->errors->on('password'))) {
                    foreach ($model->errors->on('password') as $error) {
                        echo $error . '<br>';
                    }
                } else {
                    echo $model->errors->on('password');
                }
            }
            ?>
        </p>

        <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Registar</button>
    </form>
</div>
</html>
