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



    ?>
    <h1>Welcome to the home page <?php echo $_SESSION['fullName']?></h1>

    <div> 

    <?php echo $_SESSION['companyName']?></br>
    <?php echo $_SESSION['email']?></br>
    <?php echo $_SESSION['phone']?></br>
    <?php echo $_SESSION['service']?></br>

    </div>
<hr/>
    <button id="logoutButton">Logout</button>




</body>

<script>
    document.getElementById('logoutButton').addEventListener('click', function () {
        window.location.href = "index.php";
    });

</script>

</html>