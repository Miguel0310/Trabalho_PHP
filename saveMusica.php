<?php
    $con = mysqli_connect("localhost","root","","school");

    $musica = $_POST['txtMusica'];
    $autor = $_POST['txtAutor'];
    $genero = $_POST['Generos'];


    //var_dump($_POST);
    if($_POST["txtcodigo"] == 0){
        $stmt = "INSERT INTO MUSICA(NOM_MUSICA,AUTOR,IDGENERO) VALUES(?,?,?)";
    }else{
        $stmt = "UPDATE     MUSICA 
                 SET        NOM_MUSICA = '" . $musica .  "', 
                            AUTOR = '".$autor."', 
                            IDGENERO = '".$genero."' 
                 WHERE      IDMUSICA = ". $_POST["txtcodigo"];
    }

    $stmtprep = mysqli_prepare($con, $stmt);
    mysqli_stmt_bind_param($stmtprep, "ssi", $_POST["txtMusica"], $_POST["txtAutor"],$_POST["Generos"]);
    mysqli_stmt_execute($stmtprep);

    $newURL = "index.htm";
    header('Location: '.$newURL);
?> 