<div class="large-5 medium-10 columns">
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
<script>
    $(document).ready(function(){
        var real = $("#real").html();
        alert(real);
    });
</script>