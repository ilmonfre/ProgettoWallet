<?php
include '../php/connect_DB.php';

$erroreTransazione = "";

if (isset($_GET['erroreTransazione'])) {
    $erroreTransazione = $_GET['erroreTransazione'];
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aggiungi transazione</title>
    <link rel="stylesheet" href="../css/styleReg.css">
</head>
<body>

    <div id="avviso-errore" class="custom-toast">
            <div class="errore">
                <?php
                if(!empty($erroreTransazione)){
                    echo $erroreTransazione;
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
            <h2>Aggiungi transazione</h2>
            <p>Inserisci i dati della transazione.</p>
        </div>

        <form method="post" action="../php/transazione.php">
            <div class="form-grid">
                <input type="text" name="titolo" placeholder="Titolo" required>
                <input type="text" name="prezzo" placeholder="Prezzo" required>

                <input type="text" name="descriz" class="full-width" placeholder="Descrizione (facoltativa)" >

                <select name="tipologia">
                    <option value="1">Entrata</option>
                    <option value="0">Uscita</option>
                </select>

                <select name="categoria">
                    <?php
                    include 'connect_DB.php';
                    $query = "SELECT id, descriz FROM categoria";
                    $result = $conn->query($query);
                    while($row = $result->fetch_assoc()){
                        echo "<option value='".$row['id']."'>".$row['descriz']."</option>";
                    }
                    ?>
                </select>

                <input type="date" name="data" required>

                <button type="submit">Aggiungi transazione</button>
            </div>
        </form>
    </div>

</body>
</html>