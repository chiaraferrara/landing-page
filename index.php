<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// se l'utente è loggato lo reindirizzo alla home altrimenti lo reindirizzo al form
if ($_SESSION['isLogged'] == true ) {
    header("Location: home.php");
    exit;
} else {
        header("Location: form.php");
    }



?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('logoutButton').addEventListener('click', function () {
            <?php if($_SESSION['isLogged'] == false){?>
                window.location.href = "/form.php";
            <?php } else { ;?>
                window.location.href = "/home.php";
            <?php } ;?>
        });
    });