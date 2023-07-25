<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="app/view/form.css">
</head>
<body>
        <section class="form-register">
        <!--en el metodo action de este formulario llamaremos al metodo Add de nuestro controlador -->
          <form 
          action="http://localhost/pruebaplayeras/?C=ColorController&M=Edit" 
          method="post"
          enctype="multipart/form-data">
          <form>
          <h4>Editar color</h4>
      <div class="container">
        <div class="containercolo">
        <input type="color" name="codColo" id="codColo" value="<?= $datos['codhexa'] ?>"/>
        <label id="lbl1"for="codColo">Selecciona un color</label>
        </div>
        <label id="lbl2" for="nomColo">Nombre del color: </label><br />
        <input class="controls" type="text" name="nomColo" id="nomColo" placeholder="Nombre del color" value="<?= $datos['nomColor'] ?>"/>
      </div>
      <input
        type="hidden"
        name="id"
        value="<?= $datos['id_color'] ?>"
        readonly
        id="id"
      />
      <input  class="botons" type="submit" value="Editar color">
    </form>
        </section>    
</body>
</html>

