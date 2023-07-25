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
          action="http://localhost/pruebaplayeras/?C=MaterialController&M=Edit" 
          method="post"
          enctype="multipart/form-data">
            <h4>Editar  Material</h4>
            <input class="controls"
            type="text" 
            name="nomMaterial" 
            id="nomMaterial" 
            placeholder="Nombre del estilo" 
            value="<?= $datos['Material'] ?>"
            required 
            minlength="5"
            pattern="[A-Za-z ]*"
            title="Solo se admiten caracteres alfabeticos" />
            <input
            type="hidden"
            name="id"
            value="<?= $datos['idMateriales'] ?>"
            readonly
            id="id"
            />
            <input class="botons" type="submit" value="Editar corte"></p>
          </form>
        </section>    
</body>
</html>
