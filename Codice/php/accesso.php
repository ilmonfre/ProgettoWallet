<?php
include 'connect_DB.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email) || empty($password)){
        header("Location: ../html/log.php?erroreAccedi=Compila tutti i campi#avviso-errore");
        exit;
    }

    $query_cerca = "SELECT COUNT(*) AS presente FROM utente WHERE email = '$email'";
    $result_cerca = $conn->query($query_cerca);
    $row_cerca = $result_cerca->fetch_assoc();
    if($row_cerca['presente'] == 1){
        $query_verifica = "SELECT id, nome, cognome, password FROM utente WHERE email = '$email'";
        $result_verifica = $conn->query($query_verifica);
        $row_verifica = $result_verifica->fetch_assoc();
        if($row_verifica['password'] === $password){
            session_start();
            $_SESSION['id'] = $row_verifica['id'];
            $_SESSION['nome'] = $row_verifica['nome'];
            $_SESSION['cognome'] = $row_verifica['cognome'];
            header("Location: ../html/home.html");
            exit;
        }else{
            header("Location: ../html/log.php?erroreAccedi=Password sbagliata#avviso-errore");
            exit;
        }
    }else{
        header("Location: ../html/log.php?erroreAccedi=Utente non esistente#avviso-errore");
        exit;
    }
}
?>