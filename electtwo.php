<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricity Bill Calculator</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding-top: 50px;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .result-container {
            margin-top: 30px;
        }

        .result-box {
            background-color: #f8f9fa;
            border-radius: 5px;
            padding: 15px;
            margin-top: 20px;
        }

        .result-box p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Electricity Bill Calculator</h1>
        <form id="bill-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group">
                <label for="units_consumed">Enter Units Consumed:</label>
                <input type="number" id="units_consumed" name="units_consumed" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Calculate Bill</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $units_consumed = $_POST["units_consumed"];
            $bill = 0;

            if ($units_consumed <= 50) {
                $bill = $units_consumed * 3.50;
            } elseif ($units_consumed <= 150) {
                $bill = 50 * 3.50 + ($units_consumed - 50) * 4.00;
            } elseif ($units_consumed <= 250) {
                $bill = 50 * 3.50 + 100 * 4.00 + ($units_consumed - 150) * 5.20;
            } else {
                $bill = 50 * 3.50 + 100 * 4.00 + 100 * 5.20 + ($units_consumed - 250) * 6.50;
            }

            echo "<div class='result-container' id='result-container'>";
            echo "<div class='result-box' id='result-box'>";
            echo "<h2 class='text-center'>Your Electricity Bill</h2>";
            echo "<p>Units Consumed: $units_consumed</p>";
            echo "<p>Total Bill: ₹$bill</p>";
            echo "</div></div>";
        }
        ?>
    </div>

    <!-- Bootstrap JS (jQuery required) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>
</html>
