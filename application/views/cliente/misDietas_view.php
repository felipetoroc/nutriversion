<div class="large-9 medium-9 columns">
    <div class="row">
        <div class="large-6 medium-6 columns">
        <h2 class="text-center">Dieta Paciente</h2>
        </div>
        <div class="large-6 medium-6 columns">
        <h2 class="text-center">Dieta Paciente</h2>
        </div>
    </div>   
    <div class="row">
 <div class="large-6 medium-6 columns">
       
     
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
    </table> </div>

    <div class="large-6 medium-6 columns">

<p class="text-center">
    <?php       
        if($cumplimiento == 0 )
        { ?>
            <img src="<?=base_url()."img/medidor-11.png" ?>" width="80%" height="80%">
        <?php }
        if($cumplimiento > 0 && $cumplimiento <= 0.40)
        { ?>
            <img src="<?=base_url()."img/medidor-12.png" ?>" width="80%" height="80%">
        <?php }
        if($cumplimiento > 0.40  && $cumplimiento <= 0.80)
        { ?>
            <img src="<?=base_url()."img/medidor-13.png" ?>" width="80%" height="80%">
        <?php }
        if($cumplimiento > 0.80 && $cumplimiento < 1)
        { ?>
            <img src="<?=base_url()."img/medidor-14.png" ?>" width="80%" height="80%">
        <?php }
        if($cumplimiento == 1)
        { ?>
            <img src="<?=base_url()."img/medidor-15.png" ?>" width="80%" height="80%">
        <?php }
        ?>
</p>   
  </div>
  </div>
</div> 
<script>
    $(document).ready(function(){
        var real = $("#real").html();
        //alert(real);
    });
</script>