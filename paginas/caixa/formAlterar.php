<?php 

include('../menu.php'); 
include('../conexao.php');

$id = $_GET['id'];

$sql = "select * from caixa where id = $id";

$query = $conexao->query($sql);

$resultado = $query->fetch_array();

?>


<div class="container-fluid">
    
    <h2>Editar Conta/caixa</h2>
    <hr/>
    
    <div class="row">
        <div class="col-md-6">
            <form method="post" action="processaAlteracao.php">
                <input type="hidden" name="id" value="<?php echo $resultado['id']; ?>" />
                
                <div class="form-group">
                    <label class="control-label">Descrição</label>
                    <input type="text" name="descricao" class="form-control" value="<?php echo $resultado['descricao']; ?>"/>
                </div>
                
                <div class="form-group">
                    <input type="submit" value="Alterar" class="btn btn-primary" />
                    <a href="index.php" class="btn btn-danger">Cancelar</a>
                        
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('../rodape.php') ?>

