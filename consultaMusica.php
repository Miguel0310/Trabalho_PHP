
<!-- Consulta / Editar / Excluir uma música! -->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Locker!</title>
  </head>

<?php 
$con = mysqli_connect("localhost","root","","school");
$stmt = "SELECT IDMUSICA,NOM_MUSICA,AUTOR,GENERO.GENERO FROM musica INNER JOIN GENERO ON GENERO.IDGENERO = MUSICA.IDGENERO";
$result = mysqli_query($con, $stmt);
?>

  
<body>
<div style = "height:50px; background-color: springgreen; text-align:center; font-family:verdana;font-size:200%">Pesquise a música!</div>

<table>
  <td> <div style ="color:tomato;font-size:200%;">ID&emsp; </div></td>
  <td> <div style ="color:tomato;font-size:200%"> Musica&emsp; </div></td>
  <td> <div style ="color:tomato;font-size:200%"> Autor&emsp; </div></td>
  <td> <div style ="color:tomato;font-size:200%"> Genero&emsp; </div></td>
  <tbody>
    <?php
      while($row = $result->fetch_row()){
    ?>
    <tr>
      <td><?=$row[0]?></td>
      <td><?=$row[1]?></td>
      <td><?=$row[2]?></td>
      <td><?=$row[3]?></td>
      <td><a href="Musicas.php?id=<?=$row[0]?>"  class="btn btn-primary">Alterar</a> - 
      <a href="deleteMusica.php?id=<?=$row[0]?>" class="btn btn-danger">Excluir</a></td>
    </tr>
    <?php
      }
    ?>
  </tbody>
</table>
<a href="index.htm" class="btn btn-outline-danger">Cancelar</a>


</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>