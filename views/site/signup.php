<?php

if(isset($errorsMessage)){
    var_dump($errorsMessage->on('email'));
}

?>

<html>
    <div class="container">
        <form action="index.php?c=site&a=signup" method="post">
            <div class="form-group">
                <label for="inputName">Username:</label>
                <input type="text" class="form-control" id="inputUsername" aria-describedby="emailHelp" placeholder="Username" name="username">
                <?php if(isset($errorsMessage)) {print_r($errorsMessage->on('username'));}?>
            </div>
            <div class="form-group">
                <label for="inputEmail">Email:</label>
                <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Email" name="email">
            </div>
            <div class="form-group">
                <label for="inputTelefone">Telefone:</label>
                <input type="text" class="form-control" id="inputEmail" aria-describedby="telefoneHelp" placeholder="Telefone" name="telefone">
            </div>
            <div class="form-group">
                <label for="inputNif">Nif:</label>
                <input type="text" class="form-control" id="inputNif" aria-describedby="nifHelp" placeholder="Nif" name="nif">
            </div>
            <div class="form-group">
                <label for="inputMorada">Morada:</label>
                <input type="text" class="form-control" id="inputEmail" aria-describedby="moradaHelp" placeholder="Morada" name="morada">
            </div>
            <div class="form-group">
                <label for="inputCodPostal">Código-Postal:</label>
                <input type="text" class="form-control" id="inputEmail" aria-describedby="codpostalHelp" placeholder="Código-Postal" name="codPostal">
            </div>
            <div class="form-group">
                <label for="inputLocalidade">Localidade:</label>
                <input type="text" class="form-control" id="inputLocalidade" aria-describedby="localidadeHelp" placeholder="Localidade" name="localidade">
            </div>
            <div class="form-group">
                <label for="inputPassword">Password:</label>
                <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Registar</button>
        </form>
    </div>
</html>
