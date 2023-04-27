<style>


    /* Form styles */
    form {
        margin-top: 20PX;
        background-color: #fff;
        border-radius: 5px;
        padding: 40px;
        box-shadow: 0px 3px 20px #ccc;
    }

    .form-group {

    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="password"],
    input[type="email"],
    input[type="tel"] {
        width: 100%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        color: #333;
    }

    input[type="text"]:focus,
    input[type="password"]:focus,
    input[type="email"]:focus,
    input[type="tel"]:focus {
        outline: none;
        border-color: #3498db;
    }

    input[type="submit"] {
        background-color: #3498db;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
    }

    input[type="submit"]:hover {
        background-color: #2980b9;
    }

    .form-text {
        font-size: 14px;
        color: #777;
    }
</style>
<form action="index.php?c=user&a=update&id=<?= $model->id ?>" method="post">
    <div class="form-group">
        <label for="username_edit">Username:</label>
        <input value="<?php if (isset($model)) {
            echo $model->username;
        } ?>" type="text" id="usernameusername_edit" name="username_edit" placeholder="Username" required>
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
    </div>
    <div class="form-group">
        <label for="password_edit">Password:</label>
        <input value="<?php if (isset($model)) {
            echo $model->password;
        } ?>" type="password" id="password_edit" name="password_edit" placeholder="Password" required>
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
    </div>
    <div class="form-group">
        <label for="email_edit">Email:</label>
        <input value="<?php if (isset($model)) {
            echo $model->email;
        } ?>" type="email" id="email_edit" name="email_edit" placeholder="Email" required>
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
    </div>
    <div class="form-group">
        <label for="telefone_edit">Telefone:</label>
        <input value="<?php if (isset($model)) {
            echo $model->telefone;
        } ?>" type="tel" id="telefone_edit" name="telefone_edit" maxlength="9" placeholder="Numero de Telefone" required>
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
    </div>
    <div class="form-group">
        <label for="nif_edit">NIF:</label>
        <input value="<?php if (isset($model)) {
            echo $model->nif;
        } ?>" type="text" id="nif_edit" name="nif_edit" placeholder="Numero NIF" maxlength="9" required>
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
    </div>
    <div class="form-group">
        <label for="morada_edit">Morada:</label>
        <input value="<?php if (isset($model)) {
            echo $model->morada;
        } ?>" type="text" id="morada_edit" name="morada_edit" placeholder="Morada" required>
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
    </div>
    <div class="form-group">
        <label for="codpostal_edit">Código Postal:</label>
        <input value="<?php if (isset($model)) {
            echo $model->codpostal;
        } ?>" type="text" id="codpostal_edit" name="codpostal_edit" pattern="[0-9]{4}-[0-9]{3}" placeholder="Código postal" required>
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
        <small class="form-text text-muted">Format: 1234-567</small>
    </div>
    <div class="form-group">
        <label for="localidade_edit">Localidade:</label>
        <input value="<?php if (isset($model)) {
            echo $model->localidade;
        } ?>" type="text" id="localidade_edit" name="localidade_edit" placeholder="Localidade" required>
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
    </div>
    <div class="form-group">
        <label for="role_edit">Role:</label>
        <select class="form-control" name="role_edit" id="role_edit">
            <?php if ($_SESSION['active_user_role'] != User::$Role_User_Cliente){ ?>
                <option value="<?= User::$Role_User_Cliente ?>" <?php if (User::$Role_User_Cliente == $model->role){?>selected <?php } ?>><?= User::$Role_User_Cliente ?></option>
                <?php
            }
            if ($_SESSION['active_user_role'] == User::$Role_User_Admin){
                ?>
                <option value="<?= User::$Role_User_Funcionario ?>" <?php if (User::$Role_User_Funcionario == $model->role){?>selected <?php } ?>><?= User::$Role_User_Funcionario ?></option>
                <option value="<?= User::$Role_User_Admin ?>" <?php if (User::$Role_User_Admin == $model->role){?>selected <?php } ?>><?= User::$Role_User_Admin ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group" style="align-items: center; margin-top: 20px">
        <button type="submit" class="btn btn-primary">Alterar Dados!</button>
    </div>
</form>