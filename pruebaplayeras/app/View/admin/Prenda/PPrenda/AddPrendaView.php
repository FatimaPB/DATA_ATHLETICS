<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="app/view/form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
        <section class="form-register">
        <!--en el metodo action de este formulario llamaremos al metodo Add de nuestro controlador -->
          <form 
          action="http://localhost/pruebaplayeras/?C=PrendaController&M=Add" 
          method="post"
          enctype="multipart/form-data">
            <h4>Agregar nuevo corte/estilo</h4>
            

            <input class="controls" type="text" name="nomModel" id="nomModel" placeholder="Modelo"/>
            <input
                class="controls"
                type="text"
                name="genero"
                id="genero"
                placeholder="Genero"
            />
            <input
                class="controls"
                type="number"
                name="PrecioV"
                id="PrecioV"
                placeholder="Precio de venta $"
            />
            <input class="controls" type="number" name="iva" id="iva" placeholder="iva"/>
            <div class="upload">
                <button type = "button" class = "btn-warning">
                  <i class = "fa fa-upload"></i> Subir foto
                  <input type="file" name="fot" id="fot" accept="image/*" >
                </button>
            </div>
            <div class="select">
                <select name="corte" id="corte">
                    <option selected disabled>Selecciona un corte</option>
                    <?php  foreach($cortes as $corte){?>
                    <option value="<?php echo $corte['id_corte'] ?>"> <?php echo $corte['Corte'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="select">
                <select name="talla" id="talla">
                    <option selected disabled>Selecciona una talla</option>
                    <?php  foreach($tallas as $talla){?>
                        <option value="<?php echo $talla['id_talla'] ?>"> <?php echo $talla['talla'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="select">
                <select name="color" id="color">
                    <option selected disabled>Selecciona un color</option>
                    <?php  foreach($colores as $color){?>
                        <option value="<?php echo $color['id_color'] ?>"> <?php echo $color['nomColor'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <input class="controls" type="number" name="existencia" id="existencia" placeholder="cantidad de prendas"/>
            <input class="controls" type="number" name="minimo" id="minimo" placeholder="cantidad minima de prendas"/>
            <input class="controls" type="number" name="maximo" id="maximo" placeholder="cantidad maxima de prendas"/>
            <div class="select">
                <select name="material" id="material">
                    <option selected disabled>Selecciona un material</option>
                    <?php  foreach($materiales as $material){?>
                        <option value="<?php echo $material['idMateriales'] ?>"> <?php echo $material['Material'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <input class="controls" type="number" name="porcentaje" id="porcentaje" placeholder="porcentaje"/>
            <input class="botons" type="submit" value="Añadir nueva prenda">
          </form>
        </section>    
</body>
</html>
