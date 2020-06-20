<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>php-inputs</title>
</head>
<body>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        First name: <input type="text" name="name_text"><br><br>
        Last name: <input type="text" name="contact_text"><br><br>
        <input type="submit" value="SUBMIT" id="submit_btn">
    </form>

    <?php

        $firstName = $lastName = "";
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $firstName = $_POST["name_text"];
            $lastName = $_POST["contact_text"];
        }

        print($firstName ."<br>".$lastName);

    ?>


    
</body>
</html> 