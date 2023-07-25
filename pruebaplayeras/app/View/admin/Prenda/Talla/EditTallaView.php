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
          action="http://localhost/pruebaplayeras/?C=TallaController&M=Edit" 
          method="post"
          enctype="multipart/form-data">
            <h4>Editar  Material</h4>
            <input class="controls"
            type="text" 
            name="nomTalla" 
            id="nomTalla" 
            placeholder="Nombre de la talla" 
            value="<?= $datos['talla'] ?>"
            required 
            minlength="1"
            pattern="[A-Za-z ]*"
            title="Solo se admiten caracteres alfabeticos" />
            <input
            type="hidden"
            name="id"
            value="<?= $datos['id_talla'] ?>"
            readonly
            id="id"
            />
            <input class="botons" type="submit" value="Editar talla"></p>
          </form>
        </section>    
</body>
</html>
