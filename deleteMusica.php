<?php 
	$con = mysqli_connect("localhost","root","","school");

    
    $stmt = "DELETE FROM MUSICA WHERE IDMUSICA = ?";

    $stmtprep = mysqli_prepare($con,$stmt);
    mysqli_stmt_bind_param($stmtprep, "i", $_GET["id"] );
    
    mysqli_stmt_execute($stmtprep);

    $newURL = "index.htm"; 
    header('Location: '.$newURL);
?>