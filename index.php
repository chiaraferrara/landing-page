<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica se l'utente è già loggato
if ($_SESSION['isLogged'] === true ) {
    header("Location: home.php");
    exit;
} else {
        header("Location: form.php");
    }
?>