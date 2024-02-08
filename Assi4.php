<!DOCTYPE html>
<html>
<head>
    <title>Form to Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: inline-block;
            width: 120px;
            font-weight: bold;
        }
        input[type="text"],
        textarea {
            width: calc(100% - 140px);
            padding: 6px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        textarea {
            resize: vertical;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    // Initialize variables to hold form data
    $name = $email = $message=$age = '';

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $message = test_input($_POST["message"]);
        $age=test_input($_POST["age"]);
    }
    ?>

    <h2>Form to Table</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $name; ?>"><br><br>
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" value="<?php echo $email; ?>"><br><br>
        <label for="message">Message:</label>
        <textarea name="message" id="message"><?php echo $message; ?></textarea><br><br>
        <label for="age">Age:</label>
        <input type="text" name="age" id="age" value="<?php echo $age; ?>"><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    // Function to sanitize form data
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Display submitted data in table
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h2>Submitted Data</h2>";
        echo "<table>";
        echo "<tr><th>Name</th><th>Email</th><th>Message</th><th>Age</th></tr>";
        echo "<tr><td>" . $name . "</td><td>" . $email . "</td><td>" . $message . "</td><td>" . $age . "</td></tr>";
        echo "</table>";
    }
    ?>
</div>

</body>
</html>
