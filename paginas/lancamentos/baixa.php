<?php include('../menu.php'); ?>
<?php include('../conexao.php'); ?>

<?php

$id = $_GET['id'];

$sql = "select * from lancamento where id = $id";

$query = $conexao->query($sql);

$resultado = $query->fetch_array();

?>


<div class="container-fluid">

    <h2>Baixa de conta</h2>
    <hr/>

    <div class="row">
        <div class="col-md-6">
            <form method="post" action="processaBaixa.php">
                <div class="form-group">
                    <label class="control-label">Descrição</label>
                    <input type="text" name="descricao" class="form-control" value="<?php echo $resultado['descricao']; ?>"/>
                </div>
                
                <input type="hidden" name="id" value="<?php echo $resultado['id']; ?>">

                <div class="form-group">
                    <label class="control-label">Emissão</label>
                    <input type="date" name="emissao" class="form-control" value="<?php echo date("d/m/Y",strtotime($resultado['emissao']));?>" />
                </div>

                <div class="form-group">
                    <label class="control-label">Vencimento</label>
                    <input type="date" name="vencimento" class="form-control" value="<?php echo date("d/m/Y",strtotime($resultado['vencimento'])); ?>"/>
                </div>

                <div class="form-group">
                    <label class="control-label">Valor</label>
                    <input type="text" name="valor" class="form-control" value="R$ <?php echo number_format($resultado['valor'],2,',','.'); ?>" />
                </div>
                
                 <div class="form-group">
                    <label class="control-label">Data da baixa</label>
                    <input type="date" name="baixa" class="form-control"/>
                </div>
                
                  
                <div class="form-group">
                    <label class="control-label">Caixa</label>
                    <select name="caixa" class="form-control">
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
                    <input type="submit" value="Baixar" class="btn btn-primary" />
                    <a href="index.php" class="btn btn-danger">Cancelar</a>
                </div>
              
            </form>
        </div>
    </div>
</div>

<?php include('../rodape.php') ?>