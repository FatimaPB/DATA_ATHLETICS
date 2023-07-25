<div>
    <table border=1 >
        <thead>
            <td>Colonias</td>
            <td>Municipio</td>
            <td>Acciones</td>
        </thead>
        <tbody>
            <?php
              foreach($colonias as $colonia){
                echo "<tr>";
                echo "<td>". $colonia['Colonia'] ."</td>";
                echo "<td>". $colonia['id_Ciudad'] ."</td>";
                echo "<td><button onclick='editar(".$colonia['id_colonia'].")'>Editar</button><br>
                <button onclick='eliminar(".$colonia['id_colonia'].")'>Eliminar</button> </td>";
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
