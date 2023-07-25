<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="app/view/venta.css">
</head>
<body>
    <div class="hero-section2 section2">
        <!-- hero image  -->
        <div class="hero-image2">
            <section class="form-register">
                <!--en el metodo action de este formulario llamaremos al metodo Add de nuestro controlador -->
                <form 
                action="http://localhost/pruebaplayeras/?C=VentasController&M=Vender" 
                method="post"
                enctype="multipart/form-data">
                <h4>Orden de compra</h4>
                <div class="select">
                    <select name="nomEstado" id="nomEstado">
                        <option selected disabled>Selecciona un estado</option>
                        <?php  foreach($estados as $estado){?>
                            <option value="<?php echo $estado['id_estado'] ?>"> <?php echo $estado['Estado'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="select">
                    <select name="nomMunicipio" id="nomMunicipio">
                        <option selected disabled>Selecciona un municipio</option>
                        <?php  foreach($muncipios as $municipio){?>
                            <option value="<?php echo $municipio['id_ciudad'] ?>"> <?php echo $municipio['Ciudad'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="select">
                    <select name="nomColonia" id="nomColonia">
                        <option selected disabled>Selecciona una colonia</option>
                        <?php  foreach($colonias as $colonia){?>
                            <option value="<?php echo $colonia['id_colonia'] ?>"> <?php echo $colonia['Colonia'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="select">
                    <select name="Direccion" id="Direccion">
                        <option selected disabled>Selecciona una colonia</option>
                        <?php  foreach($direcciones as $direccion){?>
                            <option value="<?php echo $direccion['id_direccion'] ?>"> <?php echo $direccion['Direccion'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                
                <input
                class="controls"
                type="number"
                name="tel"
                id="tel"
                placeholder="Cantidad de prendas"
                />
                <p class="content-body2">
                    Subtotal: ----
                </p>
                <p class="content-body2">
                    Total:  ----
                </p>
                <p><input class="botons" type="submit" value="Comprar"></p>
                
                </form>
        </section> 
        </div>
        <!-- hero content  -->
        <div class="hero-content2 flex">
            
        </div>
    </div>
</body>
</html>