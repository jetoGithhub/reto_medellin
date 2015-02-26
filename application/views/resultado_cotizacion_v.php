<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#page-top">Reto Medellin</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<section id="result">
    <br /><br />
    <div class="container" style=" width: 80%">
        <p class="text-justify">
            Querido <?php echo $representante ?>, la cotización para la poliza de su negocio <?php echo $empresa ?> es la siguiente.
        </p>
        <table class=" table table-bordered table-condensed table-striped" >
            <thead>
                <tr>
                    <th><b>Item</b></th>
                    <th><b>Cantidad</b></th>
                    <th><b>Valor Unitario</b></th>
                    <th><b>Valor Total</b></th>
                </tr>
            </thead>
            <?php
            echo "<tbody>";
            foreach($items as $key=>$value):
                echo "
                        <tr>
                            <td>$value[items]</td>
                            <td>$value[cantidad]</td>
                            <td>$value[valor]</td>
                            <td>$value[total]</td>
                        </tr>
                    ";
            endforeach;
            echo "
                    <tr>
                        <td colspan='3' align='right'><b>Total</b></td>
                        <td colspan='3' align='left'><b>$total</b></td>
                    </tr>
                ";
            echo "</tbody>";
        ?>
        </table>
        <div class="panel-default">
            <div class="panel-footer">
                <div style=" text-align: center">
                    <a href="<?php print(base_url()); ?>" class="btn btn-sm btn-default">Nueva Cotizacion</a>
                </div>
            </div>
        </div>
    </div>

</section>