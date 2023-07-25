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
        action="http://localhost/pruebaplayeras/?C=EmpleadoController&M=Add" 
        method="post"
        enctype="multipart/form-data">
        <h4>Agregar nuevo empleado</h4>

        <input class="controls" type="text" name="rfc" id="rfc" placeholder="RFC"
            required 
            pattern="[A-Za-z ]*"/>
        <input class="controls" type="text" name="nombre" id="nombre" placeholder="Nombre"
            required 
            pattern="[A-Za-z ]*"
            title="Solo se admiten caracteres alfabeticos"/>
        <input
            class="controls"
            type="text"
            name="apaterno"
            id="apaterno"
            placeholder="Apellido Paterno"
            required 
            pattern="[A-Za-z ]*"
            title="Solo se admiten caracteres alfabeticos"
            />
        <input
            class="controls"
            type="text"
            name="amaterno"
            id="amaterno"
            placeholder="Apellido Materno"
            required 
            pattern="[A-Za-z ]*"
            title="Solo se admiten caracteres alfabeticos"
            />
        <input class="controls" type="text" name="user" id="user" placeholder="Usuario"
            minlength="5"
            maxlength="12"
            pattern="[A-Za-z0-9_]+"
            title="Usuario invalido, intente con otro nombre de usuario"/>
        <input class="controls" type="pasword" name="pasword" id="pasword" placeholder="Password" 
            required 
            minlength="8" 
            maxlength="15"
            pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?& ]{8,15}$"
            />
        <div class="upload">
            <button type = "button" class = "btn-warning">
              <i class = "fa fa-upload"></i> Subir foto
              <input type="file" name="fot" id="fot" accept="image/*" required>
            </button>
        </div>
        <input
            class="controls"
            type="tel"
            name="tel"
            id="tel"
            required
            placeholder="Número de teléfono"
            minlength="10" 
            maxlength="10"
            pattern="[0-9]+"
            pattern="[^A-Z]"
            title="Solo se admiten numeros"
        />
        <input
            class="controls"
            type="text"
            name="ine"
            id="ine"
            required
            placeholder="Número de ine"
        />
        <input
            class="controls"
            type="text"
            name="curp"
            id="curp"
            required
            placeholder="CURP"
        />
        <input
            class="controls"
            type="email"
            name="correo"
            id="correo"
            required
            placeholder="E-mail"
        />
        <div class="select">
            <select name="cargoo" id="cargoo" required>
                <option selected disabled>Selecciona un cargo</option>
                <?php  foreach($cargos as $cargo){?>
                    <option value="<?php echo $cargo['idCargo'] ?>"> <?php echo $cargo['Cargo'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="select">
            <select name="nomEstado" id="nomEstado" required>
                <option selected disabled>Selecciona un estado</option>
                <?php  foreach($estados as $estado){?>
                    <option value="<?php echo $estado['id_estado'] ?>"> <?php echo $estado['Estado'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="select">
            <select name="nomMunicipio" id="nomMunicipio" required>
                <option selected disabled>Selecciona un municipio</option>
                <?php  foreach($muncipios as $municipio){?>
                    <option value="<?php echo $municipio['id_ciudad'] ?>"> <?php echo $municipio['Ciudad'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="select">
            <select name="nomColonia" id="nomColonia" required>
                <option selected disabled>Selecciona una colonia</option>
                <?php  foreach($colonias as $colonia){?>
                    <option value="<?php echo $colonia['id_colonia'] ?>"> <?php echo $colonia['Colonia'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="select">
            <select name="Direccion" id="Direccion" required>
                <option selected disabled>Selecciona una calle</option>
                <?php  foreach($direcciones as $direccion){?>
                    <option value="<?php echo $direccion['id_direccion'] ?>"> <?php echo $direccion['Direccion'] ?></option>
                <?php } ?>
            </select>
        </div>
        <p><input class="botons" type="submit" value="Añadir empleado"></p>
        
        </form>
      
</section>  
</body>
</html>
