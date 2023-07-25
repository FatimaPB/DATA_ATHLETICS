<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app/view/form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<section class="form-register">
        <!--en el metodo action de este formulario llamaremos al metodo Add de nuestro controlador -->
        <form 
        action="http://localhost/pruebaplayeras/?C=ClienteController&M=Add" 
        method="post"
        enctype="multipart/form-data">
        <h4>Agregar nuevo usuario</h4>
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
        <input
            class="controls"
            type="text"
            name="numine"
            id="numine"
            required
            placeholder="Número de ine"
        />
        <input class="controls" type="number" name="edad" 
            id="edad"
            required
            placeholder="Edad"
        />
        <div class="upload">
            <button type = "button" class = "btn-warning">
              <i class = "fa fa-upload"></i> Subir foto
              <input type="file" name="fot" id="fot" accept="image/*" required>
            </button>
        </div>
        <input
            class="controls"
            type="email"
            name="email"
            id="email"
            required
            placeholder="E-mail"
        />
        <input class="controls" type="text" name="user" id="user" placeholder="Usuario"
            minlength="5"
            maxlength="12"
            pattern="[A-Za-z0-9_]+"
            title="Usuario invalido, intente con otro nombre de usuario"/>
        <input class="controls" type="pasword" name="pass" id="pass" placeholder="Password" 
            required 
            minlength="8" 
            maxlength="15"
            pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?& ]{8,15}$"
            title="Crea una contraseña con al menos un numero, una leta minuscula y una mayúscula, un caracter especial y un espacio"
        />
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
        <input
            class="controls"
            type="text"
            name="TP"
            id="TP"
            required
            placeholder="Tipo de Sangre"
        />
        <input
            class="controls"
            type="text"
            name="Pad"
            id="Pad"
            required
            placeholder="Padecimientos"
        />
        <input
            class="controls"
            type="text"
            name="ale"
            id="ale"
            required
            placeholder="Alergias"
        />
        <input
            class="controls"
            type="text"
            name="Med"
            id="Med"
            required
            placeholder="Medicamentos"
        />
        <p><input class="botons" type="submit" value="Crear usuario"></p>
        </form>
</section>  
</body>
</html>
