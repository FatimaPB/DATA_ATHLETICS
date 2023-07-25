<div>
  <h2>Administracion de materiales/telas</h2>
  <p><a href="http://localhost/pruebaplayeras/?C=MaterialController&M=CFAdd">Agregar Nuevo Estilo</a></p>
  <p>
    <table border=1 >
        <thead>
            <td>Material</td>
            <td>Acciones</td>
        </thead>
        <tbody>
            <?php
              foreach($datos as $dato){
                echo "<tr>";
                echo "<td>". $dato['Material'] ."</td>";
                echo "<td><button onclick='editar(".$dato['idMateriales'].")'>Editar</button><br>
                <button onclick='eliminar(".$dato['idMateriales'].")'>Eliminar</button> </td>";
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
    window.location.href = "http://localhost/pruebaplayeras/?C=MaterialController&M=CFEdit&id="+id
  }
  //creamos la funcion para eliminar un usuario por medio de su id despues de confirmar con un confirm
  function eliminar(id){
    if(confirm("¿Desea eliminar el estado?")){
      window.location.href = "http://localhost/pruebaplayeras/?C=MaterialController&M=Delete&id="+id
    }
  }
</script>
