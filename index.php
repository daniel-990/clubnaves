<?php

  include ('parcial/head.php');

?>

<section class="cont-salidas">
    <div class="container">
        <div class="contenedor-form">
            <form>
                <div class="form-group row">
                    <div class="col-md-4">
                        <input style="display:none;" type="text" class="form-control" id="socioid" disabled />
                        <select class="custom-select patronid" id="barco"></select>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="destino" placeholder="Destino" />
                    </div>
                    <div class="col-md-4">
                        <input style="display:none;" type="text" class="form-control" id="idsocio" disabled />
                        <input style="display:none;" type="text" class="form-control" id="socio" disabled />
                        <select class="custom-select patron" id="patron"></select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="staticEmail" class="col-md-2 col-form-label">Fecha de Salida</label>
                    <div class="col-md-2">
                        <input type="date" id="fecha-salida" class="form-control">
                    </div>
                    <label for="staticEmail" class="col-md-2 col-form-label">Fecha de Entrada</label>
                    <div class="col-md-2">
                        <input class="form-control" id="fecha-llegada" type="date">
                    </div>
                    <div class="col-md-4">
                        <button id="btn-enviar" class="btn btn-primary btn-block" type="submit">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<section class="cont-salidas-barcos">

    <div class="container">
        <div class="contenedor-tabla table-responsive">
            <div id="modal-tabla">

            </div>
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Matricula</th>
                        <th scope="col">N. Patrón</th>
                        <th scope="col">Destino</th>
                        <th scope="col">Fecha Out</th>
                        <th scope="col">Fecha In</th>
                        <th scope="col">Socios</th>
                    </tr>
                </thead>
                <tbody id="tabla">
                
                </tbody>
            </table>
        </div>
    </div>

</section>
<section class="cont-barco">
    <div class="container">
        <div class="contenedor-masvisitado">
            <form>
                <div class="form-group row">
                    <label for="mas-visitados" class="col-md-4 col-form-label">Destinos mas visitados</label>
                    <div class="col-md">
                        <input type="text" class="form-control" id="mas-visitados" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="barcos-masusados" class="col-md-4 col-form-label">barcos mas usados</label>
                    <div class="col-md">
                        <input type="text" class="form-control" id="barcos-masusados" disabled>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<?php

  include ('parcial/footer.php');

?>