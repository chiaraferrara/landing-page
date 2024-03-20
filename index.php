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

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset ($_POST['companyName']) && isset ($_POST['fullName']) && isset ($_POST['email']) && isset ($_POST['phone']) && isset ($_POST['service'])) {
        require ('User.php');

        $user = new User();

        $companyName = $_POST['companyName'];
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $service = $_POST['service'];

        $user->login($companyName, $fullName, $email, $phone, $service);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;


        if ($user->isLoggedIn()) {
            echo "Logged in";
        }
    }



    ?>


    <div class="row">
        <div class="formblock">
            <h2>Fill the form Below</h2>
            <p>Complete the form below to get instant access</p>
            <form method="post" action=<?php echo $_SERVER['PHP_SELF']; ?>>

                <div class="column">
                    <input type="text" name="companyName" id="companyName" placeholder="Company Name"
                        value='<?php $companyName ?>' ; required>
                    <input type="text" name="fullName" id="fullName" placeholder="Full Name" value='<?php $fullName ?>'
                        ; required>
                    <input type="email" name="email" id="email" placeholder="Email" value='<?php $email ?>' ; required>
                    <input type="tel" name="phone" id="phone" placeholder="Phone" value='<?php $phone ?>' ; required>
                    <select name="service" id="service" value='<?php $service ?>'>
                        <option value="" disabled selected>Choose service...</option>
                        <option value="service1">Service1</option>
                        <option value="service2">Service2</option>
                    </select>
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
            var inputs = document.querySelectorAll('input, select');
            var submitButton = document.getElementById('submitButton');

            inputs.forEach(function (input) {
                input.addEventListener('input', function () {
                    var allFilled = true;
                    inputs.forEach(function (input) {
                        if (!input.value) {
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

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "<?php echo $_SERVER['PHP_SELF']; ?>", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                        alert(
                            fullName + " " + companyName + " " + email + " " + phone + " " + service + " " +

                            "registrato");
                    }
                };
                xhr.send(
                    "companyName=" + encodeURIComponent(companyName) +
                    "&fullName=" + encodeURIComponent(fullName) +
                    "&email=" + encodeURIComponent(email) +
                    "&phone=" + encodeURIComponent(phone) +
                    "&service=" + encodeURIComponent(service)
                );
            });
        });
    </script>

</body>

</html>