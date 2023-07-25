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
          action="http://localhost/pruebaplayeras/?C=EstadoController&M=Add" 
          method="post"
          enctype="multipart/form-data">
            <h4>Agregar nuevo estado</h4>
            <input class="controls" type="text" name="nomEstado" id="nomEstado"
            placeholder="Nombre del estado"
            required 
            minlength="5"
            pattern="[A-Za-z ]*"
            title="Solo se admiten caracteres alfabeticos" >
            <input class="botons" type="submit" value="Añadir nuevo estado"></p>
          </form>
        </section>    
  </body>
</html>