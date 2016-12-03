<?php include('../menu.php'); ?>
<?php include('../conexao.php'); ?>

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

            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalTransferencia">
                <i class="glyphicon glyphicon-resize-small"></i>
                Transferências
            </a>

        </div>

        <div class="col-md-2">
            <select class="form-control">
                <option value="">Usuario</option>
            </select>
        </div>

        <form method="post" action="" >
            <div class="col-md-2">
                <select name="categoria" class="form-control">
                    <option value="">Selecione uma categoria</option>
                    <?php
                    $sql = "select * from categoria";
                    $query = $conexao->query($sql);

                    while ($resultado = $query->fetch_array()) {
                        ?>

                        <option value="<?php echo $resultado['id']; ?>"><?php echo $resultado['descricao']; ?></option>

                    <?php } ?>

                </select>
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary">Filtrar</button>
            </div>
        </form>
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

                    <?php
                    if (isset($_POST['categoria'])) {
                        $categoria = $_POST['categoria'];

                        $sql = "select * from lancamento left join categoria on (categoria.id = lancamento.categoria_id) where categoria_id = $categoria";
                    } else {

                        $sql = "select * from lancamento left join categoria on (categoria.id = lancamento.categoria_id)";
                    }
                    $query = $conexao->query($sql);

                    while ($resultado = $query->fetch_array()) {
                        ?>



                        <tr>
                            <td class="txt-center"><?php echo date("d/m/Y", strtotime($resultado['emissao'])); ?></td>
                            <td>
                                <?php
                                if ($resultado['tipo'] == 'P') {
                                    $tipo = 'categoria-pagar';
                                    $valor = 'pagar';
                                } else {
                                    $tipo = 'categoria-receber';
                                    $valor = 'receber';
                                }
                                ?>
                                <span class="badge <?php echo $tipo; ?>"><?php echo $resultado[12]; ?></span>
                                <?php echo $resultado[1]; ?>
                            </td>
                            <td class="txt-center"><?php echo date("d/m/Y", strtotime($resultado['vencimento'])); ?></td>
                            <td class="txt-center">

                                <?php
                                if ($resultado['situacao'] == 'R') {
                                    $situacao = 'glyphicon-thumbs-up';
                                } else {
                                    $situacao = 'glyphicon-thumbs-down';
                                }
                                ?>

                                <i 
                                    class="glyphicon <?php echo $situacao; ?>"
                                    title="PAGO/RECEBIDO"
                                    >

                                </i>
                            </td>
                            <td class="txt-center"><span class="<?php echo $valor; ?>">R$ <?php echo number_format($resultado['valor'], 2, ',', '.'); ?></span></td>
                            <td class="txt-center">

                                <?php if ($resultado['situacao'] == 'A') { ?>
                                    <a href="baixa.php?id=<?php echo $resultado[0]; ?>" class="btn btn-xs btn-success">
                                        <i class="glyphicon glyphicon-arrow-down" title="BAIXAR/RECEBER"></i>
                                    </a>
                                <?php } ?>

                                <?php if ($resultado['situacao'] == 'R') { ?>
                                    <a href="processaEstorno.php?id=<?php echo $resultado[0]; ?>" class="btn btn-xs btn-danger">
                                        <i class="glyphicon glyphicon-arrow-up" title="CANCELA BAIXA/RECEBIMENTO"></i>
                                    </a>
                                <?php } ?>

                                <?php if ($resultado['situacao'] == 'A') { ?>
                                    <a href="#" class="btn btn-xs btn-primary">
                                        <i class="glyphicon glyphicon-pencil" title="EDITAR"></i>
                                    </a>

                                    <a href="#" class="btn btn-xs btn-danger">
                                        <i class="glyphicon glyphicon-trash" title="EXCLUIR"></i>
                                    </a>
                                <?php } ?>
                            </td>
                        </tr>


                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!--Modal Transferencia -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalTransferencia">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Transferência entre contas</h4>
            </div>
            <form method="post" action="processaTransferencia.php">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="control-label">Emissão</label>
                                <input type="date" name="emissao" class="form-control"/>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Valor</label>
                                <input type="text" name="valor" class="form-control" />
                            </div>



                            <div class="form-group">
                                <label class="control-label">Caixa Origem</label>
                                <select name="caixa_origem" class="form-control">
                                    <option value="">Selecione um Caixa</option>
                                    <?php
                                    $sql = "select * from caixa";
                                    $query = $conexao->query($sql);

                                    while ($resultado = $query->fetch_array()) {
                                        ?>

                                        <option value="<?php echo $resultado['id']; ?>"><?php echo $resultado['descricao']; ?></option>

                                    <?php } ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Caixa Destino</label>
                                <select name="caixa_destino" class="form-control">
                                    <option value="">Selecione um Caixa</option>
                                    <?php
                                    $sql = "select * from caixa";
                                    $query = $conexao->query($sql);

                                    while ($resultado = $query->fetch_array()) {
                                        ?>

                                        <option value="<?php echo $resultado['id']; ?>"><?php echo $resultado['descricao']; ?></option>

                                    <?php } ?>

                                </select>
                            </div>




                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-primary" value="Confirmar" />
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php include('../rodape.php'); ?>
