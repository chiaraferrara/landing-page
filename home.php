<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    session_start();

    if (isset ($_SESSION['companyName']) && isset ($_SESSION['fullName']) && isset ($_SESSION['email']) && isset ($_SESSION['phone']) && isset ($_SESSION['service']) && isset ($_SESSION['isLogged'])) {
        echo "Company Name: " . $_SESSION['companyName'] . "<br>";
        echo "Full Name: " . $_SESSION['fullName'] . "<br>";
    }


    ?>
    <h1>Welcome to the home page</h1>

    <button id="logoutButton">Logout</button>




</body>

<script>
    document.getElementById('logoutButton').addEventListener('click', function () {
        window.location.href = "index.php";
    });

</script>

</html>