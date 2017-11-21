<div class="large-9 medium-9 columns">
    <div class="row">
        <div class="large-4 medium-4 columns">
            <h3>Estado Físico</h3>
            <table>
            <?php
            foreach ($estado_fisico->result() as $row) {
                $imc=$row->imc;
                $sexo=$row->cliente_sexo;
            ?>
                <tr>
                    <td>Ultima Actualización</td><td><?=$row->fecha_registro;?></td>
                </tr>
                <tr>
                    <td>Nivel de actividad fisica</td><td><?=$row->nivel_actividad;?></td>
                </tr>
                <tr>
                    <td>Altura</td><td><?=$row->altura;?></td>
                </tr>
                <tr>
                    <td>Peso</td><td><?=$row->peso;?></td>
                </tr>
                <tr>
                    <td>Cintura</td><td><?=$row->cintura;?></td>
                </tr>
                <tr>
                    <td>Cuello</td><td><?=$row->cuello;?></td>
                </tr>
                <tr>
                    <td>Cadera</td><td><?=$row->cadera;?></td>
                </tr>
                <tr>
                    <td>Masa magra</td><td><?=$row->masa_magra;?></td>
                </tr>
                <tr>
                    <td>IMC</td><td><?=$row->imc;?></td>
                </tr>
                <tr>
                    <td>% de grasa corporal</td><td><?=$row->porcentaje_grasa;?></td>
                </tr>
                <tr>
                    <td>Tasa metabolica basal</td><td><?=$row->tmb;?></td>
                </tr>
                <tr>
                    <td>Consumo Calorico Diario</td><td><?=$row->ccd;?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
        <div class="large-8 medium-8 columns">
            <div class="row">
                <div class="large-12 medium-12 columns">
                    <h3 align="center">Gráfico de Evolución de Peso</h3>
                    <div id ="chart-container" >
                        <canvas id="mycanvas"></canvas>
                    </div>
                </div>
            </div>
            <div class="row">
                <div  class="large-12 medium-12 columns">
                    <?php
                    if($sexo=="1")
                    {
                        if($imc > 0 && $imc < 18.5)
                        { ?>
                            <img src="<?=base_url()."img/mono1.png" ?>" width="40px" height="40px">
                        <?php }
                        if($imc >= 18.5 && $imc <= 24.9)
                        { ?>
                            <img src="<?=base_url()."img/mono2.png" ?>" width="40px" height="40px">
                        <?php }
                        if($imc >= 25  && $imc <= 29.9)
                        { ?>
                            <img src="<?=base_url()."img/mono3.png" ?>" width="40px" height="40px">
                        <?php }
                        if($imc >= 30 && $imc <= 39)
                        { ?>
                            <img src="<?=base_url()."img/mono4.png" ?>" width="40px" height="40px">
                        <?php }
                        if($imc >= 40)
                        { ?>
                            <img src="<?=base_url()."img/mono5.png" ?>" width="40px" height="40px">
                        <?php }
                    }else
                    {
                        if($imc > 0 && $imc < 18.5)
                        { ?>
                            <img src="<?=base_url()."img/mona1.png" ?>" width="40px" height="40px">
                        <?php }
                        if($imc >= 18.5 && $imc <= 24.9 )
                        { ?>
                            <img src="<?=base_url()."img/mona2.png" ?>" width="40px" height="40px">
                        <?php }
                        if($imc >= 25  && $imc <= 29.9 )
                        { ?>
                            <img src="<?=base_url()."img/mona3.png" ?>" width="40px" height="40px">
                        <?php }
                        if($imc >= 30 && $imc <= 39)
                        { ?>
                            <img src="<?=base_url()."img/mona4.png" ?>" width="40px" height="40px">
                        <?php }
                        if($imc >= 40)
                        { ?>
                            <img src="<?=base_url()."img/mona5.png" ?>" width="40px" height="40px">
                        <?php }
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>