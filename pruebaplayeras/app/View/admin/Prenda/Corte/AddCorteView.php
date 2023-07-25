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
          action="http://localhost/pruebaplayeras/?C=CorteController&M=add"
          method="post"
          enctype="multipart/form-data">
            <h4>Agregar nuevo corte/estilo</h4>
            <input class="controls" type="text" name="nomCorte" id="nomCorte" 
            placeholder="Nombre del estilo"
            required 
            minlength="8"
            pattern="[A-Za-z ]*"
            title="Solo se admiten caracteres alfabeticos" >
            <input class="botons" type="submit" value="Añadir nuevo corte"></p>
          </form>
        </section>    
</body>
</html>
