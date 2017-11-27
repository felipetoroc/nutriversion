<div class="large-9 medium-9 columns">
    <div class="row">
        <div class="large-4 medium-12 columns">
            <div class="row">
                <div class="large-12 medium-12 columns">
                    <h2>Cumplimiento</h2>
                </div>
            </div>
            <div class="row">
                <div class="large-12 medium-12 columns">
                    <p class="text-center">
                    <?php       
                        if($cumplimiento == 0 )
                        { ?>
                            <img src="<?=base_url()."img/medidor--11.png" ?>" width="80%" height="80%">
                        <?php }
                        if($cumplimiento > 0 && $cumplimiento <= 0.40)
                        { ?>
                            <img src="<?=base_url()."img/medidor--12.png" ?>" width="80%" height="80%">
                        <?php }
                        if($cumplimiento > 0.40  && $cumplimiento <= 0.80)
                        { ?>
                            <img src="<?=base_url()."img/medidor--13.png" ?>" width="80%" height="80%">
                        <?php }
                        if($cumplimiento > 0.80 && $cumplimiento < 1)
                        { ?>
                            <img src="<?=base_url()."img/medidor--14.png" ?>" width="80%" height="80%">
                        <?php }
                        if($cumplimiento == 1)
                        { ?>
                            <img src="<?=base_url()."img/medidor--15.png" ?>" width="80%" height="80%">
                        <?php }
                        if($cumplimiento > 0 && $cumplimiento <= 0.40)
                        { ?>
                            <img src="<?=base_url()."img/medidor--16.png" ?>" width="80%" height="80%">
                        <?php }
                        if($cumplimiento > 0 && $cumplimiento <= 0.40)
                        { ?>
                            <img src="<?=base_url()."img/medidor--17.png" ?>" width="80%" height="80%">
                        <?php }
                        if($cumplimiento > 0 && $cumplimiento <= 0.40)
                        { ?>
                            <img src="<?=base_url()."img/medidor--18.png" ?>" width="80%" height="80%">
                        <?php }
                        if($cumplimiento > 0 && $cumplimiento <= 0.40)
                        { ?>
                            <img src="<?=base_url()."img/medidor--19.png" ?>" width="80%" height="80%">
                        <?php }
                        if($cumplimiento > 0 && $cumplimiento <= 0.40)
                        { ?>
                            <img src="<?=base_url()."img/medidor--20.png" ?>" width="80%" height="80%">
                        <?php }
                        if($cumplimiento > 0 && $cumplimiento <= 0.40)
                        { ?>
                            <img src="<?=base_url()."img/medidor--21.png" ?>" width="80%" height="80%">
                        <?php }
                        if($cumplimiento > 0 && $cumplimiento <= 0.40)
                        { ?>
                            <img src="<?=base_url()."img/medidor-22.png" ?>" width="80%" height="80%">
                        <?php }
                        if($cumplimiento > 0 && $cumplimiento <= 0.40)
                        { ?>
                            <img src="<?=base_url()."img/medidor--23.png" ?>" width="80%" height="80%">
                        <?php }
                        if($cumplimiento > 0 && $cumplimiento <= 0.40)
                        { ?>
                            <img src="<?=base_url()."img/medidor--24.png" ?>" width="80%" height="80%">
                        <?php }
                        if($cumplimiento > 0 && $cumplimiento <= 0.40)
                        { ?>
                            <img src="<?=base_url()."img/medidor--25.png" ?>" width="80%" height="80%">
                        <?php }
                        if($cumplimiento > 0 && $cumplimiento <= 0.40)
                        { ?>
                            <img src="<?=base_url()."img/medidor-26.png" ?>" width="80%" height="80%">
                        <?php }
                        if($cumplimiento > 0 && $cumplimiento <= 0.40)
                        { ?>
                            <img src="<?=base_url()."img/medidor--27.png" ?>" width="80%" height="80%">
                        <?php }
                        if($cumplimiento > 0 && $cumplimiento <= 0.40)
                        { ?>
                            <img src="<?=base_url()."img/medidor--23.png" ?>" width="80%" height="80%">
                        <?php }
                        if($cumplimiento > 0 && $cumplimiento <= 0.40)
                        { ?>
                            <img src="<?=base_url()."img/medidor--28.png" ?>" width="80%" height="80%">
                        <?php }
                        if($cumplimiento > 0 && $cumplimiento <= 0.40)
                        { ?>
                            <img src="<?=base_url()."img/medidor--29.png" ?>" width="80%" height="80%">
                        <?php }
                        if($cumplimiento > 0 && $cumplimiento <= 0.40)
                        { ?>
                            <img src="<?=base_url()."img/medidor--31.png" ?>" width="80%" height="80%">
                        <?php }
                         if($cumplimiento > 0 && $cumplimiento <= 0.40)
                        { ?>
                            <img src="<?=base_url()."img/medidor--30.png" ?>" width="80%" height="80%">
                        <?php }
                        ?>
                    </p>   
                </div>
            </div>
        </div>
        <div class="large-7 medium-12 columns">
            <div class="row">
                <div class="large-12 medium-12 columns">
                    <h2>Dieta</h2>
                </div>
            </div>
            <div class="row">
                <div class="large-12 medium-12 columns">
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
                                echo "<td id='dieta' style='background-color: #bbbbbb'>";
                                foreach ($dieta as $key=>$valor){
                                    if ($valor->id_comida == $columna and $valor->id_categoria == $fila['categoria_id']) {
                                        echo $valor->porciones;
                                    }
                                }
                                echo "</td>";
                                echo "<td id='real'>";
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
        var real = $("#real").html();
        //alert(real);
    });
</script>