<!DOCTYPE html>
<html>
    <body>
        Per consultare una parola basta inserire la parola da ricercare<br>
        puoi aprire una sessione per tenere traccia delle volte che hai visitato questa pagina.<br>

        <br>
        <form method="POST" action="">
            nome utente : 
            <input type="text" name="nomeU" id="nomeU">
            parola : 
            <input type="text" name="parola" id="parola">
            <input type="submit" value="consulta" name="btn">
            <a href="chiudiSessione.php">chiudi sessione</a><br><br><hr>
            per registrare una parola invece clicca
            <a href="registrazione.php"> qui!!</a><br><br>

        </form>
        
        

    </body>
    <?php

        session_start();
        
        if(isset($_POST['btn']))
        {
            
            include("aprireConnessione1.php");
            $parola = $_POST['parola'];
            $risultato = mysqli_query($connessione, "SELECT * FROM $pdb   WHERE pChiave = '$parola' ");
            while($consulta = mysqli_fetch_array($risultato))
            {

                echo 'parola : ' . $consulta['pChiave'];
                echo '<br>';
                echo 'sinonimo : ' . $consulta['sinonimo'];
                echo '<br>';
                echo 'contrario : ' . $consulta['contrario'];
                echo '<br><br>';
                echo 'Questa parola è stata inserita da '.$consulta['cognome'] . ' '.$consulta['nome'];
                
            }
            if(!isset($_SESSION['cont'])){
                $_SESSION['cont'] = 1;
                $_SESSION['nomeU'] = $_POST['nomeU'];
                echo '<br>benvenuto '. $_SESSION['nomeU'];
            }
            else if(isset($_SESSION['cont'])){
                $_SESSION['cont']++;
                echo '<br>ciao '.$_SESSION['nomeU']. ' è la '.$_SESSION['cont'].' volta che visiti questa pagina';
            }
            
         

            include("chiudiConnessione.php");
        }
       
    ?>
</html>