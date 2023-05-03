<style>

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


<form action="index.php?c=user&a=store" method="post">
    <div class="form-group">
        <label for="username">Username:</label>
        <input value="<?php if (isset($model)) {
            echo $model->username;
        } ?>" type="text" id="username" name="username" placeholder="Username" required>
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
        <label for="password">Password:</label>
        <input value="<?php if (isset($model)) {
            echo $model->password;
        } ?>" type="password" id="password" name="password" placeholder="Password" required>
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
        <label for="email">Email:</label>
        <input value="<?php if (isset($model)) {
            echo $model->email;
        } ?>" type="email" id="email" name="email" placeholder="Email" required>
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
        <label for="telefone">Telefone:</label>
        <input value="<?php if (isset($model)) {
            echo $model->telefone;
        } ?>" type="tel" id="telefone" name="telefone" maxlength="9" placeholder="Numero de Telefone" required>
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
        <label for="nif">NIF:</label>
        <input value="<?php if (isset($model)) {
            echo $model->nif;
        } ?>" type="text" id="nif" name="nif" placeholder="Numero NIF" maxlength="9" required>
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
        <label for="morada">Morada:</label>
        <input value="<?php if (isset($model)) {
            echo $model->morada;
        } ?>" type="text" id="morada" name="morada" placeholder="Morada" required>
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
        <label for="codpostal">Código Postal:</label>
        <input value="<?php if (isset($model)) {
            echo $model->codpostal;
        } ?>" type="text" id="codpostal" name="codpostal" pattern="[0-9]{4}-[0-9]{3}" placeholder="Código postal"
               required>
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
        <label for="localidade">Localidade:</label>
        <input value="<?php if (isset($model)) {
            echo $model->localidade;
        } ?>" type="text" id="localidade" name="localidade" placeholder="Localidade" required>
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
        <label for="localidade">Role:</label>
        <select class="form-control" name="role_edit" id="role_edit">
            <option value="" disabled hidden selected>Selecionar uma Role</option>
            <option value="<?= User::$Role_User_Cliente ?>"><?= User::$Role_User_Cliente ?></option>
            <option value="<?= User::$Role_User_Funcionario ?>"><?= User::$Role_User_Funcionario ?></option>
            <option value="<?= User::$Role_User_Admin ?>"><?= User::$Role_User_Admin ?></option>

        </select>
    </div>
    <div class="form-group" style="align-items: center; margin-top: 20px">
        <button type="submit" class="btn btn-primary">Adicionar Funcionário</button>
    </div>
</form>