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
          action="http://localhost/pruebaplayeras/?C=ReportesController&M=reporteProductosXmaterial" 
          method="POST"
          enctype="multipart/form-data">
            <h4>Prendas de acuerdo al material</h4>
            <input class="controls" type="text" name="nomMaterial" id="nomMaterial"
            placeholder="Nombre del material"
            required 
            minlength="2"
            pattern="[A-Za-z ]*"
            title="Solo se admiten caracteres alfabeticos" >
            <input class="botons" type="submit" value="Generar reporte"></p>
          </form>
        </section>    
  </body>
</html>