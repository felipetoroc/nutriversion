<div class="large-12 medium-12 columns">
    <div class="row">
        <div class="large-12 medium-12 small-12 columns">
            <div class="large-5 large-centered medium-8 medium-centered small-12 columns"> 
                <input type="text" id="fechaBuscar" value="<?=$fechaIngresada?>">
            </div>
        </div>
    <div class="row">
        <div class="large-4 medium-12 columns">
            <div class="row">
                <div class="large-12 medium-12 columns">
                    <h2 class="text-center">Cumplimiento</h2>
                </div>
            </div>
            <div class="row">
                <div class="large-12 medium-12 small-12 columns">
                    <table>
                        <tr>
                            <td>Calorias de la Dieta:</td><td><?=round($calorias)?></td>
                        </tr>
                        <tr>
                            <td>Calorias Consumidas:</td><td><?=$calorias_cal?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="large-12 medium-6 medium-centered small-9 small-centered columns">
                    <p class="text-center">
                        <?php
                            $cumplimiento = $cumplimiento * 100;
                        ?>
                    <img src='<?=base_url()?>img/cump/<?=$cumplimiento?>.png' width='100%' height='100%'>
                    </p>
                </div>
            </div>
        </div>
        <div class="large-7 medium-12 columns">
            <div class="row">
                <div class="large-12 medium-12 columns">
                    <h2 class="text-center">Dieta</h2>
                </div>
            </div>
            <div class="row">
                <div class="large-12 medium-9 medium-centered columns">
                    <table>
                        <thead>
                        <tr aria-rowspan="2">
                            <tr>
                                <td>Grupo de Categorias</td>
                                <?php
                                foreach ($columnas as $columna){
                                    echo "<td colspan='2'>".$columna['nombre']."</td>";
                                }?>
                            </tr>
                            <tr>
                                <td>Dieta/Real</td>
                                <?php
                                foreach ($columnas as $columna){
                                    echo "<td>D</td><td>R</td>";
                                }?>
                            </tr>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($filas as $fila){
                            echo "<tr><td>".$fila['categoria_descr']."</td>";
                            for($columna = 1;$columna <= 5;$columna++){
                                echo "<td id='dieta' style='background-color: #F9F9BA'>";
                                foreach ($dieta as $key=>$valor){
                                    if ($valor->id_comida == $columna and $valor->id_categoria == $fila['categoria_id']) {
                                        echo $valor->porciones;
                                    }
                                }
                                echo "</td>";
                                echo "<td id='real' style='background-color: #C2FDB4'>";
                                foreach ($consumo as $row){
                                    if($row["id_comida"] == $columna and $row["categoria_id"] == $fila['categoria_id']){
                                        echo $row["porcion"];
                                    }
                                }
                                echo "</td>";
                            }
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>   
</div> 
<script>
    $(document).ready(function(){
        $("#fechaBuscar").datepicker({
            dateFormat : "dd-mm-yy",
            maxDate: "0D"
        });
        $("#fechaBuscar").on('change',function(){
            var fecha = $("#fechaBuscar").val();
            $( location ).attr("href", window.location.origin+"/nutriversion/index.php/cliente/misdietas/"+fecha);
        });
        
        //alert(real);
    });
</script>