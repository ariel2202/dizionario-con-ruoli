<!DOCTYPE html>
<html>

    <h4>Per registrare una parola devi registrare anche i tuoi dati</h4>
    <body>
    
    <form method="POST" action="">
        nome  <input type="text" name="nome">
        cognome <input type="text" name="cognome"><br><br>
        parola<br>
        <input type="text" name="parola" id="parola"><br>
        sinonimo<br>
        <input type="text" name="sinonimo" id="sinonimo"><br>
        contrario<br>
        <input type="text" name="contrario" id="contrario"><br><br>
        <input type="submit" value="invio" name="btn1">
        <a href="principale.php">torna alla pagina principale</a>
    </form>
</body>

<?php


    session_start();
    if(isset($_POST['btn1']))
    {
        include("aprireConnessione1.php");

        $_SESSION['nome'] = $_POST['nome'];
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        $parola=$_POST['parola'];
        $sinonimo=$_POST['sinonimo'];
        $contrario=$_POST['contrario'];

        $connessione->query("INSERT INTO $pdb (pChiave,sinonimo,contrario,nome,cognome) values ('$parola','$sinonimo','$contrario','$nome','$cognome')");

        echo 'la nuova parola è stata inserita correttamente '. $_SESSION['nome'];
        include("chiudiConnessione.php");
        
    }


?>
</html>


