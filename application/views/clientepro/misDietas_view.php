<div class="large-12 medium-12 columns">
    <div class="row">
        <div class="large-12 medium-12 columns">
            <h3 class="text-center"><?=$this->session->userdata('nombre_cliente')." ".$this->session->userdata('apellido_cliente')  ?></h3>
        </div>
    </div>
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
                        <?php $cumplimiento = $cumplimiento * 100;?>
                        <?php
                            if ($cumplimiento == 0){
                                $imagen = 0;
                            }
                            else if($cumplimiento > 0 && $cumplimiento <= 5){
                                $imagen = 5;
                            }
                            else if($cumplimiento > 5 && $cumplimiento <= 10){
                                $imagen = 10;
                            }
                            else if($cumplimiento > 10 && $cumplimiento <= 15){
                                $imagen = 15;
                            }
                            else if($cumplimiento > 15 && $cumplimiento <= 20){
                                $imagen = 20;
                            }
                            else if($cumplimiento > 20 && $cumplimiento <= 25){
                                $imagen = 25;
                            }
                            else if($cumplimiento > 25 && $cumplimiento <= 30){
                                $imagen = 30;
                            }
                            else if($cumplimiento > 30 && $cumplimiento <= 35){
                                $imagen = 35;
                            }
                            else if($cumplimiento > 35 && $cumplimiento <= 40){
                                $imagen = 40;
                            }
                            else if($cumplimiento > 40 && $cumplimiento <= 45){
                                $imagen = 45;
                            }
                            else if($cumplimiento > 45 && $cumplimiento <= 50){
                                $imagen = 50;
                            }
                            else if($cumplimiento > 50 && $cumplimiento <= 55){
                                $imagen = 55;
                            }
                            else if($cumplimiento > 55 && $cumplimiento <= 60){
                                $imagen = 60;
                            }
                            else if($cumplimiento > 60 && $cumplimiento <= 65){
                                $imagen = 65;
                            }
                            else if($cumplimiento > 65 && $cumplimiento <= 70){
                                $imagen = 70;
                            }
                            else if($cumplimiento > 70 && $cumplimiento <= 75){
                                $imagen = 75;
                            }
                            else if($cumplimiento > 75 && $cumplimiento <= 80){
                                $imagen = 80;
                            }
                            else if($cumplimiento > 80 && $cumplimiento <= 85){
                                $imagen = 85;
                            }
                            else if($cumplimiento > 85 && $cumplimiento <= 90){
                                $imagen = 90;
                            }
                            else if($cumplimiento > 90 && $cumplimiento <= 95){
                                $imagen = 95;
                            }
                            else if($cumplimiento > 95 && $cumplimiento <= 100){
                                $imagen = 100;
                            }
                        ?>
                    <img src='<?=base_url()?>img/cump/<?=$imagen?>.png' width='100%' height='100%'>
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
            $( location ).attr("href", window.location.origin+"/nutriversion/index.php/clientepro/misdietas/"+fecha);
        });
        
        //alert(real);
    });
</script>