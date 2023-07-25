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
        action="http://localhost/pruebaplayeras/?C=ClienteController&M=Edit" 
        method="post"
        enctype="multipart/form-data">
        <h4>Editar usuario</h4>
        <input class="controls" type="text" name="nombre" id="nombre" placeholder="Nombre"
            required 
            pattern="[A-Za-z ]*"
            title="Solo se admiten caracteres alfabeticos"
            value=" <?= $datos['Nombre'] ?>"/>
        <input
            class="controls"
            type="text"
            name="apaterno"
            id="apaterno"
            placeholder="Apellido Paterno"
            required 
            pattern="[A-Za-z ]*"
            title="Solo se admiten caracteres alfabeticos"
            value="<?= $datos['APaterno'] ?>"
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
            value="<?= $datos['AMaterno'] ?>"
        />
        <input
            class="controls"
            type="text"
            name="numine"
            id="numine"
            required
            placeholder="Número de ine"
            value="<?= $datos['NumIne'] ?>"
        />
        <input class="controls" type="number" name="edad" 
            id="edad"
            required
            placeholder="Edad"
            value="<?= $datos['Edad'] ?>"
        />
        <div class="upload">
            <button type = "button" class = "btn-warning">
              <i class = "fa fa-upload"></i> Subir foto
              <input type="file" name="fot" id="fot" accept="image/*">
            </button>
        </div>
        <input
            class="controls"
            type="email"
            name="email"
            id="email"
            required
            placeholder="E-mail"
            value="<?= $datos['Email'] ?>"
        />
        <input class="controls" type="text" name="user" id="user" placeholder="Usuario"
            minlength="5"
            maxlength="12"
            pattern="[A-Za-z0-9_]+"
            title="Usuario invalido, intente con otro nombre de usuario"
            value="<?= $datos['Usuario'] ?>"/>
        <input class="controls" type="pasword" name="pass" id="pass" placeholder="Password" 
            required 
            minlength="8" 
            maxlength="15"
            title="Crea una contraseña con al menos un numero, una leta minuscula y una mayúscula, un caracter especial y un espacio"
            value="<?= $datos['Pass'] ?>"
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
            value="<?= $datos['TipoSangre'] ?>"
        />
        <input
            class="controls"
            type="text"
            name="Pad"
            id="Pad"
            required
            placeholder="Padecimientos"
            value="<?= $datos['Padecimientos'] ?>"
        />
        <input
            class="controls"
            type="text"
            name="ale"
            id="ale"
            required
            placeholder="Alergias"
            value="<?= $datos['Alergias'] ?>"
        />
        <input
            class="controls"
            type="text"
            name="Med"
            id="Med"
            required
            placeholder="Medicamentos"
            value="<?= $datos['Medicamentos'] ?>"
        />
        <input type="hidden" name="ava" id="ava" value="<?= $datos['Foto'] ?>">
        <input type="hidden" name="id" value="<?= $datos['idCliente'] ?>" readonly id="id" />
        <p><input class="botons" type="submit" value="Editar usuario"></p>
        </form>
</section>  
</body>
</html>
