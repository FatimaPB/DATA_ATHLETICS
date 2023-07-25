<div>
  <h2>Agregar nuevo estado</h2>
  <!--en el metodo action de este formulario llamaremos al metodo Add de nuestro controlador -->
  <form 
  action="http://localhost/pruebaplayeras/?C=EstadoController&M=add" 
  method="post"
  enctype="multipart/form-data">
    <p>
      <label for="nomEstado">Estado: </label><br />
      <input type="text" name="nomEstado" id="nomEstado" placeholder="Nombre del estado"/>
    </p>
    <p><input type="submit" value="Añadir nuevo estado"></p>
  </form>
</div>
