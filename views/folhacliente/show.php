<div class="container">
    <h4 class="display-4 text-center">Folha de obra</h4>
    <hr>
    <div class="row" id="dadosempresa">
        <section class="col-6">
            <h3>Dados Empresa:</h3>
            <h5>
                <?= $empresa->desigsocial ?>
            </h5>
            <p>
                <?= $empresa->morada ?>,
                <?= $empresa->localidade ?>,
                <?= $empresa->codpostal ?>
            </p>
            <p>Telefone:
                <?= $empresa->telefone ?> | Email:
                <?= $empresa->email ?> | NIF:
                <?= $empresa->nif ?>
            </p>
        </section>

        <section class="col-6">
            <h3>Dados do Cliente</h3>
            <h5>
                <?= $cliente->username ?>
            </h5>
            <p>
                <?= $cliente->morada ?>,
                <?= $cliente->localidade ?>,
                <?= $cliente->codpostal ?>
            </p>
            <p>Telefone:
                <?= $cliente->telefone ?> | Email:
                <?= $cliente->email ?> | NIF:
                <?= $cliente->nif ?>
            </p>
            </p>
        </section>
    </div>

    <hr>
    <section id="dadosfolha">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Referência</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Valor</th>
                    <th scope="col">ValorIva</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($model->linhas as $linha) { ?>
                    <tr>

                        <td>
                            <?= $linha->service->referencia ?>
                        </td>
                        <td>
                            <?= $linha->service->descricao ?>
                        </td>
                        <td>
                            <?= $linha->quantidade ?>
                        </td>
                        <td>
                            <?= $linha->valor ?>€
                        </td>
                        <td>
                            <?= $linha->valoriva ?>€
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <?php if (count($model->linhas) == 0) {
            echo 'Não existem serviços.' . '<hr>';
        } ?>
        <div class="mt-4">
            <h5>Total(sem iva):
                <?= $model->valortotal ?> €
            </h5>
            <h4>Total:
                <?= $model->ivatotal ?> €
            </h4>
        </div>
    </section>

    <hr>
    <section id="dadosfuncionario">
        <div style="margin-top: 100px; text-align: center">
            <h3><u>Funcionário</u></h3>
            <p>
                <?= $funcionario->username ?><br>
                <?= $funcionario->email ?>
            </p>
        </div>
    </section>

    <div class="text-center">
        <button onclick='handlePrint()'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                <path
                    d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
            </svg></button>
        <script type="text/javascript">
            const handlePrint = () => {
                var printContents1 = document.getElementById('dadosempresa').outerHTML;
                var printContents2 = document.getElementById('dadosfolha').outerHTML;
                var printContents3 = document.getElementById('dadosfuncionario').outerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents1 + printContents2 + printContents3;

                window.print();

                document.body.innerHTML = originalContents;
            }
        </script>
    </div>

</div>