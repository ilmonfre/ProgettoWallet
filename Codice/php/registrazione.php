<?php
include 'connect_DB.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conf_password = $_POST['conf_password'];
    $cf = $_POST['cf'];
    $data_nascita = $_POST['data_nascita'];

    if(empty($nome) && empty($cognome) && empty($email) && empty($password) && empty($conf_password) && empty($cf) && empty($data_nascita)){
        // Errore compilare tutti i campi
    }
    if($password !== $conf_password){
        // Errore password diverse
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