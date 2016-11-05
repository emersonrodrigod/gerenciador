<?php include('../menu.php'); ?>
<?php include('../conexao.php'); ?>


<div class="container-fluid">

    <h2>Nova Conta a pagar</h2>
    <hr/>

    <div class="row">
        <div class="col-md-6">
            <form method="post" action="processaPagar.php">
                <div class="form-group">
                    <label class="control-label">Descrição</label>
                    <input type="text" name="descricao" class="form-control" />
                </div>

                <div class="form-group">
                    <label class="control-label">Emissão</label>
                    <input type="date" name="emissao" class="form-control" />
                </div>

                <div class="form-group">
                    <label class="control-label">Vencimento</label>
                    <input type="date" name="vencimento" class="form-control" />
                </div>

                <div class="form-group">
                    <label class="control-label">Valor</label>
                    <input type="text" name="valor" class="form-control" />
                </div>


                <div class="form-group">
                    <label class="control-label">Categoria</label>
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


                <div class="form-group">
                    <input type="submit" value="cadastrar" class="btn btn-primary" />
                    <a href="index.php" class="btn btn-danger">Cancelar</a>

                </div>
            </form>
        </div>
    </div>
</div>

<?php include('../rodape.php') ?>