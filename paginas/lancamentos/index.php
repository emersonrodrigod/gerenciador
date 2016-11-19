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
                    
                     <?php
                    //Arquivo de conexao com o banco
                    include('../conexao.php');

                    $sql = "select * from lancamento join categoria on (categoria.id = lancamento.categoria_id)";

                    $query = $conexao->query($sql);

                    while ($resultado = $query->fetch_array()) {
                        ?>
                    
                    
                    
                     <tr>
                        <td class="txt-center"><?php echo date("d/m/Y",strtotime($resultado['emissao']));?></td>
                        <td>
                            <?php 
                                if($resultado['tipo'] == 'P'){
                                    $tipo = 'categoria-pagar';
                                    $valor = 'pagar';
                                }else {
                                    $tipo = 'categoria-receber';
                                    $valor = 'receber';
                                }
                            ?>
                            <span class="badge <?php echo $tipo; ?>"><?php echo $resultado[12]; ?></span>
                            <?php echo $resultado['descricao']; ?>
                        </td>
                        <td class="txt-center"><?php echo date("d/m/Y",strtotime($resultado['vencimento'])); ?></td>
                        <td class="txt-center">
                            
                            <?php 
                            if($resultado['situacao'] == 'R') {
                                $situacao = 'glyphicon-thumbs-up';
                            }else {
                                $situacao = 'glyphicon-thumbs-down';
                            }
                            ?>
                            
                            <i 
                                class="glyphicon <?php echo $situacao; ?>"
                                title="PAGO/RECEBIDO"
                                >

                            </i>
                        </td>
                        <td class="txt-center"><span class="<?php echo $valor; ?>">R$ <?php echo number_format($resultado['valor'],2,',','.'); ?></span></td>
                        <td class="txt-center">
                            
                            <?php if($resultado['situacao'] == 'A') { ?>
                            <a href="#" class="btn btn-xs btn-success">
                                <i class="glyphicon glyphicon-arrow-down" title="BAIXAR/RECEBER"></i>
                            </a>
                            <?php }?>

                            <?php if($resultado['situacao'] == 'R') { ?>
                            <a href="#" class="btn btn-xs btn-danger">
                                <i class="glyphicon glyphicon-arrow-up" title="CANCELA BAIXA/RECEBIMENTO"></i>
                            </a>
                            <?php } ?>

                            <?php if($resultado['situacao'] == 'A') { ?>
                            <a href="#" class="btn btn-xs btn-primary">
                                <i class="glyphicon glyphicon-pencil" title="EDITAR"></i>
                            </a>

                            <a href="#" class="btn btn-xs btn-danger">
                                <i class="glyphicon glyphicon-trash" title="EXCLUIR"></i>
                            </a>
                            <?php } ?>
                        </td>
                    </tr>

                    
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>




<?php include('../rodape.php'); ?>
