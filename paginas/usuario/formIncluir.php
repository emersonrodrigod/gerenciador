<?php include('../menu.php') ?>


<div class="container-fluid">
    
    <h2>Novo Usuário</h2>
    <hr/>
    
    <div class="row">
        <div class="col-md-6">
            <form method="post" action="processaInclusao.php">
                <div class="form-group">
                    <label class="control-label">Nome</label>
                    <input type="text" name="nome" class="form-control" />
                </div>
                
                 <div class="form-group">
                    <label class="control-label">Username</label>
                    <input type="text" name="username" class="form-control" />
                </div>
                
                 <div class="form-group">
                    <label class="control-label">Senha</label>
                    <input type="password" name="senha" class="form-control" />
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