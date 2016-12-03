<?php include('paginas/menu.php'); ?>
<?php

 

function pagar($caixa) {
    include('paginas/conexao.php');
    $sql = "select caixa_id, sum(valor) "
            . "from lancamento where tipo = 'P' "
            . "and situacao = 'R' "
            . "and caixa_id = $caixa "
            . "group by caixa_id";
    
    $query = $conexao->query($sql);
    
    $resultado = $query->fetch_array();
    
    return $resultado[1];
}

function receber($caixa) {
      include('paginas/conexao.php');
    $sql = "select caixa_id, sum(valor) "
            . "from lancamento where tipo = 'R' "
            . "and situacao = 'R' "
            . "and caixa_id = $caixa "
            . "group by caixa_id";
    
    $query = $conexao->query($sql);
    
    $resultado = $query->fetch_array();
    
    return $resultado[1];
}

function saldo($caixa){
    $saldo =  receber($caixa) - pagar($caixa);
    //return number_format($saldo,2,',','.');
    return $saldo;
}
?>

<div class="container-fluid">
    
    <script type="text/javascript">

            // Load the Visualization API and the corechart package.
            google.charts.load('current', {'packages': ['corechart']});

            // Set a callback to run when the Google Visualization API is loaded.
            google.charts.setOnLoadCallback(drawChart);

            // Callback that creates and populates a data table,
            // instantiates the pie chart, passes in the data and
            // draws it.
            function drawChart() {

                // Create the data table.
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Topping');
                data.addColumn('number', 'Slices');
                data.addRows([
                    <?php 
                    include('paginas/conexao.php');

                    $sql = "select categoria.descricao, 
                        sum(valor) from lancamento
                        inner join categoria on 
                        (categoria.id = lancamento.categoria_id)
                        where tipo = 'P'  
                        group by categoria.descricao";

                    $query = $conexao->query($sql);
                    while ($resultado = $query->fetch_array()) {
                       echo "['$resultado[0]', $resultado[1]],";
                    } 
                    
                    ?>
                  ]);
                // Set chart options
                var options = {
                    'width': 400,
                    'height': 300};

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
        </script>
    
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Gráfico contas pagar por categoria</div>
                <div class="panel-body">
                    <div id="chart_div"></div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Saldo das Contas/Caixas</div>
                <div class="panel-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Conta/Caixa</th>
                                <th>Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                             <?php
                    //Arquivo de conexao com o banco
                    include('paginas/conexao.php');

                    $sql = "select * from caixa";

                    $query = $conexao->query($sql);

                    $total = 0;
                    while ($resultado = $query->fetch_array()) {
                        $total += saldo($resultado['id']);
                        echo $total;
                        ?>
                            <tr>
                                <td><?php echo $resultado['descricao']?></td>
                                <td>R$ <?php echo number_format(saldo($resultado['id']),2,',','.')?></td>
                            </tr>
                    <?php }?>
                        </tbody>
                    </table>

                    <h3>TOTAL: R$ <?php echo number_format($total,2,',','.');?></h3>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include('paginas/rodape.php'); ?>


