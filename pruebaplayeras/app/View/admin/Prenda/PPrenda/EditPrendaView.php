<div>
  <h2>Editar prenda</h2>
  <!--en el metodo action de este formulario llamaremos al metodo Add de nuestro controlador -->
  <form 
  action="http://localhost/pruebaplayeras/?C=PrendaController&M=Edit" 
  method="post"
  enctype="multipart/form-data">
    <p>
      <label for="nomModel">Modelo : </label><br />
      <input type="text" name="nomModel" id="nomModel" placeholder="Modelo" value="<?= $datos['Modelo'] ?>"/>
    </p>
    <p>
      <label for="genero">Genero : </label><br />
      <input
        type="text"
        name="genero"
        id="genero"
        placeholder="Genero"
        value="<?= $datos['Genero'] ?>"
      />
    </p>
    <p>
      <label for="PrecioV">Precio de venta : </label><br />
      <input
        type="number"
        name="PrecioV"
        id="PrecioV"
        placeholder="Precio de venta $"
        value="<?= $datos['Precio_venta'] ?>"
      />
    </p>
    <p>
        <label for="iva">Iva:  </label><br />
        <input type="number" name="iva" id="iva" placeholder="iva" value="<?= $datos['Iva'] ?>"/>
    </p>
    <p>
      <label for="fot">Foto del producto : </label>
      <input type="file" name="fot" id="fot" accept="image/*" >
    </p>
    <p>
    <label for="corte">corte : </label><br>
    <select name="corte" id="corte" >
      <?php  foreach($cortes as $corte){?>
          <option value="<?php echo $corte['id_corte'] ?>"> <?php echo $corte['Corte'] ?></option>
      <?php } ?>
    </select>
    </p>
    <p>
    <label for="talla">corte : </label><br>
    <select name="talla" id="talla" >
      <?php  foreach($tallas as $talla){?>
          <option value="<?php echo $talla['id_talla'] ?>"> <?php echo $talla['talla'] ?></option>
      <?php } ?>
    </select>
    </p>
    <p>
    <label for="color">corte : </label><br>
    <select name="color" id="color" >
      <?php  foreach($colores as $color){?>
          <option value="<?php echo $color['id_color'] ?>"> <?php echo $color['nomColor'] ?></option>
      <?php } ?>
    </select>
    </p>
    <p>
        <label for="existencia">existencia:  </label><br />
        <input type="number" name="existencia" id="existencia" placeholder="cantidad de prendas" value="<?= $datos['Existencia'] ?>"/>
    </p>
    <p>
        <label for="minimo">minimo:  </label><br />
        <input type="number" name="minimo" id="minimo" placeholder="cantidad minima de prendas" value="<?= $datos['Minimo'] ?>"/>
    </p>
    <p>
        <label for="maximo">maximo:  </label><br />
        <input type="number" name="maximo" id="maximo" placeholder="cantidad maxima de prendas" value="<?= $datos['Maximo'] ?>"/>
    </p>
    <p>
    <label for="material">corte : </label><br>
    <select name="material" id="material" >
      <?php  foreach($materiales as $material){?>
          <option value="<?php echo $material['idMateriales'] ?>"> <?php echo $material['Material'] ?></option>
      <?php } ?>
    </select>
    </p>
    <p>
        <label for="porcentaje">porcentaje del material:  </label><br />
        <input type="number" name="porcentaje" id="porcentaje" placeholder="porcentaje" value="<?= $datos['Porcentaje'] ?>"/>
    </p>
    <p>
      <input type="hidden" name="ava" id="ava" value="<?= $datos['Foto'] ?>">
      <input type="hidden" name="id" value="<?= $datos['id_prenda'] ?>" readonly id="id" />
    </p>
    <p><input type="submit" value="Añadir prenda"></p>
  </form>
</div>
