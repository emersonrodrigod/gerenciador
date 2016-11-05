<?php include('../menu.php'); ?>

<div class="container-fluid">

    <h2>Trocar a senha</h2>
    <hr/>
    
     <div class="row">
        <div class="col-md-6">
            <form method="post" action="processaSenha.php">
                <div class="form-group">
                    <label class="control-label">Senha Atual</label>
                    <input type="password" name="atual" class="form-control" />
                </div>
                
                 <div class="form-group">
                    <label class="control-label">Nova Senha</label>
                    <input type="password" name="nova" class="form-control" />
                </div>
                
                <div class="form-group">
                    <input type="submit" value="Trocar" class="btn btn-primary" />
                    <a href="/gerenciador" class="btn btn-danger">Cancelar</a>
                        
                </div>
            </form>
        </div>
    </div>

</div>

<?php include('../rodape.php'); ?>

