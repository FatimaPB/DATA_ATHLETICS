<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="app/view/form.css">
  </head>
  <body>
  <section class="form-register">
        <!--en el metodo action de este formulario llamaremos al metodo Add de nuestro controlador -->
          <form 
          action="http://localhost/pruebaplayeras/?C=DireccionController&M=Add"
          method="post"
          enctype="multipart/form-data">
            <h4>Agregar nueva direccion</h4>
            <div class="select">
            <select name="nomEstado" id="nomEstado" required>
              <option selected disabled>Selecciona un estado</option>
              <?php  foreach($datos as $estado){?>
              <option value="<?php echo $estado['id_estado'] ?>"> <?php echo $estado['Estado'] ?></option>
              <?php } ?>
            </select>
            </div>
            <div class="select">
              <select name="nomMunicipio" id ="nomMunicipio" required>
              <option selected disabled>Selecciona un municipio</option>
              <?php  foreach($municipios as $municipio){?>
              <option value="<?php echo $municipio['id_ciudad'] ?>"> <?php echo $municipio['Ciudad'] ?></option>
              <?php } ?>
              </select>
            </div>
            <div class="select">
              <select name="nomColonia" id ="nomColonia" required>
              <option selected disabled>Selecciona una colonia</option>
              <?php  foreach($colonias as $colonia){?>
              <option value="<?php echo $colonia['id_colonia'] ?>"> <?php echo $colonia['Colonia'] ?></option>
              <?php } ?>
              </select>
            </div>
            <input class="controls" type="text" name="nomDireccion" id="nomDireccion" 
            placeholder="Nombre de la calle"
            required 
            minlength="5"
            pattern="[0-9A-Za-z ]*"
            >
            <input class="controls" type="number" name="preciocosto" id="preciocosto"
            placeholder="$costo de envío"
            required 
            >
            <input class="botons" type="submit"  value="Añadir nueva direccion"></p>
          </form>
        </section>    
  </body>
</html>