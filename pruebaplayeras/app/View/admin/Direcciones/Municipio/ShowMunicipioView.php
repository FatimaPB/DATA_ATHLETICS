<div>
    <table border=1 >
        <thead>
            <td>Estado</td>
            <td>Acciones</td>
        </thead>
        <tbody>
            <?php
              foreach($municipios as $municipio){
                echo "<tr>";
                echo "<td>". $municipio['Ciudad'] ."</td>";
                echo "<td>". $municipio['id_Estado'] ."</td>";
                echo "<td><button onclick='editar(".$municipio['id_ciudad'].")'>Editar</button><br>
                <button onclick='eliminar(".$municipio['id_ciudad'].")'>Eliminar</button> </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
  </p>
</div>
<script>
  //creamos la funcion para llmar al formulario de editar un usuario
  function editar(id){
    window.location.href = "http://localhost/pruebaplayeras/?C=MunicipioController&M=CFEdit&id="+id
  }
  //creamos la funcion para eliminar un usuario por medio de su id despues de confirmar con un confirm
  function eliminar(id){
    if(confirm("¿Desea eliminar el estado?")){
      window.location.href = "http://localhost/pruebaplayeras/?C=MunicipioController&M=Delete&id="+id
    }
  }
</script>
