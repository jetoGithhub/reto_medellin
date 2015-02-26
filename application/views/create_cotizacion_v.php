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
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>

                <li class="page-scroll">
                    <a href="#cotizacion">Crear Cotización</a>
                </li>
                <!--                    <li class="page-scroll">-->
                <!--                        <a href="#contact">Ver cotizaciones</a>-->
                <!--                    </li>-->
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<header style="background: #95a5a6;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <img class="img-responsive" src="./assets/img/profile.png" alt="">
                <div class="intro-text">
                    <span class="name">Reto Medellin</span>
                    <hr class="star-light">
                    <span class="skills">Web Developer - Jefferson Lara</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Contact Section -->
<section class="success" id="cotizacion" >
    <div class="container" style=" width: 60%">
        <form name="frmcotizacion" id="frmcotizacion" method="post" action="<?php print(base_url()).'index.php/reto_controller/resultados_cotizacion' ?>" >
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Cotizacion</h2>
                    <hr class="star-primary">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 ">
                    <labe>Compa&ntilde;ia:</labe>
                    <input type="text" name="company" id="company" class="form-control" >
                </div>
                <div class="col-lg-6 col-md-6 ">
                    <labe>Representante:</labe>
                    <input type="text" name="rcompany" id="rcompany" class="form-control"  >
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 ">
                    <labe>Numero de Camiones:</labe>
                    <input type="number" name="ncamiones" id="ncamiones" class="form-control requerido" >
                </div>
                <div class="col-lg-6 col-md-6 ">
                    <labe>Numero de Drivers:</labe>
                    <input type="number" name="ndrivers" id="ndrivers" class="form-control requerido"  >
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 ">
                    <label>Algun driver menor a 25?</label>
                    <div align="left" style="width: 60px">
                        <input type="radio" name="dmenor" value="1" onclick="$('#cantidad-driv').css('display','block')"> SI<br>
                        <input type="radio" name="dmenor" value="0" onclick="$('#cantidad-driv').css('display','none')" checked> NO<br>
                    </div>
                    <div id="cantidad-driv" style="display: none;">
                        <input type="text" name="cant_menor" class="form-control" placeholder="Indique la Cantidad">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 ">
                    <label>Algun driver sin Experiencia?</label>
                    <div align="left" style="width: 60px">
                        <input type="radio" name="dexp" value="1" onclick="$('#cantidad-exp').css('display','block')"> SI<br>
                        <input type="radio" name="dexp" value="0" onclick="$('#cantidad-exp').css('display','none')" checked="true"> NO<br>
                    </div>
                    <div id="cantidad-exp" style="display: none;">
                        <input type="text" name="cant_sexp" class="form-control" placeholder="Indique la Cantidad">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 ">
                    <label>Millas de Operacion:</label>
                    <select id="millas" name="millas" class="form-control" >
                        <option value="" selected>--</option>
                        <option value="0" >0-350</option>
                        <option value="1" >350-500</option>
                        <option value="2" >500-1000</option>
                        <option value="3" >1000 0 Mas</option>
                    </select>
                </div>
                <div class="col-lg-6 col-md-6 ">
                    <label>Perdidas:</label>
                    <select id="perdidas" name="perdidas" class="form-control" >
                        <option value="" selected>--</option>
                        <option value="0" >0</option>
                        <option value="1" >Entre 1 y 100 USD</option>
                        <option value="2" >Entre 100 y 1000 USD</option>
                        <option value="3" >Entre 1000 y 5000 USD</option>
                        <option value="4" >Entre 5000 y 10000 USD</option>
                        <option value="5" >Mas de 10000 USD</option>
                    </select>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 ">
                    <label>Anios en el Negocio:</label>
                    <select id="anion" name="anion" class="form-control" >
                        <option value="" selected>--</option>
                        <option value="0" >Nuevo negocio</option>
                        <option value="1" >1-3</option>
                        <option value="2" >3-5</option>
                        <option value="3" >6-10</option>
                        <option value="4" >11-15</option>
                        <option value="5" >16-20</option>
                        <option value="6" >Mas de 20</option>
                    </select>
                </div>
            </div>
            <div style="width: 100%; text-align: center; padding: 15px 5px">
                <button type="submit" class=" btn btn-sm  btn-primary">Enviar</button>

            </div>
        </form>
    </div>
</section>

<script src="<?php print(base_url()).'assets/js/contizacion_fino.js' ?>"></script>
<style>
    #frmcotizacion label.error{
        color:#000000;
        font-size: 10px;

    }
</style>