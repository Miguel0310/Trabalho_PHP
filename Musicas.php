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
<body>

<?php
$con = mysqli_connect("localhost","root","","school");
$stmt = "SELECT * FROM GENERO";
$result = mysqli_query($con, $stmt);
?>


<div class="alert alert-danger">Cadastre sua Música!</div>


      <?php 
      $id = 0;
      $NOM_MUSICA = "";
      $AUTOR = "";
      $IDGENERO = 0;

      if(isset($_GET['id'])){
        $id = $_GET['id'];
        $con = mysqli_connect("localhost","root","","school");
        $stmt2 = "SELECT * FROM MUSICA,GENERO WHERE IDMUSICA = ?";
        $stmtprep2 = mysqli_prepare($con, $stmt2);
        mysqli_stmt_bind_param($stmtprep2, "i", $id);
        mysqli_stmt_execute($stmtprep2);
        $result = mysqli_stmt_get_result($stmtprep2);
        while($row = $result->fetch_row()){
            $NOM_MUSICA = $row[1];
            $AUTOR = $row[2];
            $item = $row[3];
          }
      }
      ?>
      <form action="saveMusica.php" method="POST">
                
        <input type="hidden" class="form-control" id="txtcodigo"  placeholder="Digite o código" 
            name="txtcodigo"  value="<?=$id?>">

        <div class="form-group">
            <label for="txtMusica">Nombre da Música</label>
            <input type="text" class="form-control" id ="txtMusica" placeholder="Nome da Música!" aria-label="Username"
            aria-describedby="addon-wrapping" name="txtMusica" value="<?=$NOM_MUSICA?>">
        </div>

        <div class="form-group">
            <label for="txtAutor">Nombre do Compositor Autor / Banda</label>
            <input type="text" class="form-control" id ="txtAutor" placeholder="Nome do Autor!" aria-label="Username"
            aria-describedby="addon-wrapping" name="txtAutor" value="<?=$AUTOR?>">
        </div>

        <div class="dropdown"> <!-- Código difil concluido! -->
          <label>Genero Registrados</label>
          <select name = "Generos">
            <option value=""> Seleciona Generos</option>
            <?php 

            foreach($result as $item){
            ?>
            <option value="<?php echo $item["IDGENERO"];?>"><?php echo $item["GENERO"];?> </option>
            <?php }?>

          </select>
        
        </div>

        <div class="input-group-append">
        <button class="btn btn-outline-success" type="submit" id="BtnCadastrar">Cadastrar</button>
        <a href="index.htm" class="btn btn-outline-danger">Cancelar</a>
      </div>

    </form>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>