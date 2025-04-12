<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <style>
        .error { color: red; font-size: 12px; }
        .container {
            width: 50%;
            margin: auto;
            padding: 20px;
            border: 1px solid black;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Test Online</h2>

    <?php
    $name = $q1 = $q2 = $q3 = "";
    $nameErr = $q1Err = $q2Err = $q3Err = "";
    $formValid = true;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Numele este obligatoriu!";
            $formValid = false;
        } else {
            $name = htmlspecialchars($_POST["name"]);
        }

        if (empty($_POST["q1"])) {
            $q1Err = "Alege o variantă!";
            $formValid = false;
        } else {
            $q1 = htmlspecialchars($_POST["q1"]);
        }

        if (empty($_POST["q2"])) {
            $q2Err = "Alege cel puțin o opțiune!";
            $formValid = false;
        } else {
            $q2 = implode(", ", $_POST["q2"]);
        }

        if (empty($_POST["q3"])) {
            $q3Err = "Răspunsul este obligatoriu!";
            $formValid = false;
        } else {
            $q3 = htmlspecialchars($_POST["q3"]);
        }

        if ($formValid) {
            echo "<h3>Rezultatul Testului:</h3>";
            echo "<p><b>Nume:</b> $name</p>";
            echo "<p><b>Întrebarea 1:</b> $q1</p>";
            echo "<p><b>Întrebarea 2:</b> $q2</p>";
            echo "<p><b>Întrebarea 3:</b> $q3</p>";
            exit();
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <p><label for="name">Nume *:</label>
        <input type="text" name="name" value="<?php echo $name; ?>">
        <span class="error"><?php echo $nameErr; ?></span></p>

        <p>1. Ce limbaj preferați?</p>
        <input type="radio" name="q1" value="PHP"> PHP
        <input type="radio" name="q1" value="Python"> Python
        <input type="radio" name="q1" value="JavaScript"> JavaScript
        <span class="error"><?php echo $q1Err; ?></span>

        <p>2. Ce tehnologii cunoașteți?</p>
        <input type="checkbox" name="q2[]" value="HTML"> HTML
        <input type="checkbox" name="q2[]" value="CSS"> CSS
        <input type="checkbox" name="q2[]" value="JavaScript"> JavaScript
        <span class="error"><?php echo $q2Err; ?></span>

        <p>3. Ce framework preferați?</p>
        <input type="text" name="q3" value="<?php echo $q3; ?>">
        <span class="error"><?php echo $q3Err; ?></span>

        <p><input type="submit" value="Trimite"></p>
    </form>
</div>

</body>
</html>
