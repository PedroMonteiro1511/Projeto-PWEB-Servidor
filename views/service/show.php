<?php

?>


<form action="index.php?c=service&a=index" method="post">

    <h4 class="display-4 text-center">Serviço</h4>
    <hr>
    <div class="form-group mt-4">
        <label for="referencia">Referência:</label>
        <input type="text" class="form-control" name="referencia" value="<?= $model->referencia ?>" disabled>
    </div>

    <div class="form-group mt-4">
        <label for="description">Descrição:</label>
        <input type="text" class="form-control" name="descricao" value="<?= $model->descricao ?>" disabled>
    </div>

    <div class="form-group mt-4">
        <label for="preco">Preço:</label>
        <input type="text" class="form-control" name="preco" value="<?= $model->preco ?>€" disabled>
    </div>

    <div class="form-group mt-4">
        <label for="idIva">Iva:</label>
        <input type="text" class="form-control" id="idIva" name="ivaid"
               value="<?= $model->iva->percentagem . "% - " .
               $model->iva->descricao ?>" disabled>
    </div>
    <a href="index.php?c=service&a=index" class="btn btn-secondary mt-4" role="button"
       aria-pressed="true">Voltar</a>
</form>
