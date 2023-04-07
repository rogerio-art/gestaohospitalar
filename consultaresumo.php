<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="my-3">A sua encomenda - resumo</h3>
            <hr>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col">

            <div style="margin-bottom: 80px;">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th class="text-center">Quantidade</th>
                            <th class="text-end">Valor total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $index = 0;
                        $total_rows = count($carrinho);
                        ?>
                        <?php foreach ($carrinho as $produto) : ?>
                            <?php if ($index < $total_rows - 1) : ?>

                                <!-- lista dos produtos -->
                                <tr>
                                    <td class="align-middle"><?= $produto['titulo'] ?></td>
                                    <td class="text-center align-middle"><?= $produto['quantidade'] ?></td>
                                    <td class="text-end align-middle"><?= number_format($produto['preco'], 2, ',', '.') . 'Kz' ?></td>
                                </tr>

                            <?php else : ?>

                                <!-- total -->
                                <tr>
                                    <td></td>
                                    <td class="text-end">
                                        <h4>Total:</h4>
                                    </td>
                                    <td class="text-end">
                                        <h4><?= number_format($produto, 2, ',', '.') . 'kz' ?></h4>
                                    </td>
                                </tr>

                            <?php endif; ?>
                            <?php $index++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>


                <!-- dados do cliente -->
                <h5 class="bg-dark text-white p-2">Dados do Cliente</h5>
                <div class="row">
                    <div class="col">
                        <p>Nome: <strong><?= $cliente->nome_completo ?></strong></p>
                        <p>Morada: <strong><?= $cliente->morada ?></strong></p>
                        <p>Cidade: <strong><?= $cliente->cidade ?></strong></p>
                    </div>
                    <div class="col">
                        <p>Email: <strong><?= $cliente->email ?></strong></p>
                        <p>Telefone: <strong><?= $cliente->telefone ?></strong></p>
                    </div>
                </div>

                <!-- DADOS DE PAGAMENTO -->
                <h5 class="bg-dark text-white p-2">Dados do Pagamento</h5>
                <div class="row">
                    <div class="col">
                        <p>Banco BAI: Pagamento em Kz</p>
                        <p>NOME: NESSECO COMERCIO E PRESTAÇÃO DE CERVIÇO</p>
                        <p>IBAN: 1234567890</p>
                        <p>Código da encomenda: <strong><?= $_SESSION['codigo_encomenda'] ?></strong></p>
                        <p>Total: <strong><?= number_format($produto, 2, ',', '.') . 'Kz' ?></strong></p>
                    </div>
                </div>


                <!-- morada alternativa -->
                <h5 class="bg-dark text-white p-2">Morada alternativa de entrega</h5>
                <div class="form-check">
                    <input class="form-check-input" onchange="usar_morada_alternativa()" type="checkbox" name="check_morada_alternativa" id="check_morada_alternativa">
                    <label class="form-check-label" for="check_morada_alternativa">Definir uma morada alternativa.</label>
                </div>


                <!-- morada alternativa -->
                <div id="morada_alternativa" style="display: none">

                    <!-- morada -->
                    <div class="mb-3">
                        <label class="form-label">Morada:</label>
                        <input class="form-control" type="text" id="text_morada_alternativa">
                    </div>

                    <!-- cidade -->
                    <div class="mb-3">
                        <label class="form-label">Cidade:</label>
                        <input class="form-control" type="text" id="text_cidade_alternativa">
                    </div>

                    <!-- email -->
                    <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <input class="form-control" type="email" id="text_email_alternativo">
                    </div>

                    <!-- telefone -->
                    <div class="mb-3">
                        <label class="form-label">Telefone:</label>
                        <input class="form-control" type="text" id="text_telefone_alternativo">
                    </div>

                </div>



                <div class="row my-5">
                    <div class="col">
                        <a href="?a=carrinho" class="btn btn-primary">Cancelar</a>
                    </div>

                    <div class="col text-end">
                        <a href="?a=confirmar_encomenda" onclick="morada_alternativa()" class="btn btn-primary">Confirmar encomenda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>