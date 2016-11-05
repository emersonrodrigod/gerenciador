<?php include('../menu.php'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h2>Lançamentos</h2>
            <hr/>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <a href="pagar.php" class="btn btn-danger">
                <i class="glyphicon glyphicon-arrow-down"></i>
                Conta  à Pagar
            </a>

            <a href="receber.php" class="btn btn-success">
                <i class="glyphicon glyphicon-arrow-up"></i>
                Conta  à Receber
            </a>

            <a href="#" class="btn btn-primary">
                <i class="glyphicon glyphicon-resize-small"></i>
                Transferências
            </a>

        </div>

        <div class="col-md-2">
            <select class="form-control">
                <option value="">Usuario</option>
            </select>
        </div>

        <div class="col-md-2">
            <select class="form-control">
                <option value="">Categoria</option>
            </select>
        </div>

        <div class="col-md-2">
            <select class="form-control">
                <option value="">Conta/Caixa</option>
            </select>
        </div>
    </div>
    <br/><br/>

    <div class="row">
        <div class="filtros well">

            <div class="form-group">
                <div class="col-md-2">
                    <select class="form-control">
                        <option value="">Selecione o Período</option>
                        <option value="">Mês Atual</option>
                        <option value="">Semana</option>
                        <option value="">Ano</option>
                        <option value="">personalizado</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <input tyle="text" class="form-control"
                           placeholder="data inicial">
                </div>

                <div class="col-md-2">
                    <input tyle="text" class="form-control"
                           placeholder="data Final">
                </div>

                <div class="col-md-2">
                    <button class="btn btn-primary">Filtrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="txt-center">Emissão</th>
                        <th>Descrição</th>
                        <th class="txt-center">Vencimento</th>
                        <th class="txt-center">Situação</th>
                        <th class="txt-center">Valor</th>
                        <th class="txt-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="txt-center">22/10/2016</td>
                        <td>
                            <span class="badge categoria-receber">Salários</span>
                            Recebimento de salário
                        </td>
                        <td class="txt-center">22/10/2016</td>
                        <td class="txt-center">
                            <i 
                                class="glyphicon glyphicon glyphicon-thumbs-up"
                                title="PAGO/RECEBIDO"
                                >

                            </i>
                        </td>
                        <td class="txt-center"><span class="receber">R$ 2.000,00</span></td>
                        <td class="txt-center">
                            <a href="#" class="btn btn-xs btn-success">
                                <i class="glyphicon glyphicon-arrow-down" title="BAIXAR/RECEBER"></i>
                            </a>

                            <a href="#" class="btn btn-xs btn-danger">
                                <i class="glyphicon glyphicon-arrow-up" title="CANCELA BAIXA/RECEBIMENTO"></i>
                            </a>

                            <a href="#" class="btn btn-xs btn-primary">
                                <i class="glyphicon glyphicon-pencil" title="EDITAR"></i>
                            </a>

                            <a href="#" class="btn btn-xs btn-danger">
                                <i class="glyphicon glyphicon-trash" title="EXCLUIR"></i>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td class="txt-center">22/10/2016</td>
                        <td>
                            <span class="badge categoria-pagar">Moradia</span>
                            Aluguel
                        </td>
                        <td class="txt-center">22/10/2016</td>
                        <td class="txt-center">
                            <i 
                                class="glyphicon glyphicon glyphicon-thumbs-down"
                                title="PENDENTE"
                                >

                            </i>
                        </td>
                        <td class="txt-center"><span class="pagar">R$ 650,00</span></td>
                        <td class="txt-center">
                            <a href="#" class="btn btn-xs btn-success">
                                <i class="glyphicon glyphicon-arrow-down" title="BAIXAR/RECEBER"></i>
                            </a>

                            <a href="#" class="btn btn-xs btn-danger">
                                <i class="glyphicon glyphicon-arrow-up" title="CANCELA BAIXA/RECEBIMENTO"></i>
                            </a>

                            <a href="#" class="btn btn-xs btn-primary">
                                <i class="glyphicon glyphicon-pencil" title="EDITAR"></i>
                            </a>

                            <a href="#" class="btn btn-xs btn-danger">
                                <i class="glyphicon glyphicon-trash" title="EXCLUIR"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>




<?php include('../rodape.php'); ?>
