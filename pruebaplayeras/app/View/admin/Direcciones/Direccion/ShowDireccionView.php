<div>
    <table border=1 >
        <thead>
            <td>Colonias</td>
            <td>Municipio</td>
            <td>Acciones</td>
        </thead>
        <tbody>
            <?php
              foreach( $direcciones as $direccion){
                echo "<tr>";
                echo "<td>". $direccion['Direccion'] ."</td>";
                echo "<td>". $direccion['id_Colonia'] ."</td>";
                echo "<td><button onclick='editar(".$direccion['id_direccion'].")'>Editar</button><br>
                <button onclick='eliminar(".$direccion['id_direccion'].")'>Eliminar</button> </td>";
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
    window.location.href = "http://localhost/pruebaplayeras/?C=Controller&M=CFEdit&id="+id
  }
  //creamos la funcion para eliminar un usuario por medio de su id despues de confirmar con un confirm
  function eliminar(id){
    if(confirm("¿Desea eliminar el estado?")){
      window.location.href = "http://localhost/pruebaplayeras/?C=DireccionController&M=Delete&id="+id
    }
  }
</script>
