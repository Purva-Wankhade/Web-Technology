<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIT Semester Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        form {
            display: grid;
            gap: 10px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Enter Semester Marks</h2>
        <form method="POST">
            <label for="name">Student Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="reg_no">Registration Number:</label>
            <input type="text" id="reg_no" name="reg_no" required>

            <!-- Subject 1 -->
            <label for="subject1_mse">Subject 1 MSE:</label>
            <input type="text" id="subject1_mse" name="subject1_mse" required>
            <label for="subject1_ese">Subject 1 ESE:</label>
            <input type="text" id="subject1_ese" name="subject1_ese" required>

            <!-- Subject 2 -->
            <label for="subject2_mse">Subject 2 MSE:</label>
            <input type="text" id="subject2_mse" name="subject2_mse" required>
            <label for="subject2_ese">Subject 2 ESE:</label>
            <input type="text" id="subject2_ese" name="subject2_ese" required>

            <!-- Subject 3 -->
            <label for="subject3_mse">Subject 3 MSE:</label>
            <input type="text" id="subject3_mse" name="subject3_mse" required>
            <label for="subject3_ese">Subject 3 ESE:</label>
            <input type="text" id="subject3_ese" name="subject3_ese" required>

            <!-- Subject 4 -->
            <label for="subject4_mse">Subject 4 MSE:</label>
            <input type="text" id="subject4_mse" name="subject4_mse" required>
            <label for="subject4_ese">Subject 4 ESE:</label>
            <input type="text" id="subject4_ese" name="subject4_ese" required>

            <button type="submit" name="submit">Calculate Result</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            $servername = "localhost";
            $username = "root";
            $password = "Purva2308$$";
            $dbname = "vit_results_db";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $name = $_POST['name'];
            $reg_no = $_POST['reg_no'];
            $subject1_mse = $_POST['subject1_mse'];
            $subject1_ese = $_POST['subject1_ese'];
            $subject2_mse = $_POST['subject2_mse'];
            $subject2_ese = $_POST['subject2_ese'];
            $subject3_mse = $_POST['subject3_mse'];
            $subject3_ese = $_POST['subject3_ese'];
            $subject4_mse = $_POST['subject4_mse'];
            $subject4_ese = $_POST['subject4_ese'];

            $total_subject1 = ($subject1_mse * 0.3) + ($subject1_ese * 0.7);
            $total_subject2 = ($subject2_mse * 0.3) + ($subject2_ese * 0.7);
            $total_subject3 = ($subject3_mse * 0.3) + ($subject3_ese * 0.7);
            $total_subject4 = ($subject4_mse * 0.3) + ($subject4_ese * 0.7);

            $total_marks = $total_subject1 + $total_subject2 + $total_subject3 + $total_subject4;

            $sql = "INSERT INTO students (name, reg_no, subject1_mse, subject1_ese, subject2_mse, subject2_ese, subject3_mse, subject3_ese, subject4_mse, subject4_ese)
                    VALUES ('$name', '$reg_no', $subject1_mse, $subject1_ese, $subject2_mse, $subject2_ese, $subject3_mse, $subject3_ese, $subject4_mse, $subject4_ese)";

            if ($conn->query($sql) === TRUE) {
                echo "<br><strong>Result calculated successfully!</strong>";
                echo "<br>Total Marks: " . $total_marks;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
        ?>
    </div>
</body>
</html>
