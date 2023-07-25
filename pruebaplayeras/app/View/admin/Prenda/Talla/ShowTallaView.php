<div>
  <h2>Administracion de Tallas</h2>
  <p><a href="http://localhost/pruebaplayeras/?C=TallaController&M=CFAdd">Agregar Nueva Talla</a></p>
  <p>
    <table border=1 >
        <thead>
            <td>Talla</td>
            <td>Acciones</td>
        </thead>
        <tbody>
            <?php
              foreach($datos as $dato){
                echo "<tr>";
                echo "<td>". $dato['talla'] ."</td>";
                echo "<td><button onclick='editar(".$dato['id_talla'].")'>Editar</button><br>
                <button onclick='eliminar(".$dato['id_talla'].")'>Eliminar</button> </td>";
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
    window.location.href = "http://localhost/pruebaplayeras/?C=TallaController&M=CFEdit&id="+id
  }
  //creamos la funcion para eliminar un usuario por medio de su id despues de confirmar con un confirm
  function eliminar(id){
    if(confirm("¿Desea eliminar el estado?")){
      window.location.href = "http://localhost/pruebaplayeras/?C=TallaController&M=Delete&id="+id
    }
  }
</script>
