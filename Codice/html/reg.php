<?php
include '../php/connect_DB.php';

$erroreRegistrati = "";

if (isset($_GET['erroreRegistrati'])) {
    $erroreRegistrati = $_GET['erroreRegistrati'];
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrati</title>
    <link rel="stylesheet" href="../css/styleReg.css">
</head>
<body>

    <div id="avviso-errore" class="custom-toast">
            <div class="errore">
                <?php
                if(!empty($erroreRegistrati)){
                    echo $erroreRegistrati;
                }
                ?>
            </div>
        <a href="#" class="close-toast">×</a>
    </div>

    <div class="registration-card">
        
        <a href="index.html" class="back-home" title="Torna alla Home">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
        </a>

        <div class="header">
            <h2>Registrati</h2>
            <p>Inserisci i tuoi dati per creare un nuovo account.</p>
        </div>

        <form method="post" action="../php/registrazione.php">
            <div class="form-grid">
                <input type="text" name="nome" placeholder="Nome" required>
                <input type="text" name="cognome" placeholder="Cognome" required>

                <input type="email" name="email" class="full-width" placeholder="Indirizzo Email" required>

                <input type="text" name="cf" class="cf" placeholder="Codice Fiscale" pattern="^[A-Za-z]{6}[0-9]{2}[A-Za-z][0-9]{2}[A-Za-z][0-9]{3}[A-Za-z]$" required>
                <input type="date" name="data_nascita" required>

                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="conf_password"  placeholder="Conferma Password" required>

                <button type="submit">Crea Account</button>
            </div>
        </form>
    </div>

</body>
</html>