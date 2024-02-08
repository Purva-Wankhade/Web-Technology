<!DOCTYPE html>
<html>
<head>
    <title>Form to Table</title>
    <style>
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
    </style>
</head>
<body>

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
    Name: <input type="text" name="name" value="<?php echo $name; ?>"><br><br>
    Email: <input type="text" name="email" value="<?php echo $email; ?>"><br><br>
    Message: <textarea name="message"><?php echo $message; ?></textarea><br><br>
    Age: <input type="text" name="age" value="<?php echo $age; ?>"><br><br>
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

</body>
</html>