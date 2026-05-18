<?php
include 'connect_DB.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $titolo = $_POST['titolo'];
    $descriz = $_POST['descriz'];
    $prezzo = $_POST['prezzo'];
    $tipologia = $_POST['tipologia'];
    $data = $_POST['data'];
    $categoria = $_POST['categoria'];

    if(empty($titolo) || empty($prezzo) || empty($tipologia) || empty($data) || empty($categoria)){
        header("Location: ../html/trnsz.php?erroreTransazione=Compila tutti i campi#avviso-errore");
        exit;
    }
    if(!is_numeric($prezzo)){
        header("Location: ../html/trnsz.php?erroreTransazione=Inserisci il prezzo nel formato richiesto#avviso-errore");
        exit;
    }
    if(!(strtotime($data) < strtotime(date("Y-m-d")))){
        header("Location: ../html/trnsz.php?erroreTransazione=Inserisci una data già passata#avviso-errore");
        exit;
    }
    $query = "INSERT INTO transazione (titolo, descriz, prezzo, tipologia, data, id_categoria) VALUES ('$titolo', '$descriz', '$prezzo','$tipologia','$data','$categoria')";
    $result = $conn->query($query);
    header("Location: ../html/home.html");
    exit;
}
?>