<div>
  <h2>Agregar nueva prenda</h2>
  <!--en el metodo action de este formulario llamaremos al metodo Add de nuestro controlador -->
  <form 
  action="http://localhost/pruebaplayeras/?C=PrendaController&M=Add" 
  method="post"
  enctype="multipart/form-data">
    <p>
      <label for="nomModel">Modelo : </label><br />
      <input type="text" name="nomModel" id="nomModel" placeholder="Modelo"/>
    </p>
    <p>
      <label for="genero">Genero : </label><br />
      <input
        type="text"
        name="genero"
        id="genero"
        placeholder="Genero"
      />
    </p>
    <p>
      <label for="PrecioV">Precio de venta : </label><br />
      <input
        type="number"
        name="PrecioV"
        id="PrecioV"
        placeholder="Precio de venta $"
      />
    </p>
    <p>
        <label for="iva">Iva:  </label><br />
        <input type="number" name="iva" id="iva" placeholder="iva"/>
    </p>
    <p>
      <label for="ftproducto">Foto del producto : </label>
      <input type="file" name="ftproducto" id="ftproducto" accept="image/jpg">
    </p>
    <p>
        <label for="corte">corte : </label><br>
        <select name="corte" id="corte">
            <option value="1">Slim fit</option>
            <option value="2">Loose fit</option>
            <option value="3">Regular fit</option>
            <option value="4">Athletic fit</option>
            <option value="5">Oversized fit</option>
        </select>
    </p>
    <p>
        <label for="talla">Talla : </label><br>
        <select name="talla" id="talla">
            <option value="1">XS</option>
            <option value="2">S</option>
            <option value="3">M</option>
            <option value="4">L</option>
            <option value="5">XL</option>
            <option value="6">XXL</option>
        </select>
    </p>
    <p>
        <label for="color">color : </label><br>
        <input type="color" name="color" id="color">
    </p>
    <p><input type="submit" value="Añadir prenda"></p>
  </form>
</div>
