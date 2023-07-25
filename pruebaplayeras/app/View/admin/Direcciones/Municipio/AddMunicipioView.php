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
          action="http://localhost/pruebaplayeras/?C=MunicipioController&M=Add"
          method="post"
          enctype="multipart/form-data">
            <h4>Agregar nuevo municipio</h4>
            <div class="select">
            <select name="nomEstado" id="nomEstado" required>
                <option selected disabled>Selecciona un estado</option>
                <?php  foreach($datos as $estado){?>
                    <option value="<?php echo $estado['id_estado'] ?>"> <?php echo $estado['Estado'] ?></option>
                <?php } ?>
            </select>
            </div>
            <input class="controls" type="text" name="nomMunicipio" id="nomMunicipio"
            placeholder="Añadir nuevo municipio"
            required 
            minlength="5"
            pattern="[A-Za-z ]*"
            title="Solo se admiten caracteres alfabeticos" >
            <input class="botons" type="submit" value="Añadir nuevo municipio"></p>
          </form>
        </section>    
  </body>
</html>