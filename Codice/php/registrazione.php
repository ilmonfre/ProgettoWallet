<?php
include 'connect_DB.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $nome = $POST['nome'];
    $cognome = $POST['cognome'];
    $email = $POST['email'];
    $password = $POST['password'];
    $cf = $POST['cf'];
    $data_nascita = $POST['data_nascita'];

    if(empty($nome) && empty($cognome) && empty($email) && empty($password) && empty($cf) && empty($data_nascita)){
        // Errore compilare tutti i campi
    }

    $query_cerca = "SELECT COUNT(*) FROM utente WHERE email = '$email'";
    $result_cerca = $conn->query($query_cerca);
    $row_cerca = $fetch->assoc($result_cerca);
    if($row_cerca === 0){
        $query_inserisci = "INSERT INTO utente (nome, cognome, email, password, cf, data_nascita) VALUES ('$nome', '$cognome', '$email', '$password', '$cf', '$data_nascita')";
        $conn->query($query_inserisci);
    }else{
        // Errore email già presente
    }
}
?>