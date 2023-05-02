<h4 class="display-4 text-center">Dados Pagamento</h4>
<hr>
<section>
    <form action="index.php?c=folhacliente&a=submitPay&id=<?= $model->id ?>" method="post"
        onsubmit="return validateForm()">
        <div class="form-group mt-4">
            <label for="card_number">Número do Cartão:</label>
            <input type="text" class="form-control" name="card_number" id="card_number" maxlength="16" minlength="16"
                placeholder="Inserir Número" required>
        </div>

        <div class="form-group mt-4">
            <label for="card_nome">Nome do Cartão:</label>
            <input type="text" class="form-control" name="card_nome" id="card_nome" placeholder="Inserir Nome" required>
        </div>

        <div class="form-group mt-4">
            <label for="card_validade">Validade:</label>
            <input type="text" class="form-control" name="card_validade" maxlength="5" id="card_validade"
                pattern="[0-9]{2}/[0-9]{2}" placeholder="Inserir Validade" required>
        </div>
        <small class="form-text text-muted">Format: 00/00</small>

        <div class="form-group mt-4">
            <label for="card_code">CV Códígo:</label>
            <input type="text" class="form-control" name="card_code" id="card_code" maxlength="3" minlength="3"
                placeholder="Inserir Código" required>
        </div>


        <p class="mt-4">
            <button type="submit" class="btn btn-primary" name="seguinte">Pagar</button>
            <a href="index.php?c=folhacliente&a=index" class="btn btn-secondary" role="button"
                aria-pressed="true">Voltar</a>
        </p>

    </form>
</section>


<script>

    function validateForm() {
        let dateInput = document.getElementById("card_validade").value;

        let firstDig = dateInput.substring(0, 2);
        let lastDig = dateInput.substring(3, 5);

        const currentDate = new Date();
        let currentMoth = currentDate.getMonth() + 1;

        let numberFirstDig = parseInt(firstDig);
        let numberLastDig = parseInt(lastDig);


        if (numberLastDig > 23) {
            return true;

        } else if (numberLastDig == 23) {
            if (numberFirstDig >= currentMoth) {
                return true;
            } else {
                alert("A data do cartão é inválido.");
                return false;
            }
        } else {
            alert("A data do cartão é inválido.");
            return false;
        }
    }
</script>