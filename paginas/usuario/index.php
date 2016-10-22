<?php include('../menu.php') ?>

<div class="container-fluid">

    <h2>Cadastro de Usuários</h2>
    <hr/>

    <div class="row">
        <div class="col-md-12">
            <a href="formIncluir.php" class="btn btn-primary">Novo Usuário</a>
        </div>
    </div>

    <br/>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Username</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //Arquivo de conexao com o banco
                    include('../conexao.php');

                    $sql = "select * from usuario";

                    $query = $conexao->query($sql);

                    while ($resultado = $query->fetch_array()) {
                        ?>

                        <tr>
                            <td><?php echo $resultado['id']; ?></td>
                            <td><?php echo $resultado['nome']; ?></td>
                            <td><?php echo $resultado['username']; ?></td>
                            <td>
                                <a href="formAlterar.php?id=<?php echo $resultado['id']; ?>" class="btn btn-primary btn-xs">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </a>

                                <a href="excluir.php?id=<?php echo $resultado['id']; ?>" class="btn btn-danger btn-xs">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a>
                            </td>
                        </tr>

<?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('../rodape.php') ?>


