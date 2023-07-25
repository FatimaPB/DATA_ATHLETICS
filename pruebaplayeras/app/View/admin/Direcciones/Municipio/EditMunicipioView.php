<div>
  <h2>Editar municipio</h2>
  <!--en el metodo action de este formulario llamaremos al metodo Add de nuestro controlador -->
  <form 
  action="http://localhost/pruebaplayeras/?C=MunicipioController&M=Edit" 
  method="post"
  enctype="multipart/form-data">
    <p>
      <label for="nomCiudad">Municipio: </label><br />
      <input 
      type="text" 
      name="nomCiudad" 
      id="nomCiudad" 
      placeholder="Nombre del municipio"
      value="<?= $municipios['Ciudad'] ?>"/>
    </p>
    <p><select name="nomEstado" id="nomEstado" >
      <?php  foreach($estados as $estado){?>
          <option value="<?php echo $estado['id_estado'] ?>"> <?php echo $estado['Estado'] ?></option>
      <?php } ?>
    </select>
    </p>
    <p>
      <input
        type="hidden"
        name="id"
        value="<?= $municipios['id_ciudad'] ?>"
        readonly
        id="id"
      />
    </p>
    <p><input type="submit" value="Editar estado"></p>
  </form>
</div>
