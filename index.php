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
    require ('User.php');

    $user = new User();


    
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
        });


        document.addEventListener("DOMContentLoaded", function () {
            var submitButton = document.querySelector("#submitButton");

            submitButton.addEventListener("click", function (event) {
                event.preventDefault();

                var form = document.querySelector("form");
                var formData = new FormData(form);
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "<?php echo $_SERVER['PHP_SELF']; ?>", true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                        alert(formData, "Dati inviati con successo!");

                    }
                };
                xhr.send(formData);
            });
        });
    </script>

</body>

</html>