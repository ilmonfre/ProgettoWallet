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

    if(empty($nome) || empty($cognome) || empty($email) || empty($password) || empty($conf_password) || empty($cf) || empty($data_nascita)){
        header("Location: ../html/home.html?erroreRegistrazione=Compila tutti i campi");
    }
    if($password !== $conf_password){
        header("Location: ../html/home.html?erroreRegistrazione=Le password inserite non coincidono");
    }

    $query_cerca = "SELECT COUNT(*) AS presente FROM utente WHERE email = '$email'";
    $result_cerca = $conn->query($query_cerca);
    $row_cerca = $result_cerca->fetch_assoc();
    if($row_cerca['presente'] == 0){
        $query_inserisci = "INSERT INTO utente (nome, cognome, email, password, cf, data_nascita) VALUES ('$nome', '$cognome', '$email', '$password', '$cf', '$data_nascita')";
        $conn->query($query_inserisci);
        header("Location: ../html/home.html");
    }else{
        header("Location: ../html/home.html?erroreRegistrazione=Utente già esistente");
    }
}
?>