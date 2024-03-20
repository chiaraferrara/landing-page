<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php

    if (session_status() === PHP_SESSION_NONE) {

        session_start();
    }

    if (isset($_SESSION['isLogged']) && $_SESSION['isLogged'] === true) {
        header("Location: home.php");
        exit;
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset ($_POST['companyName']) && isset ($_POST['fullName']) && isset ($_POST['email']) && isset ($_POST['phone']) && isset ($_POST['service'])) {

            $_SESSION['companyName'] = $_POST['companyName'];
            $_SESSION['fullName'] = $_POST['fullName'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['phone'] = $_POST['phone'];
            $_SESSION['service'] = $_POST['service'];
            $_SESSION['isLogged'] = true;
            header("Location: home.php");
            exit;
        }
    }
    ?>





    <div class="row">
        <div class="formblock">
            <h2>Fill the form Below</h2>
            <p>Complete the form below to get instant access</p>
            <form method="post" onsubmit="event.preventDefault();" action=<?php echo $_SERVER['PHP_SELF']; ?>>

                <div class="column">
                    <input type="text" name="companyName" id="companyName" placeholder="Company Name"
                        value='<?php $companyName ?>' ; required>
                    <input type="text" name="fullName" id="fullName" placeholder="Full Name" value='<?php $fullName ?>'
                        ; required>
                    <input type="email" name="email" id="email" placeholder="Email" value='<?php $email ?>' ; required>
                    <input type="tel" name="phone" id="phone" placeholder="Phone" value='<?php $phone ?>' ; required>
                    <select name="service" id="service" value='<?php $service ?>'>
                        <option value="" disabled selected>Choose service...</option>
                        <option value="Phone Repair">Phone Repair</option>
                        <option value="Return Phone">Return Phone</option>
                    </select>
                    <input type="hidden" name="isLogged" value='<?php $isLogged = true ?>'>
                    <button type="submit" id="submitButton" name="submit" disabled>Send request</button>
                </div>

            </form>
        </div>

        <div class="block">
            <img src="img.png" />
        </div>

    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var inputs = document.querySelectorAll('input:not([type="hidden"]), select');
            var submitButton = document.getElementById('submitButton');

            inputs.forEach(function (input) {
                input.addEventListener('input', function () {
                    var allFilled = true;
                    inputs.forEach(function (input) {
                        if (!input.value || input.type === 'hidden') {
                            allFilled = false;
                        }
                    });
                    submitButton.disabled = !allFilled;
                });
            });

            submitButton.addEventListener("click", function () {
                var companyNameInput = document.querySelector("input[name='companyName']");
                var companyName = companyNameInput.value;
                var fullNameInput = document.querySelector("input[name='fullName']");
                var fullName = fullNameInput.value;
                var emailInput = document.querySelector("input[name='email']");
                var email = emailInput.value;
                var phoneInput = document.querySelector("input[name='phone']");
                var phone = phoneInput.value;
                var serviceInput = document.querySelector("select[name='service']");
                var service = serviceInput.value;

                var isLoggedInput = document.querySelector("input[name='isLogged']");
                isLoggedInput.value = true;

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "<?php echo $_SERVER['PHP_SELF']; ?>", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                        alert(
                            fullName + " " + companyName + " " + email + " " + phone + " " + service + " " +

                            "registrato" + isLoggedInput.value);
                    }
                };
                xhr.send(
                    "companyName=" + encodeURIComponent(companyName) +
                    "&fullName=" + encodeURIComponent(fullName) +
                    "&email=" + encodeURIComponent(email) +
                    "&phone=" + encodeURIComponent(phone) +
                    "&service=" + encodeURIComponent(service) +
                    "&isLogged=true"
                );
            });
        });

        document.getElementById('submitButton').addEventListener('click', function () {
            window.location.href = "home.php";
        });

    </script>

</body>

</html>