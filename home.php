<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>

    <?php
    if (session_status() === PHP_SESSION_NONE) {

        session_start();
    }

    ?>
    <div class="dashboard">
        <h1>Welcome to the home page</h1>
        


        <?php
        if (isset($_SESSION['companyName']) && isset($_SESSION['email']) && isset($_SESSION['phone']) && isset($_SESSION['service'])){
            echo $_SESSION['companyName'] . "<br>";
            echo $_SESSION['email'] . "<br>";
            echo $_SESSION['phone'] . "<br>";
            echo $_SESSION['service'] . "<br>";
        }
        ?>


        <button id="logoutButton">Logout</button>


    </div>

</body>

<script>
    document.getElementById('logoutButton').addEventListener('click', function () {
        <?php $_SESSION['isLogged'] = false;
        ?>
        window.location.href = "index.php";
        
    });

</script>

</html>