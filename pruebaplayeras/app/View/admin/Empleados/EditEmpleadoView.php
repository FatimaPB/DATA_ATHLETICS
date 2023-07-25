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
        action="http://localhost/pruebaplayeras/?C=EmpleadoController&M=Edit" 
        method="post"
        enctype="multipart/form-data">
        <h4>Editar empleado</h4>

        <input class="controls" type="text" name="rfc" id="rfc" placeholder="RFC"  value="<?= $datos['RFC'] ?>"/>
        <input class="controls" type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?= $datos['Nombre'] ?>"/>
        <input
            class="controls"
            type="text"
            name="apaterno"
            id="apaterno"
            placeholder="Apellido Paterno"
            value="<?= $datos['APaterno'] ?>"
            />
        <input
            class="controls"
            type="text"
            name="amaterno"
            id="amaterno"
            placeholder="Apellido Materno"
            value="<?= $datos['AMaterno'] ?>"
            />
        <input class="controls" type="text" name="user" id="user" placeholder="Usuario" value="<?= $datos['Usuario'] ?>"/>
        <input class="controls" type="pasword" name="pasword" id="pasword" placeholder="Password" value="<?= $datos['Pass'] ?>"/>
        <div class="upload">
            <button type = "button" class = "btn-warning">
              <i class = "fa fa-upload"></i> Subir foto
              <input type="file" name="fot" id="fot" accept="image/*" >
            </button>
        </div>
        <input type="hidden" name="ava" id="ava" value="<?= $datos['foto'] ?>">
        <input
          
            class="controls"
            type="number"
            name="tel"
            id="tel"
            placeholder="Número de teléfono"
            value="<?= $datos['Telefono'] ?>"
        />
        <input
            class="controls"
            type="text"
            name="ine"
            id="ine"
            placeholder="Número de ine"
            value="<?= $datos['NumIne'] ?>"
        />
        <input
            class="controls"
            type="text"
            name="curp"
            id="curp"
            placeholder="CURP"
            value="<?= $datos['Curp'] ?>"
        />
        <input
            class="controls"
            type="email"
            name="correo"
            id="correo"
            placeholder="E-mail"
            value="<?= $datos['Email'] ?>"
        />
        <div class="select">
            <select name="cargoo" id="cargoo">
                <option selected disabled>Selecciona un cargo</option>
                <?php  foreach($cargos as $cargo){?>
                    <option value="<?php echo $cargo['idCargo'] ?>"> <?php echo $cargo['Cargo'] ?></option>
                <?php } ?>
            </select>
        </div>
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
                <option selected disabled>Selecciona una calle</option>
                <?php  foreach($direcciones as $direccion){?>
                    <option value="<?php echo $direccion['id_direccion'] ?>"> <?php echo $direccion['Direccion'] ?></option>
                <?php } ?>
            </select>
        </div>
        <p><input class="botons" type="submit" value="Editar empleado"></p>
        
        </form>
      
</section>  
</body>
</html>
