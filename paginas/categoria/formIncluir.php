<?php include('../menu.php') ?>


<div class="container-fluid">
    
    <h2>Nova Categoria</h2>
    <hr/>
    
    <div class="row">
        <div class="col-md-6">
            <form method="post" action="processaInclusao.php">
                <div class="form-group">
                    <label class="control-label">Descrição</label>
                    <input type="text" name="descricao" class="form-control" />
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