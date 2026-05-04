<?php
include 'connect_DB.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email) && empty($password)){
        // Errore compila tutti i campi
    }

    $query_cerca = "SELECT COUNT(*) FROM utente WHERE email = '$email'";
    $result_cerca = $conn->query($query_cerca);
    $row_cerca = $fetch_assoc($result_cerca);
    if($row_cerca === 1){
        $query_verifica = "SELECT id, nome, cognome, password FROM utente WHERE email = '$email'";
        $result_verifica = $conn->query($query_verifica);
        $row_verifica = $fetch->assoc($result_verifica);
        if($row_verifica['password'] === $password){
            session_start();
            $_SESSION['id'] = $row_verifica['id'];
            $_SESSION['nome'] = $row_verifica['nome'];
            $_SESSION['cognome'] = $row_verifica['cognome'];
        }else{
            // Errore password inserita sbagliata
        }
    }else{
        // Errore account non esistente
    }
}
?>