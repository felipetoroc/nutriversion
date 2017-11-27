<script type="text/javascript" src="<?php echo base_url() ?>js/cliente/contador_calorias.js"></script>

<div id="dialog" title="">
  <!-- <FORM  action="" method="post"> -->
  <LABEL>Tipo de comida: </LABEL>
  <select name="tipo_comida" id="tipo_comida">
    <option value ="" >Elija una opcion...</option>
    <option value ="1" >Desayuno</option>
    <option value ="3" >Almuerzo</option>
    <option value ="2" >Colacion</option>
    <option value ="4" >Once</option>
    <option value ="5" >Cena</option>
  </select><BR>
  <LABEL >Numero: </LABEL>
  <INPUT type="text" id="num" name="num" readonly="readonly"><BR>     
  <LABEL >Alimento: </LABEL>
  <INPUT type="text" id="alimento" name="alimento" readonly="readonly"><BR>
  <LABEL>porcion: </LABEL>
  <INPUT type="text" id="porcion" name="porcion" readonly="readonly"><BR>              
  <LABEL>cantidad: </LABEL>
  <input type="number" name="cantidad" id = "cantidad" min="1" max="45">
  <LABEL>el equivalente a 1 porcion: </LABEL>
  <input type="number" name="tot" id = "tot" min="1" max="45" readonly="readonly">
  <LABEL>Total de calorias: </LABEL>
  <INPUT type="text" id="result" name="result" readonly="readonly"><BR>

  <input id="add" type="button" value = "Guardar">  
  <div id="mens"></div>

  <!-- </FORM>-->
</div>

<div class="large-12 medium-12 small-12 columns">
  <div class="row">
    <div class="large-12 medium-12 small-12 columns">
      <input class="button" type="button" id="editar" value="Grabar Alimento">
      <table id="example" class="display">
        <thead>
          <tr>
          <th>ID</th>
          <th>Nombre Alimento</th>
          <th>Gramos</th>
          <th>Calorias</th>
          </tr>
        </thead>
        <tbody>
        </tbody>  
      </table>
    </div>
  </div>
</div>

<div id="ingresoContador" class="reveal-modal tiny" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
<h2 id="modalTitle">Éxito!</h2>
<p>Alimento Ingresado correctamente.</p>
<a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>