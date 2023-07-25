<div>
  <h2>Este es el apartado de administración de prendas</h2>

  <p><a href="http://localhost/pruebaplayeras/?C=PrendaController&M=CallPrendaAdd">Agregar Nueva Prenda</a></p>
  <p>
    <table border=1 >
        <thead>
            <td>Prenda</td>
            <td>Precio</td>
        </thead>
        <tbody>
            <?php
            foreach($prendas as $prenda){
                echo "<tr>";
                echo "<td>". $prenda['nomModelo'] ."</td>";
                echo "<td>". $prenda['Precio'] ."</td>";
            }
            ?>
        </tbody>
    </table>
  </p>
  

  

 
</div>