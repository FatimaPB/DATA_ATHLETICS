<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="app/view/form.css">
  </head>
  <body>
  <section class="form-register">
  <form 
    action="http://localhost/pruebaplayeras/?C=ColorController&M=add" 
    method="post"
    enctype="multipart/form-data">
    <h4>Agregar nuevo color</h4>
      <div class="container">
        <div class="containercolo">
        <input type="color" name="codColo" id="codColo"/>
        <label id="lbl1"for="codColo">Selecciona un color</label>
        </div>
        <label id="lbl2" for="nomColo">Nombre del color: </label><br />
        <input class="controls" type="text" name="nomColo" id="nomColo" placeholder="Nombre del color"/>
      </div>
      <input  class="botons" type="submit" value="Añadir nuevo color">
    </form>
  </section>
  </body>
</html>